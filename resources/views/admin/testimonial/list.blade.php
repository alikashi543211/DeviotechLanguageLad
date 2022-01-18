@extends('layouts.admin')
@section('title', 'Testimonials')
@section('nav-title', 'Testimonials')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Testimonial List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="toolbar text-right">
                                <a href="{{route('admin.testimonial.add')}}" class="btn btn-primary">+ Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($item->image ?? 'default.png') }}" height="100" width="100"></td>
                                    <td>
                                        @if(!is_null($item->description))
                                            {{ Str::limit($item->description, 5) }}
                                            @if(strlen($item->description) > 5)
                                                <a href="javascript:void(0);" class="read_more" data-value="{{ $item->description }}">read more</a>  
                                            @endif
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('admin.testimonial.edit', $item->id) }}" rel="tooltip" class="btn btn-info btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.testimonial.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
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