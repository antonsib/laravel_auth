<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token()}}">

        <title>Registration</title>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1> Введите логин и пароль для регистрации </h1>
        <form method="POST" action="{{ route('user.registration')}}">
            @csrf 
            <div class="form-group">
                <label for="name"> Name </label>
                <input class="form-control" id="name" name="name" type="text" value="" placeholder="name">
                @error('name')
                <div class="alert alert-danger">{{$message}} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email"> Email </label>
                <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
                @error('email')
                <div class="alert alert-danger">{{$message}} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password"> Password </label>
                <input class="form-control" id="password" name="password" type="password" value="" placeholder="password">
                @error('password')
                <div class="alert alert-danger">{{$message}} </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" name="sendMe" value="1"> Enter </button>
            </div>
        </form>
    </body>
</html>