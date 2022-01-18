@extends('layouts.admin')
@section('title', 'Add Faq')
@section('nav-title', 'Add Faq')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Add Faq</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faq.save') }}" method="POST" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="bmd-label-floating">Type</label>
                                <select class="form-control" name="type" required="true">
                                    <option value="">Select Option</option>
                                    <option value="1">Student</option>
                                    <option value="2">Teacher</option>
                                </select>
                                <span class="invalid-feedback">
                                    @error('type')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Question</label>
                                    <input type="text" required="true" name="question" value="" class="form-control" autocomplete="off">
                                    <span class="invalid-feedback">
                                        @error('question')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Answer</label>
                                    <textarea required="true" name="answer" rows="7" class="form-control" autocomplete="off"></textarea>
                                    <span class="invalid-feedback">
                                        @error('answer')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rose pull-right">Save</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('answer');
    </script>

@endsection