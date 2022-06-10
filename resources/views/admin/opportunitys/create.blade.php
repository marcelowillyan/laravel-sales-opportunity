@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')
@include('admin.partials.messages')
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
                    <label>Cliente: </label>
                    <input type="text" placeholder="Nome do cliente" class="form-control" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>Preço: </label>
                    <input type="text" placeholder="Valor da oportunidade" class="form-control price" name="price" value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label>Vendedor: </label>
                    <input type="text" placeholder="Nome do vendedor" class="form-control" name="seller" value="{{ old('seller') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
    	</div>
    </div>
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop