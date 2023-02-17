@extends('dashboard.dash-layout')

@section('chw-edit-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="mx-0 mx-sm-auto">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">Edit CHW Details</h5>
                </div>
                <div class="modal-body">
                    <form class="px-4" action="{{ route('admin-chw.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{@$data->id}}" />
                        <input type="hidden" name="access_level" value="{{@$data->access_level}}" />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>First Name</strong></label>
                            <div class="col-sm-10">
                                <input name="first_name" type="text" value="{{@$data->first_name}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Last Name</strong></label>
                            <div class="col-sm-10">
                                <input name="last_name" type="text" value="{{@$data->last_name}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-sm-10">
                                <input name="email" type="text" value="{{@$data->email}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Address</strong></label>
                            <div class="col-sm-10">
                                <input name="address" type="text" value="{{@$data->address}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Phone</strong></label>
                            <div class="col-sm-10">
                                <input name="phone" type="text" value="{{@$data->phone}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Zip Code</strong></label>
                            <div class="col-sm-10">
                                <input name="zip_code" type="text" value="{{@$data->zip_code}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><strong>Password</strong></label>
                            <div class="col-sm-10">
                                <input name="password" type="password" value="{{@$data->password}}" id="typeText" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row" style="width:100%;">
                            <div style="text-align:right;width:100%;">
                                <button type="submit" class="btn btn-info btn-lg font-weight-medium auth-form-btn">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection