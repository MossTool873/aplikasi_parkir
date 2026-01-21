<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tarif</title>
</head>
<body>

<h2>Tambah Tarif Tipe Kendaraan</h2>

@if ($errors->any())
<ul style="color:red;">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/admin/tarifTipeKendaraan" method="POST">
    @csrf

    <label>Tipe Kendaraan</label><br>
<select name="tipe_kendaraan_id">
    <option value="">-- Pilih Tipe Kendaraan --</option>
    @foreach ($tipeKendaraans as $tipe)
        <option value="{{ $tipe->id }}"
            {{ in_array($tipe->id, $tipeTerpakai) ? 'disabled' : '' }}>
            {{ $tipe->tipe_kendaraan }}
            {{ in_array($tipe->id, $tipeTerpakai) ? '(sudah ada tarif)' : '' }}
        </option>
    @endforeach
</select>

    <br><br>

    <label>Tarif Per Jam</label><br>
    <input type="number" name="tarif_perjam" min="0">
    <br><br>

    <button type="submit">Simpan</button>
    <a href="/admin/tarifTipeKendaraan">Kembali</a>
</form>

</body>
</html>
