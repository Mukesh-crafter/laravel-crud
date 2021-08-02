@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<label>Name : {{ Auth::user()->name }}</label><br>
<label>Email : {{ Auth::user()->email }}</label>
            
@endsection