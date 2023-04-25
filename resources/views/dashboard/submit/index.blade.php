<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('form-submit-index-content')
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('admin/export')}}" type="button" class="btn btn-info btn-fw" style="float:right">Export CSV</a>
                        <a href="{{ url('admin/export-pdf')}}" type="button" class="btn btn-warning btn-fw" style="float:right; margin-right:10px">Export PDF</a>
                        <h1 class="display-5"><strong>Export</strong></h1>
                        <p class="card-description">Get a list of all the submitted submissions with the submitted user details in either CSV or PDF format.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Submitted Submission List</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created Date</th>
                                        <th col-span="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($form_submit as $data)
                                    <tr>
                                        <td>{{ $data->first_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <a href="{{url('admin/form-view/'.$data->id)}}"><i class="icon-eye" style="font-size:20px; color:#212529"></i></a>
                                            <a class="delete-confirm" href="{{ url('admin/user-delete/'.$data->id) }}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
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
        var table = $('#user_table').DataTable();
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: "This Client with its submission will be permanently deleted!",
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