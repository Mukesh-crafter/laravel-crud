@extends('layouts.main')

@section('title', 'Posts')

@section('content')

<a href="{{route('posts.create')}}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded float-right  mb-2">Create Post</a>
 <table class="table border w-full" id="posts">
  <thead class="bg-gray-50 text-center">
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
      <tr class="text-center border">
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
      		<a href="{{route('posts.edit', $post->id)}}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">Edit</a>   
      		<button class="delete-post-btn bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded" data-id="{{$post->id}}">Delete</button>	
      	</td>	
      	@empty
      		<td>No record found</td>
      </tr>
    @endforelse
  </tbody>
</table>
<!-- script -->
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
