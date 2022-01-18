@extends('layouts.admin')
@section('title', 'FAQs List')
@section('nav-title', 'FAQs List')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">FAQ List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="toolbar text-right">
                                <a href="{{ route('admin.faq.add') }}" class="btn btn-primary">+ Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($item->type == '1')
                                            Student
                                        @elseif($item->type == '2')
                                            Teacher
                                        @endif
                                    </td>
                                    <td>{{ $item->question }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="read_more btn btn-warning" data-value="{{ $item->answer }}">Show Answer</a>
                                    </td>
                                    
                                    <td class="d-flex">
                                        <a href="{{ route('admin.faq.edit', $item->id) }}" rel="tooltip" class="btn btn-info btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.faq.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn ml-2" data-original-title="Delete" title="Delete">
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