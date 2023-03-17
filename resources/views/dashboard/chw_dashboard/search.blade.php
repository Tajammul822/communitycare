@extends('dashboard.dash-layout')
@section('chw-search-content')

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
                        <a href="{{ url('chw/export')}}" type="button" class="btn btn-info btn-fw" style="float:right">Export CSV</a>
                        <a href="{{ url('chw/export-pdf')}}" type="button" class="btn btn-warning btn-fw" style="float:right; margin-right:10px">Export PDF</a>
                        <h1 class="display-5"><strong>Client Task Management Module</strong></h1>
                        <p class="card-description">List of assigned Forms and Task details</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6><strong>Search Tasks by Follow up Dates</strong></h6><br>
                        <form action="{{ route('chw.searh') }}" method="POST">
                            @csrf
                            <div class="input-group rounded">
                                <input type="date" name="follow_up_date" class="form-control rounded" placeholder="Search by date" required />
                                <span class="input-group-text border-0" id="search-addon">
                                    <button type="submit" class="btn btn-info search-btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach($chw_form as $form_data)
            <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $form_data->title }}</h3>
                        <a href=" {{ url('chw/assign-details/'.$form_data->form_id).'/'.$form_data->user_id.'/'.$form_data->id}}" type="button" class="btn btn-success" style="float:right">View Details</a>
                        <p class="card-description">{{ $form_data->description }}</p>

                        <i class="icon-paper icon-md text-warning"></i>
                        <span><strong>Notes</strong></span><br><br>
                        @if(isset($form_data->notes)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ $form_data->notes }}</li>
                        </ul>
                        @endif
                        <i class="icon-clock icon-md text-success"></i>
                        <span><strong> Follow Up dates</strong></span><br><br>
                        @if(isset($form_data->follow_up_date)!= NULL)
                        <ul class="list-star">
                            <li>{{ @$form_data->follow_up_date }}</li>
                        </ul>
                        @endif
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