<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tipe Kendaraan</title>
</head>
<body>

<h2>Tambah Tipe Kendaraan</h2>

@if ($errors->any())
<ul style="color:red;">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/admin/tipeKendaraan" method="POST">
    @csrf

    <label>Tipe Kendaraan</label><br>
    <input type="text"
           name="tipe_kendaraan"
           value="{{ old('tipe_kendaraan') }}">
    <br><br>

    <button type="submit">Simpan</button>
    <a href="/admin/tipeKendaraan">Kembali</a>
</form>

</body>
</html>
