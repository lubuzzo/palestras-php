<?php

Auth::routes();

//Login Social
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');


//Rotas da aplicação
Route::get('/',
		['as' => 'listaPalestras',
		'uses' => 'palestraController@mostrar']
	);

Route::post('/palestras/nova', 'palestraController@cadastrar');
Route::get('/palestras/remover/{id}' , 'palestraController@remover');
Route::get('/palestras/ativar/{id}' , 'palestraController@ativar');


Route::get('/interessados/{id}', [
		'as' => "listaInteressados",
		'uses' => 'interesseController@verInteresse']
	);

Route::get('/interesses/{id}', 'interesseController@toggle');

Route::get('/perfil', 'perfilController@mostrarPerfil');
Route::post('/perfil', 'perfilController@alterarPerfil');
Route::get('/perfil/email', 'perfilController@enviarEmail');
