@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')

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
                    <label>Título: </label>
                    <input type="text" placeholder="Título da Configuração" class="form-control" name="title" value="{{ $opportunity->title }}">
                </div>
                @if($opportunity->type == 'text' || $opportunity->type == 'telefone')
                    <div class="form-group">
                        <input type="text" class="form-control {{ $opportunity->type == 'telefone' ? 'tel' : '' }}" name="content" value="{{ $opportunity->content ?? '' }}">
                    </div>
                @elseif($opportunity->type == 'textarea' || $opportunity->type == 'editor')
                    <div class="form-group">
                        <label>Conteúdo: </label>
                        <textarea rows="3" type="text" placeholder="Texto" class="form-control {{ $opportunity->type == 'editor' ? 'ckeditor' : '' }}" name="content">{{ $opportunity->content ?? '' }}</textarea>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
    	</div>
    </div>
@stop