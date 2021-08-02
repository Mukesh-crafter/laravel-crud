@extends('layouts.main')

@section('title', 'Edit')

@section('content')

<form method="post" action="{{route('posts.update', $post->id)}}">
	@method('put')
	@csrf
	<h3 class="text-center">Edit Post</h3>
  	<div class="form-group">
    	<label>Title</label>
    	<input type="text" name="title" class="form-control" value="{{ $post->title }}" autofocus />
     	<small class="text-danger">{{ $errors->first('title') }}</small>
  	</div>
  	<div class="form-group">
    	<label>Description</label>
    	<textarea class="form-control" name="description" rows="4" />{{ $post->description }}</textarea>
    	<small class="text-danger">{{ $errors->first('description') }}</small>
  	</div>
   	<input type="submit" class="btn btn-success" value="Update">
   	<input type="reset" class="btn btn-outline-secondary float-right" value="Reset">
</form>
@endsection

 