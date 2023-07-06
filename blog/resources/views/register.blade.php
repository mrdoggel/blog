<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
</head>
<body>
  <div class="login" >
    <form action="register" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
      @csrf
      <h1>Register</h1>
      <input name="username" type="text" placeholder="username" value="{{ old('username') }}" style="width: 300px">
      <input name="email" type="text" placeholder="email" value="{{ old('email') }}" style="width: 300px">
      <input name="password" type="password" placeholder="password" style="width: 300px">
      <input name="password_confirmation" type="password" placeholder="confirm password" style="width: 300px">
      <div class="buttons" style="width: 300px;">
        <a href="index.php">Login</a>
        <button type="submit">Register</button>
      </div>
      @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
      @endif
    </form>
  </div>
</body>
</html>