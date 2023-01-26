@extends('dash-layout')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        
                        <h4>Edit User</h4>
                        <form action="{{ route('/user/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="faqs_id" value="{{@$data->id}}" />
                            <div class="form-group">
                                <input type="text" id="name" class="form-control form-control-lg" placeholder="Name" value="{{@$data->name}} name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="email_address" class="form-control form-control-lg" placeholder="email" value="{{@$data->email}} name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control form-control-lg" placeholder="password" value="{{@$data->password}} name="password" required>
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