<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dashboard.dash-layout')
@section('content')
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
            <h4 class="card-title">Users Record</h4>
            <span class="">
              <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#exampleModal">
                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                  <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                </svg><!-- <i class="fa fa-plus"></i> --> New</button>
            </span>
            <div class="table-responsive pt-3">
              <table class="table table-bordered" id="user_table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Zip Code</th>
                    <th>Created Date</th>
                    <th col-span="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->zip_code }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                      <a href="{{url('users/edit/'.$user->id)}}"><i class="fa fa-edit" style="font-size:20px; color:#212529"></i></a><br>
                      <a class="delete-confirm" href="{{ url('admin/user-delete/'.$user->id) }}"><i class="fa fa-trash" style="font-size:20px; color:#212529"></i></a>
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
<!--Add New User Form Start -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#212529">
        <h5 class="modal-title">Add new User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('user-add.post') }}" method="POST" id="additional-info-form">
                @csrf
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="first_name" required />
                        <span class="text-danger error-text first_name_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Last Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="last_name" required />
                        <span class="text-danger error-text last_name_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" required />
                        <span class="text-danger error-text email_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" />
                        <span class="text-danger error-text address_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" />
                        <span class="text-danger error-text phone_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Zip Code</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="zip_code" />
                        <span class="text-danger error-text zip_code_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Access Level</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="access_level" />
                        <span class="text-danger error-text access_level_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" required />
                        <span class="text-danger error-text password_error"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" style="border:none">
                  <button class="btn btn-info" type="submit" name="add_new">Save User</button>
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
<!--Add New User Form End -->
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
      text: "This User and it's details will be permanently deleted!",
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