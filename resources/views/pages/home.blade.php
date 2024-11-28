@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a Cambio de Divisas</h1>
    <p>Consulta y convierte tus divisas en tiempo real.</p>
    <a href="{{ route('convert') }}">Ir a la calculadora de divisas</a>
@endsection
