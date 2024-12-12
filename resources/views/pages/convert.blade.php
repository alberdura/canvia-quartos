@extends('layouts.app')

@section('title', 'Convertidor de Divisas')

@section('convert')
 <div class="container py-5">

    <div class="text-center mb-4">
      <h1 class="fw-bold">Convertidor de moneda</h1>
      <p class="text-muted">Comproveu els tipus de canvi en temps real i convertiu monedes a l'instant.</p>
    </div>

    <!-- Currency Converter Card -->
    <div class="card shadow-lg p-4">
      <form action="{{ route('convert') }}" method="POST">
          @csrf
        <!-- Amount Input -->
        <div class="mb-3">
          <label for="amount" class="form-label fw-semibold">Quantitat</label>
          <input name="amount" type="number" id="amount" class="form-control" placeholder="Enter amount" required>
        </div>

        <!-- Currency Selector (From) -->
        <div class="mb-3">
          <label for="fromCurrency" class="form-label fw-semibold">De</label>
          <select name="from_currency" id="fromCurrency" class="form-select">
            <option value="USD">USD - US Dollar</option>
            <option value="EUR" selected>EUR - Euro</option>
            <option value="GBP">GBP - British Pound</option>
            <option value="JPY">JPY - Japanese Yen</option>
          </select>
        </div>

        <!-- Currency Selector (To) -->
        <div class="mb-3">
          <label for="toCurrency" class="form-label fw-semibold">A</label>
          <select name="to_currency" id="toCurrency" class="form-select">
            <option value="USD">USD - US Dollar</option>
            <option value="EUR">EUR - Euro</option>
            <option value="GBP" selected>GBP - British Pound</option>
            <option value="JPY">JPY - Japanese Yen</option>
          </select>
        </div>

        <!-- Convert Button -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary fw-bold">Convertir</button>
        </div>
      </form>
    </div>

     @if(isset($result) and isset($to_currency))
        <div class="mt-4 text-center">
          <h4>Import convertit:</h4>
          <p class="display-5 fw-bold text-primary">
              {{ $result }}
              {{ $to_currency }}
          </p>
        </div>
     @endif
  </div>
  <div>
    <script src="/resources/js/graphic.js">

    </script>
  </div>
@endsection

@if(isset($result) and isset($to_currency))
  @include('pages.currencyTable')
@endif