<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Tipe Kendaraan</title>
</head>
<body>

<h2>Data Tipe Kendaraan</h2>

<a href="/admin/tipeKendaraan/create">Tambah Tipe Kendaraan</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tipe Kendaraan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($tipeKendaraans as $index => $item)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->tipe_kendaraan }}</td>
        <td>
            <a href="/admin/tipeKendaraan/{{ $item->id }}/edit">Edit</a>

            <form action="/admin/tipeKendaraan/{{ $item->id }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Yakin hapus data ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
