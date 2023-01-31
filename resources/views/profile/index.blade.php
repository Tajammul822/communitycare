@extends('dash-layout')
@section('profile-index-content')
<style>
    * {
        font-family: sans-serif;
        padding: 0px;
        margin: 0px;
    }


    .container {
        position: absolute;
        top: 300%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ECEFF1;
        height: 250px;
        border-radius: 10px;
        overflow: hidden;
    }

    .menu-icon {

        right: 0;
        width: 53px;
        height: 53px;
        filter: invert(40%) sepia(57%) saturate(2228%) hue-rotate(189deg) brightness(96%) contrast(87%);
    }

    .svg-background {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: #1E88E5;
        -webkit-clip-path: polygon(0 0, 14% 0, 48% 100%, 0% 100%);
        clip-path: polygon(0 0, 14% 0, 48% 100%, 0% 100%);
    }

    .svg-background2 {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 20px;
        background-color: rgba(0, 0, 0, 0.12);
        z-index: -9;
        -webkit-clip-path: polygon(0 0, 14% 0, 48% 100%, 0% 100%);
        clip-path: polygon(0 0, 14% 0, 48% 100%, 0% 100%);
    }

    .profile-img {
        position: absolute;
        width: 150px;
        height: 150px;
        margin-top: 55px;
        margin-left: 40px;
        border-radius: 50%;
    }

    .circle {
        position: absolute;
        width: 162px;
        height: 161px;
        left: 0;
        top: 0;
        background-color: #ECEFF1;
        border-radius: 50%;
        margin-top: 50.5px;
        margin-left: 35px;
    }

    .text-container {
        position: absolute;
        right: 0;
        margin-right: 40px;
        margin-top: 45px;
        max-width: 230px;
        text-align: center;
    }

    .title-text {
        color: #263238;
        font-size: 28px;
        font-weight: 600;
        margin-top: 5px;
    }

    .info-text {
        margin-top: 10px;
        font-size: 18px;
    }

    .desc-text {
        font-size: 14px;
        margin-top: 10px;
    }

    .user-edit-form {
        top: 2000%;
    }

    .form-wrapper {
        background-color: #f4f7fa;
        padding: 2.5rem 2.5rem;
    }

    /* 
    .stretch-card {
        margin-right: 100px;
    } */

    li.list-group-item {
        padding: 0;
    }

    .list-group-item a {
        display: block;
        padding: 0.75rem 1.25rem;
        border: 1px solid rgba(0, 0, 0, 0.125);
    }

    .list-group-item a:hover {
        color: #fff;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper" style="min-height:320px;">
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
            <div class="col-md-3">
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#" class="btn btn-outline-primary btn-lg" type="button" id="change_password" data-toggle="modal" data-target="#exampleModal">Change Password</a></li>
                                <li class="list-group-item"><a href="#" class="btn btn-outline-primary btn-lg" type="button" id="update_picture" data-toggle="modal" data-target="#pictureModal">Update Picture</a></li>
                                <li class="list-group-item"><a href="#" class="btn btn-outline-primary btn-lg" type="button" id="update_additional-info" data-toggle="modal" data-target="#infoModal">Update Additional Info</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="svg-background"></div>
                    <div class="svg-background2"></div>
                    <div class="circle"></div>

                    <img class="profile-img" src="{{ url('assets/images/profile/admin/'.@$data->picture) }}">
                    <div class="text-container">
                        <p class="title-text">{{@$data->first_name}}</p>
                        <p class="info-text">Admin</p>
                        <p class="desc-text">{{@$data->email}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row form-wrapper mx-0">
        <div class="col-lg-9 ml-auto grid-margin stretch-card mr-53px">
            <div class="card">
                <div class="card-body">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <h4>Update Details</h4>
                        <form action="{{ route('update-details.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="faqs_id" value="{{@$data->id}}" />
                            <div class="form-group">
                                <input type="text" id="name" class="form-control form-control-lg" name="first_name" placeholder="First Name" value="{{@$data->first_name}}" autofocus>
                                @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="last_name" class="form-control form-control-lg" name="last_name" placeholder="Last Name" value="{{@$data->last_name}}" autofocus>
                                @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="email_address" class="form-control form-control-lg" name="email" placeholder="Email" value="{{@$data->email}}" autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
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
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
</div>
<!-- Change password -->

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('password.post') }}" method="POST" id="change-password-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="old_password" />
                                                <span class="text-danger error-text old_password_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="new_password" />
                                                <span class="text-danger error-text new_password_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="confirm_password" />
                                                <span class="text-danger error-text confirm_password_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit" name="add_new">Update Password</button>
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

<!-- update picture -->

<div class="modal" id="pictureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-picture.post') }}" method="POST" id="change-picture-form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Upload Here</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="picture" />
                                                <span class="text-danger error-text old_password_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit" name="add_new">Update Picture</button>
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

<!-- update additional info -->

<div class="modal" id="infoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Addition Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('additional-info.post') }}" method="POST" id="additional-info-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{@$data->address}}" name="address" />
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
                                                <input type="text" class="form-control" value="{{@$data->phone}}" name="phone" />
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
                                                <input type="text" class="form-control" value="{{@$data->zip_code}}" name="zip_code" />
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
                                                <input type="text" class="form-control" value="{{@$data->access_level}}" name="access_level" />
                                                <span class="text-danger error-text access_level_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit" name="add_new">Update Info</button>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#change-password-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#change-password-form')[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });
    });
</script>

@endsection