<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('phase-two-show-content')
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
                        <h4 class="card-title">Actions applied in Phase 2</h4><br><br>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Important Date</th>
                                        <th>Contact Next</th>
                                        <th>Added Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($two_actions as $actions)
                                    <tr>
                                        <td>{{ $actions->important_date }}</td>
                                        <td>{{ $actions->contact_next }}</td>
                                        <td>{{ $actions->created_at }}</td>
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
@endsection