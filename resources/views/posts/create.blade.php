@extends('layouts.main')

@section('title', 'Create')

@section('content')
<p class="text-center">Create Post</p>
<form class="space-y-5" method="post" action="{{ route('posts.store') }}">
	@csrf
  	<div class="flex flex-col">
	    <label class="">Title</label>
	    <input type="text" name="title" class="border border-gray-400 rounded" autofocus/>
	   	<small class="text-danger">{{ $errors->first('title') }}</small>
  	</div>
  	<div class="flex flex-col">
	    <label class="">Description</label>
	    <textarea class="border border-gray-400 rounded" name="description" rows="4" /></textarea>
	    <small class="text-danger">{{ $errors->first('description') }}</small>
	</div>
   	<input type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded" value="Create">
</form>
@endsection
 