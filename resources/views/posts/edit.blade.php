@extends('layouts.app')
@section('content')
<h2>Editing Post</h2>
@include('posts._forms',['post'=>$post])
@endsection