@if(count($errors)>0) {{-- aqui estamos recorriendo la lista de errores para mostrarlos --}}
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif