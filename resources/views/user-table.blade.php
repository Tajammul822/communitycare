<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@extends('dash-layout')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">

      <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users Record</h4>
            <span class="">
              <button class="btn btn-success btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#exampleModal">
                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                  <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                </svg><!-- <i class="fa fa-plus"></i> --> New</button>
            </span>
            <div>
              <?php if (isset($_SESSION['user_message'])) { ?>
                <h6 class="font-weight-light error_message"><?php echo $_SESSION['user_message'] ?></h6>
              <?php
                unset($_SESSION['user_message']);
              } ?>
            </div>
            <div class="table-responsive pt-3">
              <table class="table table-bordered" id="user_table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>E-mail</th>
                    <th col-span="2">Action</th>
                  </tr>
                </thead>
                <tbody>

                  
                    @foreach($users as $user)
                    

                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a href="{{url('user_edit/'.$user->id)}}">Edit</a><br>
                          <a onclick="return confirm('Are you sure, you want to delete it?')" href="{{URL::to('user/delete/'.$user->id)}}">Delete</a>
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
<!--Add New User Form Start -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Personal info</h4>
              <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="type">
                          <option value='1'>Admin</option>
                          <option value='2'>User</option>
                          <option value='3'>Subscriber</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" />
                      </div>
                    </div>
                  </div>
                  </br>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <button class="btn btn-primary" type="submit" name="add_new">Save User</button>
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
 @endsection
 