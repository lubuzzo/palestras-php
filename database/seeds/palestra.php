<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class palestra extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('palestras')->insert(array(
        	'titulo' => 'Como sobreviver à traição',
        	'palestrante' => 'Jon Snow',
        	'data' => '2017-01-10 07:31:00',
        	'descricao' => 'Jon Snow ensina como superar, se vingar e dar a volta por cima',
            'limite' => '0',
            'inscritos' => '0',
        ));

        DB::table('palestras')->insert(array(
            'titulo' => 'Porque eu nunca fui roubado',
            'palestrante' => 'Carinha que mora logo ali',
            'data' => '2017-01-11 07:31:00',
            'descricao' => 'Nesta palestra o carinha que mora logo ali ensina a chamar o método ConhecoMaicao()',
            'limite' => '20',
            'inscritos' => '0',
        ));          
    }
}
