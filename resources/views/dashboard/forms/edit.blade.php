@extends('dashboard.dash-layout')
@section('forms-edit-content')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4><strong>Edit Submission</strong></h4>
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <form action="{{ route('form.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="form_id" value="{{@$data->id}}" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><strong>Title</strong></label>
                                            <div class="col-sm-10">
                                                <input name="title" type="text" value="{{@$data->title}}" id="typeText" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><strong>Description</strong></label>
                                            <div class="col-sm-10">
                                                <input name="description" type="text" value="{{@$data->description}}" id="typeText" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="width:100%;">
                                        <div style="text-align:right;width:100%;">
                                            <button type="submit" class="btn btn-info btn-lg font-weight-medium auth-form-btn">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
@endsection