@extends('dashboard.dash-layout')
@section('chw-phase2-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin-lg-0 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Phase 2</h2>
                        <p class="card-description">
                            Add actions on this Submission
                        </p>
                        <a href="{{ url('chw/phase-two-actions/'.$assign_id.'/'.$user_id)}}" type="button" class="btn btn-success btn-fw" style="float:right">View Actions</a>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-md-12 grid-margin-lg-0 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Actions</h4>
                        <p class="card-description">
                            Important Actions
                        </p>
                        <form action="{{ route('phase.two.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="assign_id" value="{{$assign_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>At a Glance</label>
                                    <div id="the-basics">
                                        <input class="typeahead" type="text" placeholder="2023-07-04" disabled>
                                    </div>
                                </div>
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
                            <div class="col-lg-2 form-group" style="float:right">
                                <button type="submit" class="btn btn-block btn-info">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection