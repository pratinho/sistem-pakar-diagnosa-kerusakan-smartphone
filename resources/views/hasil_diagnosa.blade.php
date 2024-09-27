<h3>Hasil Diagnosa</h3>

@if(count($diagnosa) > 0)
    @foreach($diagnosa as $result)
        <h4>{{ $result['kerusakan'] }}</h4>
        <p>Certainty Factor: {{ $result['certainty_factor'] }}%</p>
        <p>{{ $result['keterangan'] }}</p>
    @endforeach
@else
    <p>Tidak ada hasil diagnosa yang ditemukan.</p>
@endif
