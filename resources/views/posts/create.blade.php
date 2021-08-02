@extends('layouts.main')

@section('title', 'Create')

@section('content')

<form method="post" action="{{ route('posts.store') }}">
	@csrf
	<h3 class="text-center">Create Post</h3>
  	<div class="form-group">
	    <label>Title</label>
	    <input type="text" name="title" class="form-control" autofocus/>
	   	<small class="text-danger">{{ $errors->first('title') }}</small>
  	</div>
  	<div class="form-group">
	    <label>Description</label>
	    <textarea class="form-control" name="description" rows="4" /></textarea>
	    <small class="text-danger">{{ $errors->first('description') }}</small>
	</div>
   	<input type="submit" class="btn btn-danger" value="Create">
</form>
@endsection
 