@extends('layouts.main')

@section('title', 'Edit')

@section('content')
<p class="text-center ">Edit Post</p>
<form class="space-y-5" method="post" action="{{route('posts.update', $post->id)}}">
	@method('put')
	@csrf
  	<div class="flex flex-col">
    	<label>Title</label>
    	<input type="text" name="title" class="border border-gray-400 rounded" value="{{ $post->title }}" autofocus />
     	<small class="text-danger">{{ $errors->first('title') }}</small>
  	</div>
  	<div class="flex flex-col">
    	<label>Description</label>
    	<textarea class="border border-gray-400 rounded" name="description" rows="4" />{{ $post->description }}</textarea>
    	<small class="text-danger">{{ $errors->first('description') }}</small>
  	</div>
   	<input type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded" value="Update">
   	<input type="reset" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded" value="Reset">
</form>
@endsection

 