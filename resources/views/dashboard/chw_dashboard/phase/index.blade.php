@extends('dashboard.dash-layout')
@section('chw-dashboard-phase-content')

<?php

use App\Http\Controllers\ChwController;
?>
<style>
    .search-btn {
        background: transparent;
        border: none;
        outline: none;
        box-shadow: none;
    }

    .search-btn:hover {
        background: none;
        border: none;
        outline: none;
        box-shadow: none;
    }

    .search-btn.btn-info:active:focus,
    .search-btn.btn-info.active:focus {
        box-shadow: none !important;
        background: transparent !important;
    }

    .search-btn:focus {
        background: transparent;
        border: none;
        outline: none;
        box-shadow: none;
    }

    .search-btn .fa-search {
        color: blue;
        font-size: 20px;
    }
</style>
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
                        <h1 class="display-5"><strong>Submission Phases</strong></h1>
                        <p class="card-description">Add actions on these submission based on phases.</p>
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
                        <a href="{{ url('chw/phase-show/'.$form_data->user_id.'/'.$form_data->id)}}" type="button" class="btn btn-success" style="float:right">Go to Phases</a>
                        <p class="card-description">{{ $form_data->assign_form->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection