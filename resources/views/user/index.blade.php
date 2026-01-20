<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Data User</h2>
    <a href="/admin/user/create">Tambahkan User</a>

<table border="1" cellpadding="5">
    <tr>
        <th>Username</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->nama }}</td>
        <td>{{ $user->role->role }}</td>
        <td>
            <a href="/admin/user/{{ $user->id }}/edit">Edit</a>
            <a href="/admin/user/{{ $user->id }}/delete"
               onclick="return confirm('Hapus user?')">
               Hapus
            </a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>