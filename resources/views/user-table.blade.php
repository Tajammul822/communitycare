<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

@extends('dash-layout')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <div class="card-toolbar">
              <a href="{{ route('/user/add') }}" class="btn btn-sm btn-light">
                {{ __('Add New') }}
              </a>
            </div>
            <div class="table-responsive pt-3">
              <table class="table table-dark" id="user_table">
                <thead>
                  <tr class="fw-bolder fs-6 text-gray-800">
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('email') }}</th>
                    <th class="text-end">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <div class="d-flex justify-content-end flex-shrink-0">
                        <a class="nav-link" href="{{ URL::to('/user/edit/'.$user->id) }}"><button class="btn btn-outline-primary btn-custom">Edit</button></a>
                        <a onclick="return confirm('are you sure to delete ?')" class="nav-link" href="{{ URL::to('/user/delete/'.$user->id) }}"><button class="btn btn-outline-primary btn-custom">Delete</button></a>
                      </div>
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
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
    </div>
  </footer>
  <!-- partial -->
</div>
@endsection
<script>
  $(document).ready(function() {
    $.noConflict();
    var table = $('#user_table').DataTable();
  });
</script>