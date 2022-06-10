@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')

    <div class="card">
    	<div class="card-header d-flex align-items-center">
            <div class="mr-auto p-2">
                <h3 class="card-title">Cadastrar oportunidade</h3>
            </div>
        </div>
       	<div class="card-body">
            <form method="POST" action="{{ route('admin.opportunitys.store') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Título: </label>
                    <input type="text" placeholder="Título da Configuração" class="form-control" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>Tipo: </label>
                    <select class="form-control" name="type">
                        <option disabled selected>Selecione...</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
    	</div>
    </div>
@stop