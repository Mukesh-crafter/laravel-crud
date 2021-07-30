@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container card shadow mx-auto p-3 mt-4">
	<form method="POST" action="{{ route('posts.store') }}">
		@csrf
		<h3 class="text-center">Create Post</h3>
	  	<div class="form-group">
		    <label>Title :</label>
		    <input type="text" name="title" class="form-control" />
		   	<small class="text-danger">{{ $errors->first('title') }}</small>
	  	</div>
	  	<div class="form-group">
		    <label>Description :</label>
		    <textarea class="form-control" name="description" rows="3" /></textarea>
		    <small class="text-danger">{{ $errors->first('description') }}</small>
		</div>
	   	<input type="submit" class="btn btn-success float-right" value="Create">
	</form>
</div>
@endsection
