<?php

namespace SeCoT\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SeCoT\Http\Requests\perfilRequest;
use auth;
use SeCoT\Mail\Cadastro;
use Illuminate\Support\Facades\Mail;

class perfilController extends Controller
{
    public function mostrarPerfil()
    {
    	return view('perfil');
    }

    public function alterarPerfil(perfilRequest $request)
    {
    	$Perfil = DB::table('users')->where('id', '=', auth()->user()->id)->get();

    	$request = array_filter($request->all());

    	array_pull($request, 'submitButton');
    	array_pull($request, '_token');
    	array_pull($request, 'r-password');
    	if (isset($request['password'])) array_set($request, 'password', bcrypt($request['password']));

    	DB::table('users')
    		->where('id', '=', auth()->user()->id)
    		->update($request);
    	//return $request;
    	return view('perfil')->with(array('newName' => $request['name'], 'newEmail' => $request['email']));
    }

    public function enviarEmail()
    {
        $Teste = Mail::to(auth()->user()->email)->send(new Cadastro(auth()->user()->name, auth()->user()->id_qr))->from('inscricao@secot.com.br', 'SeCoT');
        return view('perfil');
    }
}
