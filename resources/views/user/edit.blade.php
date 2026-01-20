<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Edit User</h2>
    
        <form method="POST" action="/admin/user/{{ $user->id }}">
            @csrf

            <input type="text" name="username" value="{{ $user->username }}"><br>
            <input type="text" name="nama" value="{{ $user->nama }}"><br>
            <input type="number" name="no_telp" value="{{ $user->no_telp }}"><br>

            <select name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->role }}
                    </option>
                @endforeach
            </select><br>

            <button type="submit">Update</button>
        </form>
</body>
</html>