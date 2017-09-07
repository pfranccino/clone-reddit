@extends('layouts/app')
@section('content')
@foreach($posts as $post)
<div class="row">
	<div class="col-md-12">
		<h2><a href="{{ route('post_path',['post'=>$post->id])}}">{{ $post->title }}</a>


		@if($post->user_id == \Auth::user()->id)

		<small class='pull-right'>
		<a href="{{ route('edit_post_path',['post'=>$post->id]) }}" class="btn btn-info">Edit</a>
		{{-- el metodo delete se realiza mediante un form --}}
		<form action="{{ route('delete_post_path',['post' =>$post->id]) }}" method="POST">
			{{ csrf_field() }}	
			{{ method_field('DELETE') }}
			
			<button type="submit" class="btn btn-danger">Delete</button>
			
		</form>
		</small>
		@endif
		</h2>
		<p>Posted {{ $post->created_at->diffforHumans()}}</p>
	</div>
</div>
<hr>
@endforeach
{{ $posts->render() }}
@endsection




