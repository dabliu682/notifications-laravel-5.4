@extends('layouts.app')
@section('content')
	<div class="container">
		<h1>Mensaje</h1>
		<p> {{ $mensaje->body}} </p>
		<small>Enviado por {{ $mensaje->sender->name }}</small>
	</div>

@endsection