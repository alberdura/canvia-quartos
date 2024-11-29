@extends('layouts.app')

@section('title', 'Convertidor de Divisas')

@section('tableContent')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<body>
    <header>
        <nav>
            <!-- <a href="{{ route('home') }}">Inicio</a> -->
            <a href="{{ route('convert') }}">Convertir</a>
            <a href="#table">Taula de conversions</a>
            <a href="#graphic">Gràfic de les monedes</a>
        </nav>
        
    </header>
    <div>
        <h1>Taula de conversions</h1>
    </div>
    
</body>
</html>
    @if (session('result'))
        <p>Resultado: {{ session('result') }}</p>
    @endif
@endsection