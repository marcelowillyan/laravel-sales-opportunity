@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')
@include('admin.partials.messages')
    <div class="card">  
    	<div class="card-header d-flex align-items-center">
            <div class="mr-auto p-2">
                <h3 class="card-title">Editar oportunidade</h3>
            </div>
        </div>
       	<div class="card-body">
            <form method="POST" action="{{ route('admin.opportunitys.update', $opportunity) }}">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="patch">
                <div class="form-group">
                    <label>Cliente: </label>
                    <input type="text" placeholder="Nome do cliente" class="form-control" name="title" value="{{ $opportunity->title }}" readonly>
                </div>
                <div class="form-group">
                    <label>Preço: </label>
                    <input type="text" placeholder="Valor da oportunidade" class="form-control" name="price" value="{{ $opportunity->price }}" readonly>
                </div>
                <div class="form-group">
                    <label>Vendedor: </label>
                    <input type="text" placeholder="Nome do vendedor" class="form-control" name="seller" value="{{ $opportunity->seller }}" readonly>
                </div>
                <div class="form-group">
                    <label>Status: </label>
                    <select class="form-control" name="status">
                        <option {{ ($opportunity->status == 0 ? "selected":"") }} value="0">Aguardando ação...</option>
                        <option {{ ($opportunity->status == 1 ? "selected":"") }} value="1">Perdida</option>
                        <option {{ ($opportunity->status == 2 ? "selected":"") }} value="2">Vencida</option>
                    </select>
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