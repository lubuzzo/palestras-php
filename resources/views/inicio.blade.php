@extends('layouts.app')

@section('content')

@if ((Auth::user()) and Auth::user()->nivel == 1)
	@include('admin.novaPalestra')

  @include('admin.verInteressados')
@endif

<div id="palestras" class="panel-group">
	<?php $dataSemana = 'x';
	function diaDaSemana($data)
	{
		if ($data == '1' || $data == 'x') return 'Segunda';
		else if ($data == '2') return 'Terça';
		else if ($data == '3') return 'Quarta';
		else if ($data == '4') return 'Quinta';
	}
	$dataAnterior = '0';
	?>
@foreach ($palestras as $p)
	<?php $dataPalestra = date_create($p->data);
	$dataSemana = date_format($dataPalestra, "w");

	if (diaDaSemana($dataAnterior) != diaDaSemana($dataSemana)) echo "<h2>" . diaDaSemana($dataSemana) . "</h2>";
	$dataAnterior = date_format($dataPalestra, "w");

	?>
  <div class="card panel panel-default">
  		<a data-toggle="collapse" data-parent="#palestras" href="#palestra{{ $p->id }}">
    		<div class="card-header panel-title">
	  			<h4 class="mb-0" @if($p->deleted_at or $p->id_pessoa) style="color: gray" @endif>
						<?php $horaPalestra = date_format($dataPalestra, 'H:i'); ?>
						{{ $p->titulo }} - {{ $p->palestrante }} : {{ $horaPalestra }}
	  			</h5>
    		</div>
    	</a>

    <div id="palestra{{ $p->id }}" class="collapse" >
      <div class="card-block">
        {{ $p->descricao }}
        @if (!(is_null($p->limite)))
          <br /><br />
          <p style="color: red">
            @if (($p->limite - $p->inscritos) > 0)
              Restam {{$p->limite - $p->inscritos}} vagas
            @else
              Não restam vagas
            @endif
          </p>

        @else
          <br /><br />
        @endif

        @if($p->observacoes)
          <p style="color: red"><b>Obs: {{ $p->observacoes }}</b></p>
        @endif

        <div class="btn-group btn-group-justified" role="group">
                @if(Auth::user() and (Auth::user())->nivel == 1)

                  <div class="btn-group" role="group">
                      @if(!($p->deleted_at))
                        <a href="/palestras/remover/{{ $p->id }}"><input type="button" value="Desativar Palestra" class="btn btn-danger" /></a>
                      @else
                        <a href="/palestras/ativar/{{ $p->id }}"><input type="button" value="Ativar Palestra" class="btn btn-success" /></a>
                      @endif
                  </div>

                  <div class="btn-group" role="group">
                    <input type="button" value="Ver interessados" class="btn btn-default" onclick="interessados({{$p->id}}, '{{$p->titulo}}');" />
                  </div>

                @else

                @if ($p->id_pessoa)
                  <div class="btn-group" role="group">
                    <a href="/interesses/{{ $p->id }}"><input type="button" value="Retirar Interesse" class="btn btn-danger btn-lg" /></a>
                  </div>
                @else
                  @if ( (is_null($p->limite)) or (($p->limite - $p->inscritos) > 0) )
                    <div class="btn-group" role="group">
                      <a href="/interesses/{{ $p->id }}"><input type="button" value="Declarar Interesse" class="btn btn-success btn-lg" /></a>
                    </div>
                  @endif
                @endif
              @endif

            </div>
      </div>
    </div>
  </div>
@endforeach

</div>




@stop
