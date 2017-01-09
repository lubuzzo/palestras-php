@extends('layouts.app')

@section('content')

<h3>Olá, @if(isset($newName)) {{$newName}} @else {{auth()->user()->name}} @endif</h3>

<h4>Aqui você pode atualizar o seu perfil.</h4>
<p>Clicando no QR Code, ele será automaticamente baixado</p>
<h4>Lembre-se de levar ele todos os dias</h4>

@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="/perfil" method="post" class="form-horizontal">
	<div class="col-md-8">
		<div class="input-group" style="margin-bottom: 25px;">
		  <span class="input-group-addon" onclick="document.getElementById('Nome').focus();">
		    <i class="glyphicon glyphicon-user">
		    </i>
		  </span>
		  <input type="text" class="form-control" name="name" id="Nome" placeholder="{{auth()->user()->name}}" @if(isset($newName)) value="{{$newName}}" @elseif(old('name')) value="{{old('name')}}" @else value="{{auth()->user()->name}}" @endif>
		</div>

		<div class="input-group" style="margin-bottom: 25px;">
		  <span class="input-group-addon" onclick="document.getElementById('Email').focus();">
		    <i class="glyphicon glyphicon-envelope">
		    </i>
		  </span>
		  <input type="email" class="form-control" name="email" id="Email" placeholder="{{auth()->user()->email}}" @if(isset($newEmail)) value="{{$newEmail}}" @elseif(old('email')) value="{{old('email')}}" @else value="{{auth()->user()->email}}" @endif>
		</div>

		<div class="input-group" style="margin-bottom: 25px;">
		  <span class="input-group-addon" onclick="document.getElementById('Pass').focus();">
		    <i class="glyphicon glyphicon-lock">
		    </i>
		  </span>
		  <input type="Password" class="form-control" name="password" id="Pass" placeholder="Senha" value="">

		  <span class="input-group-addon" onclick="document.getElementById('confirmPass').focus();">
		    <i class="glyphicon glyphicon-lock">
		    </i>
		  </span>
		  <input type="Password" class="form-control" name="r-password" id="confirmPass" placeholder="Confirmar Senha" value="">

		</div>

		<div class="form-group" style="margin-top: 5px;">
	    	<input type="submit" name="submitButton" class="btn btn-success btn-block btn-lg" value="Atualizar" />
	    </div>
	</div>
	<input type="hidden" name="_token" value="{{{csrf_token()}}}" />
</form>

	<div class="col-md-4">
		<center>
			<a href="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ auth::user()->id_qr }}" download>
				<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ auth::user()->id_qr }}" class="img-thumbnail img-responsive" />
			</a>
		</center>

		<br />

	<a href="/perfil/email">
		<button class="btn btn-lg btn-block">
			Enviar por e-mail
		</button>
	</a>

	</div>
@stop
