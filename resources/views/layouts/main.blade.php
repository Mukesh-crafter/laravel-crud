<!DOCTYPE Html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
	</head>
<body>
	<x-app-layout>
	    <x-slot name="header">
	        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
	            {{ __('Dashboard') }}  
	        </h2>
	    </x-slot>
	    <div class="py-12">
		    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
		            <div class="p-6 bg-white border-b border-gray-200">
		                <div class="container">
							@if(Session::has('success'))
				        	<div class="alert alert-success">
					            {{ Session::get('success') }}
					            @php
					                Session::forget('success');
					            @endphp
				    		</div>
					    	@endif
							@yield('content')	
						</div>
		            </div>
		        </div>
		    </div>
		</div>	
	</x-app-layout>
</body>	
</html>	