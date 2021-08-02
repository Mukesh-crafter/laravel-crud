@extends('layouts.main')

@section('title', 'Posts')

@section('content')

<h3 class="text-center mt-3">Posts list</h3>
<a href="{{route('posts.create')}}" class="btn btn-primary float-right mb-3">Create Post</a>
<table class="table" id="posts">
  <thead>
    <tr>
    	<th>ID</th>
      <th>TITLE</th>
      <th>DESCRIPTION</th>
      <th></th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
      @forelse($posts as $post)
      <tr>
      	<td>{{ $post->id }}</td>
      	<td>{{ $post->title }}</td>
      	<td>{{ $post->description }}</td>
      	<td>
	      	<form action="{{route('posts.destroy', $post->id)}}" id ="form-{{$post->id}}"  method="POST">
	      		@method('DELETE')
	      		@csrf
	      	</form>
	      </td>
	      <td>
      		<a href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary">Edit</a>   
      		<button class="btn btn-danger delete-post-btn" data-id="{{$post->id}}">Delete</button>	
      	</td>	
      	@empty
      		<td>No record found</td>
      </tr>
    @endforelse
  </tbody>
</table>


<script>
	$(function(){
		let $posts = $('#posts');
		let $deletePostBtn = $('.delete-post-btn');
		
		$posts.DataTable();
		$deletePostBtn.on('click', deletePost);


		function deletePost(e) {
			var id = $(this).data('id');
			console.log(id);
			swal({
			  title: "Are you sure?",
			  text: "You want to delete this post",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	setTimeout(function() {
			  		$('#form-'+id).submit();
			  		}, 1000);
			    swal("Success! Your post has been deleted!", {
			      icon: "success",
			      buttons: false,
			    });
			  }
			});
		}
	});
</script> 
@endsection
