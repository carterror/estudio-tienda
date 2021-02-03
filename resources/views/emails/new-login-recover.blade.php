@extends('emails.master')

@section('content')
<h2>{{ env('APP_NAME', 'TIENDA') }}</h2>

<p><h3> Hola: <b>{{$name}}</b></h3></p>

<p>Este es un correo electrónico que le ayudara a reestablecer la contraseña de su cuenta en nuestra plataforma.</p>
<p>Para continuar haga clic en el botón e ingrese su nueva contraseña:</p>
<h2>{{$password}}</h2>
<p><a href="{{ url('/login?email='.$email.'&pass='.$password) }}" style="display: inline-block; background-color:  rgba(71, 186, 205,1); border-radius: 8px; text-decoration: none; padding: 12px; color: #fff; box-shadow: 5px 5px 5px #fff;">Resetear mi contraseña</a></p>
<p>Si el botón anterior no le funciona dirijase a la siguiente dirección:</p>
<p><a href="{{ url('/login?email='.$email.'&pass='.$password) }}">{{ url('/reset?email='.$email) }}</a></p>
<p>Gracias por preferirnos...</p>
@endsection