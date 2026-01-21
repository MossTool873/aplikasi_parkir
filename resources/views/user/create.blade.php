<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>

<h2>Tambah User</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

    <label>Role</label><br>
    <select name="role_id">
        <option value="">-- Pilih Role --</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">
                {{ $role->role }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Simpan</button>
    <a href="{{ route('user.index') }}">Kembali</a>
</form>

</body>
</html>
