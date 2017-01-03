@extends('layouts.app')

@section('content')

@if ((Auth::user()) and Auth::user()->nivel == 1)
	@include('admin.novaPalestra')

  @include('admin.verInteressados')
@endif

<div id="palestras" class="panel-group">
@foreach ($palestras as $p)
  <div class="card panel panel-default">
  		<a data-toggle="collapse" data-parent="#palestras" href="#palestra{{ $p->id }}">
    		<div class="card-header panel-title">
	  			<h4 class="mb-0" @if($p->deleted_at or $p->id_pessoa) style="color: gray" @endif>
	  				{{ $p->titulo }} - {{ $p->palestrante }}
	  			</h5>
    		</div>
    	</a>

    <div id="palestra{{ $p->id }}" class="collapse" >
      <div class="card-block">
        {{ $p->descricao }}
        <br /><br />

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
                  <div class="btn-group" role="group">
                    <a href="/interesses/{{ $p->id }}"><input type="button" value="Declarar Interesse" class="btn btn-success btn-lg" /></a>
                  </div>                
                @endif
              @endif

            </div>
      </div>
    </div>
  </div>
@endforeach

</div>




@stop