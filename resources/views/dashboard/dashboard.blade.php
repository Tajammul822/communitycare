@extends('dashboard.dash-layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
                <h4 class="font-weight-bold text-dark"></h4>
                <p class="font-weight-normal mb-2 text-muted"></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Users</h4>
                                <p>1% increase in registration</p>
                                <h4 class="text-dark font-weight-bold mb-2">04</h4>
                                <canvas id="customers"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © communitycare.com {{ date('Y-m-d') }}</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="http://www.communitycare.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span> -->
        </div>
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block mt-2">Distributed By: <a href="https://www.communitycare.com/" target="_blank">CommunityCare</a></span>
    </footer>

</div>
@endsection