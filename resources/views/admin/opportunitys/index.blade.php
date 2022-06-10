@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')

    <div class="card">
    	<div class="card-header d-flex align-items-center">
            <div class="mr-auto p-2">
                <h3 class="card-title">Todas as oportunidades</h3>
            </div>
            <div class="p-2">
    		    <a href="{{ route('admin.opportunitys.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
            </div>
        </div>
       	<div class="card-body">
       	    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($opportunitys as $opportunity)
                        <tr>
                            <td>{{ $opportunity->title }}</td>
                            <td>{{ $opportunity->slug }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('admin.opportunitys.edit', $opportunity) }}" class="btn btn-info style-button"><i class="fa fa-edit"></i> Editar</a>
                                <form action="{{ route('admin.opportunitys.destroy', $opportunity) }}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger style-button" onclick="return confirm('Deseja realmente excluir a oportunidade {{ $opportunity->title }}?');"><i class="fa fa-trash"></i> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td>
                            Não há nenhuma oportunidade.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
    	</div>
    </div>
@stop