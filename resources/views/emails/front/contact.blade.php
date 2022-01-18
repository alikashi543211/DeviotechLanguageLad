@extends('layouts.email')
@section('subject', 'Contact Email')
@section('content')
	<div>
	    <h1 align="center" style="color: #2b3248;font-size:24px;font-weight:bold;margin-top: 30px;text-transform:none;font-family: sans-serif;line-height: 1.4;margin-bottom: 30px;">Contact Email</h1>
	</div>


	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;">Thanks {{ $req->name }}, we have received your message and will respond to you as soon as possible.</p>

@endsection
