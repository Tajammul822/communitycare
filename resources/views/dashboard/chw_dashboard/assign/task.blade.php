@extends('dashboard.dash-layout')
@section('chw-assign-task-content')
<div class="main-panel">
    <div class="content-wrapper">
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Tasks Added to this Submission</h3><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Added Tasks</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="font-weight:bold ;">
                                    <tr>
                                        <th style="font-weight:bold">First Engage Date</th>
                                        <th style="font-weight:bold">Primary Need</th>
                                        <th style="font-weight:bold">Current housing</th>
                                        <th style="font-weight:bold">Family situation</th>
                                        <th style="font-weight:bold">Employment/education</th>
                                        <th style="font-weight:bold">Concerns</th>
                                        <th style="font-weight:bold">Resources</th>
                                        <th style="font-weight:bold">Supplies date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $data)
                                    <tr>
                                        <td>{{$data->first_engage}}</td>
                                        <td>{{$data->primary_need}}</td>
                                        <td>{{$data->housing}}</td>
                                        <td>{{$data->family_situation}}</td>
                                        <td>{{$data->emp_edu}}</td>
                                        <td>{{$data->barr_con}}</td>
                                        <td>{{$data->res_ref}}</td>
                                        <td>{{$data->supp_date}}</td>
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