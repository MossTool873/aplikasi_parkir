<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tarif</title>
</head>
<body>

<h2>Edit Tarif Tipe Kendaraan</h2>

@if ($errors->any())
<ul style="color:red;">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/admin/tarifTipeKendaraan/{{ $tarif->id }}" method="POST">
    @csrf
    @method('PUT')

    <!-- TAMPIL SAJA (TIDAK BISA DIUBAH) -->
    <label>Tipe Kendaraan</label><br>
    <input type="text"
           value="{{ $tarif->tipeKendaraan->tipe_kendaraan }}"
           readonly>
    <br><br>

    <input type="hidden"
           name="tipe_kendaraan_id"
           value="{{ $tarif->tipe_kendaraan_id }}">

    <label>Tarif Per Jam</label><br>
    <input type="number"
           name="tarif_perjam"
           min="0"
           value="{{ old('tarif_perjam', $tarif->tarif_perjam) }}">
    <br><br>

    <button type="submit">Update</button>
    <a href="/admin/tarifTipeKendaraan">Kembali</a>
</form>

</body>
</html>
