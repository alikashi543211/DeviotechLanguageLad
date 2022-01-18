@extends('layouts.admin')
@section('title', 'Edit Language')
@section('nav-title', 'Edit Language')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Edit Language</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.language.save') }}" method="POST" class="validate-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" required="true" name="name" value="{{ $item->name }}" class="form-control" autocomplete="off">
                                    <span class="invalid-feedback">
                                        @error('name')
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