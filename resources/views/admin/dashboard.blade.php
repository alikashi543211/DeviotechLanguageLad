@extends('layouts.admin')
@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon"><i class="material-icons">people</i></div>
                    <p class="card-category">Teachers</p>
                    <h3 class="card-title">{{ $teacher_count ?? '0' }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">people</i> Total # of teachers</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">groups</i></div>
                    <p class="card-category">Students</p>
                    <h3 class="card-title">{{ $student_count ?? '0' }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">groups</i> Total # of students</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">shopping_cart</i></div>
                    <p class="card-category">Bookings</p>
                    <h3 class="card-title">{{ $booking_count ?? '0' }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">shopping_cart</i> Total # of bookings</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon"><i class="material-icons">price_check</i></div>
                    <p class="card-category">Earning</p>
                    <h3 class="card-title">${{ $earning ?? '0' }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">price_check</i> Total Earning</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
