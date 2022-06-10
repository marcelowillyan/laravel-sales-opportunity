@extends('adminlte::page')

@section('content_header')
    <h1>Oportunidades</h1>
@stop

@section('content')
@include('admin.partials.messages')
    <div class="card">
    	<div class="card-header">
    		<h3 class="card-title">Buscar Oportunidades</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="#">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vendedor: </label>
                            <input class="form-control" type="text" name="seller" value="{{ $seller ?? old('seller') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data: </label>
                            <input class="form-control date" type="text" name="date" placeholder="00/00/0000" value="{{ $date ?? old('date') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('admin.opportunitys.index') }}" class="btn btn-danger">Limpar Busca</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
    	<div class="card-header d-flex align-items-center">
            <div class="mr-auto p-2">
                <h3 class="card-title">Todas as oportunidades</h3>
            </div>
            <div class="p-2">
    		    <a href="{{ route('admin.opportunitys.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
            </div>
        </div>
       	<div class="card-body table-responsive p-0">
       	    <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Preço</th>
                        <th>Vendedor</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($opportunitys as $opportunity)
                        <tr>
                            <td class="align-middle">{{ $opportunity->title }}</td>
                            <td class="align-middle">{{ $opportunity->price }}</td>
                            <td class="align-middle">{{ $opportunity->seller }}</td>
                            <td class="align-middle">{{ date('d/m/Y - H:i:s', strtotime($opportunity->created_at)) }}</td>
                            <td class="align-middle">
                                @if($opportunity->status == 0)
                                    Aguardando ação...
                                @elseif($opportunity->status == 1)
                                    <span style="color: red;">Perdida</span>
                                @else
                                    <span style="color: orange;">Vencida</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="p-2">
                                        <a href="{{ route('admin.opportunitys.edit', $opportunity) }}" class="btn btn-info style-button"><i class="fa fa-edit"></i> Alterar Status</a>
                                    </div>
                                    <div class="p-2">
                                        <form action="{{ route('admin.opportunitys.destroy', $opportunity) }}" method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger style-button" onclick="return confirm('Deseja realmente excluir a oportunidade {{ $opportunity->title }}?');"><i class="fa fa-trash"></i> Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td>
                            Não há nenhuma oportunidade...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
    	</div>
    </div>
@stop
@section('js')
    <script src="/js/app.js"></script>
@stop