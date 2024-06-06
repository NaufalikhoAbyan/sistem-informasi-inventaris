<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="font-nunito">
    <div class="bg-primary h-screen flex justify-center items-center">
        <div class="border w-fit p-0 rounded-lg bg-white shadow-md h-3/4 overflow-hidden flex items-center">
            <img src="{{asset('images/login-image.jpeg')}}" alt="login image" class="h-full">
            <div class="p-16 text-center">
                <p class="text-2xl">Welcome Back!</p>
                <form action="{{ route('authenticate') }}" class="flex flex-col gap-4 mt-8" method="POST">
                    @csrf
                    <input type="text" placeholder="Enter email address..." class="text-xl p-2 rounded-lg border border-primary-dark placeholder:text-sm" name="email">
                    <input type="password" placeholder="password" class="text-xl p-2 rounded-lg border border-primary-dark placeholder:text-sm" name="password">
                    <div class="flex gap-2">
                        <input type="checkbox" name="remember">
                        <p>Remember me</p>
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="text-admin-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <button type="submit" class="button-primary">Login</button>
                </form>
                <div class="bg-black opacity-15 w-full h-[2px] my-4"></div>
                <a href="/register" class="text-primary-dark">Create an Account!</a>
            </div>
        </div>
    </div>
</body>
</html>
