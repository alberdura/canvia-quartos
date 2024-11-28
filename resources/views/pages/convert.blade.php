@extends('layouts.app')

@section('title', 'Convertidor de Divisas')

@section('content')
    <h1>Convertidor de Divisas</h1>
    <form action="{{ route('convert') }}" method="POST">
        @csrf
        <label for="from_currency">De:</label>
        <select id="from_currency" name="from_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
        </select>
        
        <label for="to_currency">A:</label>
        <select id="to_currency" name="to_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
        </select>

        <label for="amount">Cantidad:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>

        <button type="submit">Convertir</button>
    </form>
    @if (session('result'))
        <p>Resultado: {{ session('result') }}</p>
    @endif
@endsection
