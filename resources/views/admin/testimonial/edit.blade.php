@extends('layouts.admin')
@section('title', 'Edit Testimonial')
@section('nav-title', 'Edit Testimonial')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Add Testimonial</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.save') }}" method="POST" class="validate-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Upload Image*</label>
                                    <input type="file" name="image" class="dropify @error('image') error @enderror" accept="image/*" data-default-file="{{ asset($item->image ?? 'default.png') }}">
                                    <span class="invalid-feedback">
                                        @error('image')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Description</label>
                                    <textarea required="true" name="description" rows="7" value="" class="form-control" autocomplete="off">{{ $item->description }}</textarea>
                                    <span class="invalid-feedback">
                                        @error('description')
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