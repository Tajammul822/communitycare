@extends('dashboard.dash-layout')
@section('chw-dashboard-content')

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
                    <div class="col-sm-12 grid-margin stretch-card" style="height:180px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Forms Assigned</h4>
                                <p>1% increase in form submission</p>
                                <h4 class="text-dark font-weight-bold mb-2">04</h4>
                                <canvas id="orders"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection