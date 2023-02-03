@extends('auth.layout')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <!-- <div class="brand-logo">
                            <img src="{{ url('assets/images/logo-dark.svg') }}" alt="logo">
                        </div> -->
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="first_name" class="form-control form-control-lg" placeholder="First Name" name="first_name" required autofocus>
                                @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="last_name" class="form-control form-control-lg" placeholder="Last Name" name="last_name" required autofocus>
                                @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="email" class="form-control form-control-lg" placeholder="Email" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                                    SIGN UP
                                </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="{{ url('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ url('assets/js/off-canvas.js') }}"></script>
<script src=".{{ url('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ url('assets/js/template.js') }}"></script>
<!-- endinject -->
</main>
@endsection