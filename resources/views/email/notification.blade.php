<!DOCTYPE html>
<html>
<head>
	<title>Dabliu.com</title>
</head>
<body>
	<h1>{{ $user->name }}</h1>
	<p>Has recibido un mensaje </p>
	<a href="{{ route('mensajes.show', $msg->id) }}">Click aqui para ver el mensaje</a>
	<p>Gracias por utilizar mi Aplicación</p>
	<p>Saludos, Oscar Gallardo</p>
</body>
</html>