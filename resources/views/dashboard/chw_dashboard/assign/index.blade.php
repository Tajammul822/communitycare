<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('chw-form-assign-content')
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
                        <h3 class="card-title">Assigned Questionaire's</h3>
                        <!-- <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#exampleModal">New</button>
                        </span> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="forms_table">
                                <thead>
                                    <tr>
                                        <th>Form Title</th>
                                        <th>Form Description</th>
                                        <th>Created Date</th>
                                        <th col-span="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chw_form as $form_data)
                                    <tr>
                                        <td>{{ $form_data->assign_form->title }}</td>
                                        <td>{{ $form_data->assign_form->description }}</td>
                                        <td>{{ $form_data->created_at }}</td>
                                        <td>
                                            <a href="{{ url('chw/assign-details/'.$form_data->form_id) }}"><i class="icon-eye" style="font-size:20px; color:#212529"></i></a>
                                            <a class="delete-confirm" href="{{url('admin/forms/edit/'.$form_data->id)}}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
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
            text: "This Form and it's details will be permanently deleted!",
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