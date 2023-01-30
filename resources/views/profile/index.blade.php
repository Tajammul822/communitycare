@extends('dash-layout')
@section('profile-index-content')
<style>
    * {
        font-family: sans-serif;
        padding: 0px;
        margin: 0px;
    }

    body {
        background-color: #212121;
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
        position: absolute;
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
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Vestibulum at eros</li>
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

                    <img class="profile-img" src="{{ url('assets/images/faces/face28.png') }}">
                    <div class="text-container">
                        <p class="title-text">Austin May</p>
                        <p class="info-text">Software Developer</p>
                        <p class="desc-text">Hello, I am Austin May and I enjoy front-end web development. I fell in love with software development at Marshall University, where I graduated with a Bachelor's in Computer Science. </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- <div class="user-edit-form">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                        <h4>Add new User</h4>
                        <form action="{{ route('/user/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="name" class="form-control form-control-lg" placeholder="Name" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" id="email_address" class="form-control form-control-lg" placeholder="email" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control form-control-lg" placeholder="password" name="password" required>
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
    </div> -->

</div>


@endsection