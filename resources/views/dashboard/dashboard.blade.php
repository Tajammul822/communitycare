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
                    <div class="col-sm-12 grid-margin stretch-card" style="height:180px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Users</h4>
                                <p>1% increase in registration</p>
                                <h4 class="text-dark font-weight-bold mb-2">{{ $userCount }}</h4>
                                <canvas id="customers"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card" style="height:180px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Forms</h4>
                                <p>1% increase in form submission</p>
                                <h4 class="text-dark font-weight-bold mb-2">04</h4>
                                <canvas id="orders"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card" style="height:180px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Questions</h4>
                                <p>1% increase in questions addition</p>
                                <h4 class="text-dark font-weight-bold mb-2">{{ $questionCount }}</h4>
                                <canvas id="questions"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card" style="height:180px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Answers</h4>
                                <p>1% increase in answers addition</p>
                                <h4 class="text-dark font-weight-bold mb-2">{{ $answerCount }}</h4>
                                <canvas id="answers"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection