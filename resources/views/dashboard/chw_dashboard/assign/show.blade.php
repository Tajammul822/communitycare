@extends('dashboard.dash-layout')
@section('chw-assign-show-content')

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
                        <h3 class="card-title">Client Details</h3><br>
                        <div class="row">
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="icon-head icon-md text-warning"></i>
                                    <p class="mb-0 ml-1">
                                        <strong>{{$assign_user->first_name}}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="icon-mail icon-md text-success"></i>
                                    <p class="mb-0 ml-1">
                                        <strong>{{$assign_user->email}}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="fa fa-phone icon-md text-success"></i>
                                    <p class="mb-0 ml-1">
                                        <strong>{{$assign_user->phone}}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="fa fa-map-pin icon-md text-info"></i>
                                    <p class="mb-0 ml-1">
                                        <strong>{{$assign_user->zip_code}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Submission Details</h4><br>
                        <p class="card-description"><strong>1: Which of the following best describes you? / ¿Cuál de las siguientes te describe mejor?</strong></p>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$assign_user->best_describe}}</>
                            </p>
                        </blockquote>
                        <p class="card-description"><strong>2: What is your preferred language? / ¿Cuál es tu idioma preferido?</strong></p>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$assign_user->language}}</>
                            </p>
                        </blockquote>
                        <p class="card-description"><strong>3: How can we help you? / Como podemos ayudarte?</strong></p>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$assign_user->help}}</>
                            </p>
                        </blockquote>
                        @foreach($assign_data as $question_data )
                        <p class="card-description">
                            <strong>{{ $loop->iteration+3 }}: {{$question_data->submit_question->question}}</strong>
                        </p>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$question_data->submit_answer->answer}}</>
                            </p>
                        </blockquote><br><br>
                        @endforeach
                        @foreach($chw_form as $form_data)
                        <?php $assign_data_detail =  ChwController::get_assign_data_detail($form_data->id);
                        ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->access_level == 2)
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">First engagement Date</h4>
                        <p class="card-description">
                            At a Glance
                        </p>
                        @foreach($first_engage as $engage)
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">

                                    <i class="mdi mdi-compass-outline icon-md text-success"></i>
                                    <p class="mb-0 ml-1">
                                        {{$engage->first_engage}}
                                    </p>

                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Phase I</h4>
                        <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#phaseOne">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                </svg><!-- <i class="fa fa-plus"></i> --> Add</button>
                        </span><br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Important Date</th>
                                        <th>Contact Next</th>
                                        <th>Added Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($one_actions as $phase_one)
                                    <tr>
                                        <td>{{$phase_one->important_date}}</td>
                                        <td>{{$phase_one->contact_next}}</td>
                                        <td>{{$phase_one->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Phase II</h4>
                        <span class="">
                            <button class="btn btn-info btn-block btn-sm col-sm-2 float-right" type="button" id="new_member" data-toggle="modal" data-target="#phaseTwo">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                </svg><!-- <i class="fa fa-plus"></i> --> Add</button>
                        </span><br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Important Date</th>
                                        <th>Contact Next</th>
                                        <th>Added Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($two_actions as $phase_two)
                                    <tr>
                                        <td>{{$phase_one->important_date}}</td>
                                        <td>{{$phase_one->contact_next}}</td>
                                        <td>{{$phase_one->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="text-align:center"><strong>Add Tasks to this Submission</strong></h5><br><br>
                        <?php
                        $assign_id = request()->route('id');
                        $user_id = request()->route('user_id');
                        ?>
                        <a href="{{ url('chw/view-tasks/'.$assign_id.'/'.$user_id)}}" type="button" class="btn btn-success btn-fw" style="float:right; margin-right:10px">View Tasks</a>
                        <form action="{{ route('chw.task.add') }}" method="post">
                            @csrf
                            <?php
                            $assign_id = request()->route('id');
                            $user_id = request()->route('user_id');
                            ?>

                            <input type="hidden" name="first_name" value="{{$assign_user->first_name}}">
                            <input type="hidden" name="email" value="{{$assign_user->email}}">
                            <input type="hidden" name="assign_id" value="{{$assign_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <div class="form-group col-md-3">
                                <strong>
                                    <p for="exampleFormControlTextarea1">CLIENT ENGAGED THROUGH:<br><br>FIRST ENGAGEMENT (date):</p>
                                </strong>
                                <input type="date" name="first_engage" class="form-control" placeholder="Select date and time">

                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">PRIMARY NEED:</p>
                                </strong>
                                <input type="text" name="primary_need" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">CLIENT
                                        Special information**:<br><br>
                                        Current housing:</p>
                                </strong>
                                <input type="text" name="housing" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">Current family situation:</p>
                                </strong>
                                <input type="text" name="family_situation" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">Current employment / education:</p>
                                </strong>
                                <input type="text" name="emp_edu" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">Other barriers / concerns:</p>
                                </strong>
                                <input type="text" name="barr_con" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p for="exampleFormControlTextarea1">RESOURCES / REFERRAL GIVEN:</p>
                                </strong>
                                <input type="text" name="res_ref" class="form-control" />
                                <!-- <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea> -->
                            </div>
                            <div class="form-group col-md-3">
                                <strong>
                                    <p for="exampleFormControlTextarea1"> SUPPLIES LAST GIVEN (date):</p>
                                </strong>
                                <input type="date" name="supp_date" class="form-control" placeholder="Select date and time">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-rounded btn-fw" style="float:right">Save</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal" id="phaseOne" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Add in Phase I </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $form_id = request()->route('form_id');
            $assign_id = request()->route('id');
            $user_id = request()->route('user_id');
            ?>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('phase.one.post') }}" method="POST" id="additional-info-form">
                                @csrf
                                <input type="hidden" name="form_id" value="{{$form_id}}">
                                <input type="hidden" name="assign_id" value="{{$assign_id}}">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Important Date</label>
                                        <div id="bloodhound">
                                            <input name="important_date" class="typeahead" type="date" placeholder="States of USA">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>CONTACT NEXT in 30 days</label>
                                        <div id="bloodhound">
                                            <input name="contact_next" class="typeahead" type="date" placeholder="States of USA">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="border:none">
                                    <button class="btn btn-info" type="submit" name="add_new">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="phaseTwo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Add in Phase II</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('phase.two.post') }}" method="POST" id="additional-info-form">
                                @csrf
                                <input type="hidden" name="form_id" value="{{$form_id}}">
                                <input type="hidden" name="assign_id" value="{{$assign_id}}">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Important Date</label>
                                        <div id="bloodhound">
                                            <input name="important_date" class="typeahead" type="date" placeholder="States of USA">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>CONTACT NEXT in 14 days</label>
                                        <div id="bloodhound">
                                            <input name="contact_next" class="typeahead" type="date" placeholder="States of USA">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="border:none">
                                    <button class="btn btn-info" type="submit" name="add_new">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection