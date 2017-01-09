@extends('emails.main')

@section('email_content')

<h1>Olá, {{ $name }}</h1>

<p>Abaixo está o seu QRCode, lembre-se de levar no dia para darmos presença para você</p>

<a href="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $QR }}" download>
  <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $QR }}" class="img-thumbnail img-responsive" />
</a>

@endsection
