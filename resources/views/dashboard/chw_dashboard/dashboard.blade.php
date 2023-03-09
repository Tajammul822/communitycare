@extends('dashboard.dash-layout')
@section('chw-dashboard-content')

<?php

use App\Http\Controllers\ChwController;
?>
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
                        <a href="{{ url('chw/export')}}" type="button" class="btn btn-info btn-fw" style="float:right">Export CSV</a>
                        <!-- <a href="#" type="button" class="btn btn-warning btn-fw" style="float:right; margin-right:10px">Export PDF</a> -->
                        <h1 class="display-5"><strong>Client Task Management Module</strong></h1>
                        <p class="card-description">List of assigned Forms and Task details</p>
                    </div>
                </div>
            </div>
            @foreach($chw_form as $form_data)
            <?php $assign_data =  ChwController::get_assign_data($form_data->id);
            ?>
            <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $form_data->assign_form->title }}</h3>
                        <a href="{{ url('chw/assign-details/'.$form_data->form_id).'/'.$form_data->user_id.'/'.$form_data->id}}" type="button" class="btn btn-success" style="float:right">View Details</a>
                        <p class="card-description">{{ $form_data->assign_form->description }}</p>

                        <i class="icon-paper icon-md text-warning"></i>
                        <span><strong>Notes</strong></span><br><br>
                        @foreach($assign_data as $data)
                        @if(isset($data->notes)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ $data->notes }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <i class="icon-clock icon-md text-success"></i>
                        <span><strong> Follow Up dates</strong></span><br><br>
                        @foreach($assign_data as $data)
                        @if(isset($data->follow_up_date)!= NULL)
                        <ul class="list-star">
                            <li>{{ @$data->follow_up_date }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <!-- <i class="fa fa-phone icon-md text-info"></i>
                        <span><strong> Lorem ipsum dolor sit amet</strong></span> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection