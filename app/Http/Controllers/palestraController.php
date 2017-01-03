<?php

namespace SeCoT\Http\Controllers;

use Illuminate\Http\Request;
use SeCoT\Palestra;
use SeCoT\Interesse;
use Auth;
use DB;

class palestraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrar()
    {
    	if (Auth::user()->nivel == 1)
            $palestras = palestra::withTrashed()->get();
        else 
            $palestras = palestra::leftJoin('interesses as i',
                function($join) {
                    $join->on('i.id_palestra', '=', 'palestras.id');
                    $join->on('i.id_pessoa', '=', DB::raw(auth()->user()->id));
                }
                )->select(['palestras.id as id', 'palestras.titulo as titulo', 'palestras.descricao as descricao', 'palestras.palestrante as palestrante', 'i.id_pessoa as id_pessoa'])->get();
    	
    	return view('inicio')->with('palestras', $palestras);
    }

    public function cadastrar(Request $request)
    {
    	palestra::create($request->all());
    	
    	return redirect()->route('listaPalestras')->withInput($request->only('titulo'));
    }

    public function remover($id)
    {
        palestra::find($id)->delete();
        return redirect()->route('listaPalestras');
    }

    public function ativar($id)
    {
        palestra::withTrashed()->find($id)->restore();
        return redirect()->route('listaPalestras');
    }
}
