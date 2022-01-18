@extends('layouts.admin')
@section('title', 'Teacher Earning')
@section('nav-title', 'Teacher Earning')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="row margin_bottom" >
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon"><i class="material-icons">people</i></div>
                            <p class="card-category">Teacher Earning</p>
                            <h3 class="card-title"> ${{ $earning_count ?? 0 }}  </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats"><i class="material-icons">people</i> Total teacher earning</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon"><i class="material-icons">price_check</i></div>
                            <p class="card-category">Admin Earning</p>
                            <h3 class="card-title"> ${{ $admin_earning_count ?? 0 }}  </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats"><i class="material-icons">price_check</i> Total admin earning</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Teacher Earning List</h5>
                </div>
                <div class="card-body">
                    @include("admin.components.date_filter")
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Date</th>
                                    <th>Request ID</th>
                                    <th>Package ID</th>
                                    <th>Request Type</th>
                                    <th>Payment Source</th>
                                    <th>Amount</th>
                                    <th>Admin Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->student->name ?? '' }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $item->booking_request_id ?? $item->trial_class_id ?? 'N/A'  }}</td>
                                        <td>
                                            {{ $item->booking_request->student_package->id ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if(!is_null($item->booking_request_id))
                                                Booking
                                            @elseif(!is_null($item->trial_class_id))
                                                Trial
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            {{ ucfirst($item->payment_method) }}
                                        </td>
                                        <td><span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span></td>
                                        <td>
                                            <span class="badge badge-success">+ {{  $item->admin_amount }}</span>
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