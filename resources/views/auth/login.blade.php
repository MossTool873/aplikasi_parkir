<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

{{-- ERROR --}}
@if ($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="/login">
    @csrf

    <label>Username</label><br>
    <input type="text"
           name="username"
           value="{{ old('username') }}">
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password">
    <br><br>

    <label>
        <input type="checkbox" name="remember" value="1">
        Remember Me
    </label>
    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
