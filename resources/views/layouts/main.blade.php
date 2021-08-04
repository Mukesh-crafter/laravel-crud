<!DOCTYPE Html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>	
</html>