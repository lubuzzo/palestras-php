@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                {{ Auth::user()->nivel }}

                <br />

                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ Auth::user()->id_qr }}" />
            </div>
        </div>
    </div>
</div>
@endsection
