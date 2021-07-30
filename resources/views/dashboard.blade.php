@extends('layouts.main')

@section('content')

<label>Name : {{ Auth::user()->name }}</label><br>
<label>Email : {{ Auth::user()->email }}</label>
            
@endsection