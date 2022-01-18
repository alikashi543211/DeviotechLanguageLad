@extends('layouts.admin')
@section('title', 'CMS - Terms and Conditions')
@section('nav-title', 'CMS - Terms and Conditions')
@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Terms and Conditions</h5>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description"></label>
                                    <textarea id="description" name="terms">{{ setting('terms') ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection


@section('js')

    <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('terms');
    </script>

@endsection