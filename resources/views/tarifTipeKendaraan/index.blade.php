<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tarif Tipe Kendaraan</title>
</head>
<body>

<h2>Data Tarif Tipe Kendaraan</h2>

<a href="/admin/tarifTipeKendaraan/create">+ Tambah Tarif</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Tipe Kendaraan</th>
            <th>Tarif / Jam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarifTipeKendaraans as $no => $tarif)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $tarif->tipeKendaraan->tipe_kendaraan }}</td>
            <td>Rp {{ number_format($tarif->tarif_perjam, 0, ',', '.') }}</td>
            <td>
                <a href="/admin/tarifTipeKendaraan/{{ $tarif->id }}/edit">Edit</a>

                <form action="/admin/tarifTipeKendaraan/{{ $tarif->id }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
