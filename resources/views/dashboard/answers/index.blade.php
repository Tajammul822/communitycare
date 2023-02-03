<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


@extends('dashboard.dash-layout')
@section('answers-index-content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
                        <h4 class="card-title">Answers</h4>
                        <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_answer" data-toggle="modal" data-target="#exampleModal">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                </svg><!-- <i class="fa fa-plus"></i> --> New</button>
                        </span>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="answer_table">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Created Date</th>
                                        <th col-span="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($answers as $answer)
                                    <tr>
                                        <td>{{ $answer->question->question }}</td>
                                        <td>{{ strip_tags($answer->answer) }}</td>
                                        <td>{{ $answer->created_at }}</td>
                                        <td>
                                            <a href="{{url('admin/answers/edit/'.$answer->id)}}"><i class="fa fa-edit" style="font-size:20px; color:#212529"></i></a><br>
                                            <a class="delete-confirm" href="{{ url('admin/answer-delete/'.$answer->id) }}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
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

<!-- add new question -->

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Add a New Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('answers.add') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Question:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="que_id">
                                                    <!-- <option selected disabled>Select Category</option> -->
                                                    @foreach($quest as $ques)
                                                    <option value="{{$ques->id}}">{{$ques->question}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Answer:</label>
                                            <div class="col-sm-9">
                                                <textarea id="my_textarea" name="answer" rows="6" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-info" type="submit" name="add_new">Save Answer</button>
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
        var table = $('#answer_table').DataTable();
    });
</script>
<script>
    tinymce.init({
        selector: '#my_textarea'
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