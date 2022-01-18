@extends('layouts.email')
@section('subject', 'Contact Email')
@section('content')
	<div>
	    <h1 align="center" style="color: #2b3248;font-size:24px;font-weight:bold;margin-top: 30px;text-transform:none;font-family: sans-serif;line-height: 1.4;margin-bottom: 30px;">New Contact Email Received</h1>
	</div>

	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;"><b>Name: </b>{{$req->name}}</p>
	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;"><b>Email: </b>{{$req->email}}</p>
	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;"><b>Contact No: </b>{{$req->contact_no}}</p>
	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;"><b>Subject: </b>{{$req->subject}}</p>
	<p style="font-family: sans-serif;text-align:justify;color:grey;font-size:16px;margin-bottom: 30px;"><b>Message: </b>{{$req->message}}</p>
	
@endsection
