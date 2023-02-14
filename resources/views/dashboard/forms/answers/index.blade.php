<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('forms-answers-index-content')
<div class="main-panel">
    <div class="content-wrapper">
        @if ( Session::get('success'))
        <div class=" alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if ( Session::get('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Form Answers</h3>
                        <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#exampleModal">Add Answer</button>
                        </span>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="forms_table">
                                <thead>
                                    <tr>
                                        <th>Answer</th>
                                        <th>Created Date</th>
                                        <th col-span="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data)
                                    @foreach($data as $form_data)
                                    <tr>
                                        <td>{{ $form_data->answer_data->answer }}</td>
                                        <td>{{ $form_data->created_at }}</td>
                                        <td>
                                            <a href="{{url('admin/forms/answer-edit/'.$form_data->id)}}"><i class="fa fa-edit" style="font-size:20px; color:#212529"></i></a>
                                            <a class="delete-confirm" href="{{url('admin/forms/answer-delete/'.$form_data->id)}}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
</div>

<!-- add-form -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Select a Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('forms.answers.add') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $id = request()->route('id');
                                        $form_id = request()->route('form_id');
                                        ?>
                                        <input name="form_id" type="hidden" value="{{$form_id}}" class="form-control">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Answer</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="answer_id">
                                                    <!-- <option selected disabled>Select Category</option> -->
                                                    @foreach($answers as $ans)
                                                    <option value="{{$ans->id}}">{{$ans->answer}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-info" type="submit" name="add_new">Add Answer</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $.noConflict();
        var table = $('#forms_table').DataTable();
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: "This Answer and it's details will be permanently deleted!",
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection