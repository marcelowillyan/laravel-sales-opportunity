@extends('adminlte::page')

@section('content_header')
    <h1>Administrativo - Laravel Sales Opportunity</h1>
@stop

@section('content')
    <p>Olá <strong>{{ Auth::user()->name }}</strong>! Você está acessando área administrativa da Laravel Sales Opportunity...</p>
@stop