@extends('layouts.admin')
@section('title', 'Students')
@section('nav-title', 'Students')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Students List</h5>
                </div>
                <div class="card-body">
                    @include("admin.components.date_filter_form")
                	<div class="row">
			            <div class="col-md-12">
			                <div class="toolbar text-right">
			                	{{-- <a href="{{route('admin.services.add')}}" class="btn btn-success">+ Add Service</a> --}}
			                </div>
			            </div>
                	</div>
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Native Language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->email }}</td>
                                    <td>{{ $item->student_profile->country ?? '' }}</td>
                                    <td>{{ $item->student_profile->native_language ?? '' }}</td>
                                	<td>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.students.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <a href="{{ route('admin.students.detail', $item->id) }}" rel="tooltip" class="btn btn-info btn-round" data-original-title="View Detail" title="View Detail">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach		
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection