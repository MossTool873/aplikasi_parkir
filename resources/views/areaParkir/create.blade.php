<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Area Parkir</title>
</head>
<body>

<h2>Tambah Area Parkir</h2>

<form action="/admin/areaParkir" method="POST">
    @csrf

    <div>
        <label>Nama Area</label><br>
        <input type="text" name="nama_area" value="{{ old('nama_area') }}">
        @error('nama_area')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <h4>Kapasitas per Tipe Kendaraan</h4>

    @foreach($tipeKendaraans as $tipe)
        <div>
            <label for="kapasitas[{{ $tipe->id }}]">{{ $tipe->tipe_kendaraan }}</label>
            <input type="number" name="kapasitas[{{ $tipe->id }}]" value="0" min="0">
        </div>
        <br>
    @endforeach

    @error('kapasitas')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>

    <button type="submit">Simpan</button>
    <a href="/admin/areaParkir">Kembali</a>

</form>

</body>
</html>
