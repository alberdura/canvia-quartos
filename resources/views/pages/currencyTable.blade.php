
@section('tableContent')
  <div id="table" class="container py-5 text-center">

    <div class="text-center mb-4">
      <h1 class="fw-bold">Convertir {{ $from_currency }} a {{ $to_currency }}</h1>
    </div>
    <!-- <h1>Convertir {{ $from_currency }} a {{ $to_currency }}</h1> -->

    <div class="card shadow-lg p-4">

      <table class="table table-striped">
        <tr>
          <th class="bg-primary fw-bold text-light">{{ $from_currency }}</th>
          <th class="bg-primary fw-bold text-light">{{ $to_currency }}</th>
        </tr>

        @for ($i = 5; $i <= 100; $i+=5)
          <tr>
            <td>
              <a href="{{ route('convert.result', ['from_currency' => $from_currency, 'to_currency' => $to_currency, 'amount' => $amount]) }}">
                  {{ $i . ' ' . $from_currency }}
              </a>
            </td>
            <td>{{ $i * $tasa . ' ' . $to_currency}}</td>
          </tr>
        @endfor
      </table>
    </div>
  </div>
@endsection
