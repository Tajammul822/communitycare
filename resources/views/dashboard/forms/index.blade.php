<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('forms-index-content')
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
                        <h3 class="card-title">All Submissions</h3>
                        <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#exampleModal">New</button>
                        </span>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="forms_table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created By</th>
                                        <th>Description</th>
                                        <th>Created Date</th>
                                        <th col-span="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($form as $form_data)
                                    <tr>
                                        <td>{{ $form_data->title }}</td>
                                        <td>{{ $form_data->user->first_name }}</td>
                                        <td>{{ $form_data->description }}</td>
                                        <td>{{ $form_data->created_at }}</td>
                                        <td>
                                            <a href="{{url('admin/forms/edit/'.$form_data->id)}}"><i class="fa fa-edit" style="font-size:20px; color:#212529"></i></a>
                                            <a class="delete-confirm" href="{{ url('admin/form-delete/'.$form_data->id) }}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
                                            <a href="{{url('admin/forms/questions/'.$form_data->id)}}"><i class="icon-circle-plus" style="font-size:20px; color:#212529"></i></a>
                                            <a href="#" class="open_popup" type="button" data-toggle="modal" data-target="#shareModal" data-id="{{ $form_data->id }}"><i class="icon-share" style="font-size:20px; color:#212529"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add-form -->

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Add a New Submission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('forms.add') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Title:</label>
                                            <div class="col-sm-9">
                                                <input name="title" type="text" id="typeText" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description:</label>
                                            <div class="col-sm-9">
                                                <input name="description" type="text" id="typeText" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-info" type="submit" name="add_new">Save Submission</button>
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

<!-- share form modal -->

<div class="modal" id="shareModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Share this Submission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('forms.share.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="form_id" id="form_id" <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input name="email" type="text" id="typeText" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" id="typeText" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button class="btn btn-info" type="submit" name="add_new">Share Now</button>
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
            text: "This Submission and it's details will be permanently deleted!",
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $(".open_popup").click(function() {
        $('#form_id').val($(this).attr('data-id'));
    });
</script>
@endsection