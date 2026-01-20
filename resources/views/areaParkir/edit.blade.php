<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Area Parkir</title>
</head>
<body>

<h2>Edit Area Parkir</h2>

<form action="/admin/areaParkir/{{ $areaParkir->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Area</label><br>
        <input type="text" name="nama_area" value="{{ $areaParkir->nama_area }}">
        @error('nama_area')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <h4>Kapasitas per Tipe Kendaraan</h4>

    @foreach($tipeKendaraans as $tipe)
        @php
            $kapasitas = $areaParkir->detailKapasitas
                ->where('tipe_kendaraan_id', $tipe->id)
                ->first();
        @endphp

        <div>
            <label>{{ $tipe->nama_tipe }}</label><br>
            <input type="number"
                   name="kapasitas[{{ $tipe->id }}]"
                   value="{{ $kapasitas ? $kapasitas->kapasitas : 0 }}"
                   min="0">
        </div>
        <br>
    @endforeach

    @error('kapasitas')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>

    <button type="submit">Update</button>
    <a href="/admin/areaParkir">Kembali</a>

</form>

</body>
</html>
