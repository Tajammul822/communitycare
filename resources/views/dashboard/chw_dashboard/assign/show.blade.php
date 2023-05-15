@extends('dashboard.dash-layout')
@section('chw-assign-show-content')

<?php

use App\Http\Controllers\ChwController;
?>
<style>
    #data_1,
    #data_2,
    #data_3 {
        display: none;
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
        <?php
        $assign_id = request()->route('id');
        $user_id = request()->route('user_id');
        ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Choose Phase</h2>
                        <select class="form-control form-control-lg" id="shipping_selector" name="phase">
                            <option value="0">--SELECT--</option>
                            <option value="1">Phase I</option>
                            <option value="2">Phase II</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <?php $phase_data =  ChwController::get_phase_one_data($assign_id);
        ?>
        <div class="row" id="data_1">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <a onclick="myFunction()"><i class="icon-cross" style="margin-top:10px; margin-right:10px;font-size:20px; color:#ff9f80;float:right;cursor: pointer;"></i></a>
                    <div class="card-body">
                        <h4 class="card-title">Phase I</h4><br>
                        <h4 class="card-title">Next Follow Up date</h4><br>
                        <div class="media">
                            <i class="icon-bell icon-md text-warning"></i>
                            <div class="media-body">

                                <p class="card-text" style="margin-left:20px; margin-top:5px;">{{$phase_data}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $phase_data =  ChwController::get_phase_two_data($assign_id);
        ?>
        <div class="row" id="data_2">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <a onclick="myFunction2()"><i class="icon-cross" style="margin-top:10px; margin-right:10px;font-size:20px; color:#ff9f80;float:right;cursor: pointer;"></i></a>
                    <div class="card-body">
                        <h4 class="card-title">Phase II</h4><br>
                        <h4 class="card-title">Next Follow Up date</h4><br>
                        <div class="media">
                            <i class="icon-bell icon-md text-warning"></i>
                            <div class="media-body">
                                <p class="card-text" style="margin-left:20px; margin-top:5px;">{{$phase_data}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->access_level == 2)
        <!-- <div class="row">
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
        </div> -->

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#shipping_selector").change(function() {
            var id = $(this).val();
            $("#data_" + id).show();
        });


    });

    function myFunction() {
        var x = document.getElementById("data_1");
        x.style.display = "none";
    }

    function myFunction2() {
        var x = document.getElementById("data_2");
        x.style.display = "none";
    }
</script>
@endsection