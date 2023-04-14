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
        <div class="row">
            <div class="col-lg-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Newly Submitted Forms</h4>
                        <div class="table-responsive mt-3">
                            <table class="table table-header-bg">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Submiited Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($form_submit as $data)
                                    <tr>
                                        <td>{{ $data->first_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CHW User's with Assigned Forms</h4>
                        <div class="table-responsive mt-3">
                            <table class="table table-header-bg">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Assigned Form</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chw_users as $chw)

                                    <tr>
                                        <td>{{ $chw->first_name }}</td>
                                        <td>{{ $chw->email }}</td>
                                        <td>{{ $chw->phone }}</td>
                                        <td><a href="{{url('admin/assigned-forms/'.$chw->id)}}"><i class="icon-eye" style="font-size:20px; color:#212529"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Tasks For Follow Up</h4>
                        <div class="table-responsive mt-3">
                            <table class="table table-header-bg">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Tasks/Notes</th>
                                        <th>Follow Up Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assigned_tasks as $task)
                                    <tr>
                                        <td>{{ $task->first_name }}</td>
                                        <td>{{ $task->email }}</td>
                                        <td>{{ $task->notes }}</td>
                                        <td>{{ $task->follow_up_date }}</td>
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
@endsection