<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function convertirMoneda(float $cantidad, string $monedaOrigen, string $monedaDestino): float
{
    // Si la moneda de origen y destino son iguales devuelvo la cantidad
    if (strtoupper($monedaOrigen) === strtoupper($monedaDestino)) {
        return $cantidad;
    }

    // Obtener el valor de la moneda de origen y destino en USD
    $valorOrigen = Currency::where('code', strtoupper($monedaOrigen))->value('value');
    $valorDestino = Currency::where('code', strtoupper($monedaDestino))->value('value');

    // Si no se encuentra alguno de los valores lanzo un error
    if (!$valorOrigen || !$valorDestino) {
        throw new Exception("No se encontraron valores");
    }

    // Calculo la tasa de cambio 
    $tasa = $valorDestino / $valorOrigen;

    return round($cantidad * $tasa, 2);
}
}
