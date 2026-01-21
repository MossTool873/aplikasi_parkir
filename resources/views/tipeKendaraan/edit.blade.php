<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tipe Kendaraan</title>
</head>
<body>

<h2>Edit Tipe Kendaraan</h2>

@if ($errors->any())
<ul style="color:red;">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/admin/tipeKendaraan/{{ $tipeKendaraan->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Tipe Kendaraan</label><br>
    <input type="text"
           name="tipe_kendaraan"
           value="{{ old('tipe_kendaraan', $tipeKendaraan->tipe_kendaraan) }}">
    <br><br>

    <button type="submit">Update</button>
    <a href="/admin/tipeKendaraan">Kembali</a>
</form>

</body>
</html>
