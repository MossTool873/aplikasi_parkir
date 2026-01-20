<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>

<body>

    @if (session('error'))
        <div style="color:red;">
            {{ session('error') }}
        </div>
    @endif

    <h2>Tambah User</h2>

    <form method="POST" action="/admin/user">
        @csrf

        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}"><br>
        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}"><br>
        <input type="text" name="password" placeholder="Password" value="{{ old('password') }}"><br>
        <input type="number" name="no_telp" placeholder="No Telp" value="{{ old('no_telp') }}"><br>

        <select name="role_id">
            <option value="">-- Pilih Role --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                    {{ $role->role }}
                </option>
            @endforeach
        </select><br>

        <button type="submit">Simpan</button>
    </form>

</body>

</html>
