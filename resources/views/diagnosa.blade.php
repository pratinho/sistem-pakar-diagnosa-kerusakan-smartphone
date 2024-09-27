<form action="/diagnosa" method="POST">
    @csrf <!-- Untuk keamanan form Laravel -->

    @if(count($gejalas) > 0)
    <form action="/diagnosa" method="POST">
        @csrf

        <h3>Pilih Gejala dan Tingkat Keyakinan Anda</h3>

        @foreach($gejalas as $gejala)
            <label>{{ $gejala->nama_gejala }}</label><br>

            <!-- Radio buttons untuk CF User -->
            <input type="radio" name="cf_user[{{ $gejala->kode_gejala }}]" value="0" id="cf_0_{{ $gejala->kode_gejala }}" checked>
            <label for="cf_0_{{ $gejala->kode_gejala }}">Tidak Yakin</label><br>

            <input type="radio" name="cf_user[{{ $gejala->kode_gejala }}]" value="0.4" id="cf_0_4_{{ $gejala->kode_gejala }}">
            <label for="cf_0_4_{{ $gejala->kode_gejala }}">Sedikit Yakin</label><br>

            <input type="radio" name="cf_user[{{ $gejala->kode_gejala }}]" value="0.6" id="cf_0_6_{{ $gejala->kode_gejala }}">
            <label for="cf_0_6_{{ $gejala->kode_gejala }}">Cukup Yakin</label><br>

            <input type="radio" name="cf_user[{{ $gejala->kode_gejala }}]" value="0.8" id="cf_0_8_{{ $gejala->kode_gejala }}">
            <label for="cf_0_8_{{ $gejala->kode_gejala }}">Yakin</label><br>

            <input type="radio" name="cf_user[{{ $gejala->kode_gejala }}]" value="1.0" id="cf_1_{{ $gejala->kode_gejala }}">
            <label for="cf_1_{{ $gejala->kode_gejala }}">Sangat Yakin</label><br><br>
        @endforeach

        <button type="submit">Diagnosa</button>
    </form>
@else
    <p>Tidak ada gejala yang tersedia.</p>
@endif

</form>
