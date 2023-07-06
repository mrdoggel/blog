<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  <div class="login" >
    <form action="login" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
      @csrf
      <h1>Login</h1>
      <input name="username" type="text" placeholder="username" value="{{ old('username') }}" style="width: 300px">
      <input name="password" type="password" placeholder="password" style="width: 300px">
      <div class="buttons" style="width: 300px;">
        <a href="register">Register</a>
        <button type="submit">Login</button>
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