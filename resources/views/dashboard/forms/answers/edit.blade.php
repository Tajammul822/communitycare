@extends('dashboard.dash-layout')
@section('forms-answers-edit-content')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4><strong>Change Submission Answer</strong></h4>
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <form action="{{ route('forms.answer.update') }}" method="POST">
                                @csrf
                                <!-- <input type="hidden" name="form_id" value="{{@$data->id}}" /> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $id = request()->route('id');
                                        ?>
                                        <input name="form_id" type="hidden" value="{{$id}}" class="form-control">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Answer</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="answer_id">
                                                    <!-- <option selected disabled>Select Category</option> -->
                                                    @foreach($answers as $ans)
                                                    <option value="{{$ans->id}}">{{$ans->answer}}</option>
                                                    @endforeach
                                                </select>
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