@section('title',"Don't have permission")
@extends('layouts.login')
@section('content')


	<div id="container">
		<h1>Sorry you don't have permission</h1>
		<p>you can't requested the url. <a href="{{url('/admin/dashboard')}}">Click Go Back</a></p>
	</div>
	<style type="text/css">
		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#container {
			bottom: 0;
			left: 0;
			margin: 0 auto;
			position: absolute;
			right: 0;
			text-align: center;
			top: 45%;
		}

		p {
			margin: 12px 15px 12px 15px;
		}
	</style>
@endsection