@if($post->exists)
	<form action="{{ route('update_post_path',['post'=>$post->id]) }}" method="POST">
		{{ method_field('PUT') }}

		@else
        <form action="{{ route('store_post_path') }}" method="POST">

		@endif {{-- se especifica el metodo con el cual se manejara la info--}}
		{{ csrf_field() }}  {{-- como se duplica este en ambos podemos dejarlo fuera del if--}}
		
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{ $post->title or old('title') }}">
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea rows="5" name="description" class="form-control">{{ $post->description or old('description') }}</textarea>
		</div>

		<div class="form-group">
			<label for="url">Url</label>
			<input type="text" name="url" class="form-control" value="{{ $post->url  or old('url')}}">
		</div>
		
		<div class="form-group">
			<button type="submint" class="btn btn-primary">Save post</button>
		</div>
	</form>