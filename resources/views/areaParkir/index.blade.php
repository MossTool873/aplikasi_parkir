<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Area Parkir</title>
</head>
<body>

<h2>Data Area Parkir</h2>

<a href="/admin/areaParkir/create">Tambah Area Parkir</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Area</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($areaParkirs as $index => $area)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $area->nama_area }}</td>
            <td>
                <ul>
                    @foreach($area->detailKapasitas as $detail)
                        <li>
                            {{ $detail->tipeKendaraan->tipe_kendaraan }} :
                            {{ $detail->kapasitas }}
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="/admin/areaParkir/{{ $area->id }}/edit">Edit</a>
                <form action="/admin/areaParkir/{{ $area->id }}/delete" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
