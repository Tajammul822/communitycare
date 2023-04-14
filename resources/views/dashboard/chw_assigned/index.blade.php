@extends('dashboard.dash-layout')
@section('chw-assigned-dashboard-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="display-5"><strong>Forms Assigned To CHW Users</strong></h1>
                        <p class="card-description">List of assigned Forms and Task details</p>
                    </div>
                </div>
            </div>
            @foreach($assigned_forms as $form_data)
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Submitted Form Details</h4><br>
                        <a href="{{ url('chw/assign-details/'.$form_data->form_id).'/'.$form_data->user_id.'/'.$form_data->id}}" type="button" class="btn btn-success" style="float:right">View Details</a>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <p>Form Title</p>
                                    <p>
                                        Form Description
                                    </p>
                                    <p>
                                        Form Created Date
                                    </p>
                                </address>
                            </div>
                            <div class="col-md-6">
                                <address class="text-warning">
                                    <p class="font-weight-bold">
                                        {{ $form_data->assign_form->title }}
                                    </p>
                                    <p class="mb-2">
                                        {{ $form_data->assign_form->description }}
                                    </p>
                                    <p class="font-weight-bold">
                                        {{ $form_data->assign_form->created_at }}
                                    </p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection