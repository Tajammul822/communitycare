@extends('dashboard.dash-layout')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <h4>Edit User</h4>
              <form action="{{ route('users.update') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{@$data->id}}" />
                <div class="form-group">
                  <input type="text" id="first_name" class="form-control form-control-lg" name="first_name" placeholder="First Name" value="{{@$data->first_name}}" required autofocus>
                  @if ($errors->has('first_name'))
                  <span class=" text-danger">{{ $errors->first('first_name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="last_name" class="form-control form-control-lg" placeholder="Last Name" value="{{@$data->last_name}}" name="last_name" required autofocus>
                  @if ($errors->has('last_name'))
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="email" class="form-control form-control-lg" placeholder="Email" value="{{@$data->email}}" name="email" required>
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="address" class="form-control form-control-lg" placeholder="Address" value="{{@$data->address}}" name="address">
                  @if ($errors->has('address'))
                  <span class="text-danger">{{ $errors->first('address') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="phone" class="form-control form-control-lg" placeholder="Phone" value="{{@$data->phone}}" name="phone">
                  @if ($errors->has('phone'))
                  <span class="text-danger">{{ $errors->first('phone') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="zip_code" class="form-control form-control-lg" placeholder="Zip Code" value="{{@$data->zip_code}}" name="zip_code">
                  @if ($errors->has('zip_code'))
                  <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" id="access_level" class="form-control form-control-lg" placeholder="Access Level" value="{{@$data->access_level}}" name="access_level">
                  @if ($errors->has('access_level'))
                  <span class="text-danger">{{ $errors->first('access_level') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" id="password" class="form-control form-control-lg" placeholder="Email" value="{{@$data->password}}" name="password" required>
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                    Save
                  </button>
                </div>
              </form>
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