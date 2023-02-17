@extends('dashboard.dash-layout')
@section('answer-edit-content')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h4>Edit Answer</h4>
                            <form action="{{ route('answer.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="answer_id" value="{{@$data->id}}" />
                                <div class="form-group">
                                    <textarea id="mytextarea" name="answer" rows="6" cols="80" value="{{@$data->answer}}">{{@$data->answer}}</textarea>
                                    @if ($errors->has('answer'))
                                    <span class="text-danger">{{ $errors->first('answer') }}</span>
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
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
</div>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
@endsection