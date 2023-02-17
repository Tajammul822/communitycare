@extends('dashboard.dash-layout')
@section('question-edit-content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h4>Edit Question</h4>
                            <form action="{{ route('question.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{@$data->id}}" />
                                <div class="form-group">
                                    <textarea id="mytextarea" name="question" rows="6" cols="80" value="{{@$data->question}}">{{@$data->question}}</textarea>
                                    @if ($errors->has('question'))
                                    <span class="text-danger">{{ $errors->first('question') }}</span>
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