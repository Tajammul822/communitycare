@extends('dashboard.dash-layout')
@section('chw-phase-main-content')
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Records entered in both Phases.</h4>
                        <p class="card-description">
                            Modifiy the actions based on needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                        <h4 class="card-title">Phase I list of actions</h4>
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
                        <h4 class="card-title">Phase II list of actions</h4>
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
    </div>
</div>


<div class="modal" id="phaseOne" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#212529">
                <h5 class="modal-title">Add Phase I Actions </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $assign_id = request()->route('assign_id');
            $user_id = request()->route('user_id');
            ?>
            <div class="modal-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('phase.one.post') }}" method="POST" id="additional-info-form">
                                @csrf
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
                <h5 class="modal-title">Add Phase II Actions </h5>
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