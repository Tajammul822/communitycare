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
                        <h5 style="text-align:center"><strong>Tasks/Info Added to this Submission</strong></h5><br><br>

                        <span><strong>Primary Need</strong></span><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->primary_need)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ $data->primary_need }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>FIRST ENGAGEMENT (date)</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->first_engage)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->first_engage }}</li>
                        </ul>
                        @endif
                        @endforeach

                        <span><strong>Current housing</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->housing)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->housing }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>Current family situation</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->family_situation)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->family_situation }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>Current employment / education</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->emp_edu)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->emp_edu }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>Other barriers / concerns</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->barr_con)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->barr_con }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>RESOURCES / REFERRAL GIVEN</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->res_ref)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->res_ref }}</li>
                        </ul>
                        @endif
                        @endforeach
                        <span><strong>SUPPLIES LAST GIVEN (date)</strong></span><br><br>
                        @foreach($assign_data_detail as $data)
                        @if(isset($data->supp_date)!= NULL)
                        <ul class="list-ticked">
                            <li>{{ @$data->supp_date }}</li>
                        </ul>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                    @if(auth()->user()->access_level == 2)
                    <div class="card-body">
                        <h5 style="text-align:center"><strong>Add Tasks to this Submission</strong></h5><br><br>
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

                            <button type="submit" name="submit" class="btn btn-success btn-rounded btn-fw" style="float:right">Save Task</button>
                        </form>
                    </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
@endsection