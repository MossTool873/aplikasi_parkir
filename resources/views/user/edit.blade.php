<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label>Email</label><br>
    <input type="email" name="email"
           value="{{ old('email', $user->email) }}"><br><br>

    <label>Password (kosongkan jika tidak diubah)</label><br>
    <input type="password" name="password"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama"
           value="{{ old('nama', $user->name) }}"><br><br>

    <label>Role</label><br>
    <select name="role_id">
        @foreach($roles as $role)
            <option value="{{ $role->id }}"
                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->role }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('user.index') }}">Kembali</a>
</form>

</body>
</html>
