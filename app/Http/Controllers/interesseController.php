<?php

namespace SeCoT\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SeCoT\Interesse;

class interesseController extends Controller
{
    public function verInteresse($id)
    {

        $interesses = DB::table('interesses as i')
            ->join('users as u', 'u.id', '=', 'i.id_pessoa')
            ->join('palestras as p', 'p.id', '=', 'i.id_palestra')
            ->select('u.name', 'u.email')
            ->where('i.id_palestra', '=', $id)
            ->orderBy('u.name', 'desc')
            ->get();

        return $interesses;
    }

    public function toggle($id)
    {
    	$interesses = interesse::where('id_pessoa', '=', auth()->user()->id)
    		->where('id_palestra', '=', $id)
    		->count();

    	if (!($interesses)) interesse::create(
    		array(
    			"id_pessoa" => auth()->user()->id,
    			"id_palestra" => $id,
    			"presenca" => 0
    		) 
    	);

    	else interesse::where('id_pessoa', '=', auth()->user()->id)
    	 ->where('id_palestra', '=', $id)->delete();
    	return redirect()->route('listaPalestras');
    }
}
