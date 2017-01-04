<?php

namespace SeCoT\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SeCoT\Interesse;
use SeCoT\Palestra;

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

        if (!($interesses)) {
            $check = palestra::find($id)->get(['limite', 'inscritos']);
            $check = (json_decode($check[1]));
            if (($check->limite - $check->inscritos) > 0) {
                interesse::create(
            		array(
            			"id_pessoa" => auth()->user()->id,
            			"id_palestra" => $id,
            			"presenca" => 0
            		) 
            	);
                
                $Palestra = palestra::find($id);
                $Palestra->inscritos++;
                $Palestra->save();
            }
        }

    	else {
            interesse::where('id_pessoa', '=', auth()->user()->id)
    	       ->where('id_palestra', '=', $id)->delete();

            $Palestra = palestra::find($id);
            $Palestra->inscritos--;
            $Palestra->save();               
    	
        }

        return redirect()->route('listaPalestras');
    }
}
