@extends('layouts.admin')
@section('title', 'Teachers')
@section('nav-title', 'Teachers')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Teachers List</h5>
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
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Video Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset($item->tutor_profile->image ?? 'default.png') }}" height="100" width="100"></td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->email }}</td>
                                    <td>{{ $item->tutor_profile->country }}</td>
                                    <td>
                                        @if(!is_null($item->tutor_profile->embed_video_url))
                                            {{ Str::limit($item->tutor_profile->embed_video_url, 4) }}
                                            @if(strlen($item->tutor_profile->embed_video_url) > 5)
                                                <a href="javascript:void(0);" class="read_more" data-value="{{ $item->tutor_profile->embed_video_url }}">read more</a>  
                                            @endif
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->tutor_profile->is_approved == '0')
                                            <span class="badge badge-info">Pending</span>
                                        @elseif($item->tutor_profile->is_approved == '1')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($item->tutor_profile->is_approved == '2')
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                	<td class="d-flex">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if($item->tutor_profile->is_approved == '0')
                                                    <a class="dropdown-item" href="{{ route('admin.tutors.change.status', $item->id) }}">Approve</a>
                                                    <a class="dropdown-item" href="{{ route('admin.tutors.change.status', $item->id) }}?reject=tutor">Disapprove</a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('admin.tutors.detail', $item->id) }}">Detail</a>
                                                <a class="dropdown-item" href="{{ route('admin.tutors.earning', $item->id) }}">Earning</a>
                                            </div>
                                        </div>

                                        <button type="button" onclick="deleteAlert('{{ route('admin.tutors.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn ml-2" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">close</i>
                                        </button>
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
@section('js')

@endsection