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
    <title>@yield('title')</title>
</head>
<body class="font-nunito">
    <div class="flex flex-row min-h-screen">
        <div class="w-56 bg-gradient-to-b from-primary to-primary-dark p-4 text-white">
            <!-- Title -->
            <div class="flex items-center justify-center gap-4">
                <img src="{{asset('images/app_icon.svg')}}" alt="app icon" class="-rotate-12 w-[2.05rem] h-[2.05rem]">
                <div class="font-extrabold text-center text-base">
                    <p>ADMIN</p>
                    <p>INVENTORI</p>
                </div>
            </div>
            <div class="line"></div>
            <a href="/" class="w-full flex items-center gap-2 menu-active" id="dashboard">
                <img src="{{asset('images/dashboard_icon.svg')}}" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Dashboard</p>
            </a>
            <div class="line"></div>
            <p class="opacity-50">Manajemen</p>
            <a href="{{ route('category.index') }}" class="w-full flex items-center gap-2 opacity-50 mt-8" id="barang">
                <img src="{{asset('images/kategori_icon.svg')}}" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Kategori</p>
            </a>
            <a href="{{ route('item.index') }}" class="w-full flex items-center gap-2 opacity-50 mt-8" id="barangMasuk">
                <img src="{{asset('images/barang_icon.svg')}}" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang</p>
            </a>
            <a href="{{ route('item-in.index') }}" class="w-full flex items-center gap-2 opacity-50 mt-8" id="barangKeluar">
                <img src="{{asset('images/barang_masuk_icon.svg')}}" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang Masuk</p>
            </a>
            <a href="{{ route('item-out.index') }}" class="w-full flex items-center gap-2 opacity-50 mt-8">
                <img src="{{asset('images/barang_keluar_icon.svg')}}" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang Keluar</p>
            </a>
        </div>
        <div class="flex-grow flex flex-col">
            <div class="w-full shadow-lg h-[70px] py-2 px-8 flex items-center justify-between">
                <div class="w-[400px] h-[38px] rounded-md overflow-hidden flex">
                    <input type="text" placeholder="search for..." class="flex-grow bg-admin-gray py-1.5 px-3 rounded-l-lg focus:border-2 focus:border-blue-200">
                    <div class="w-10 h-full bg-primary flex items-center justify-center">
                        <img src="{{asset('images/search_icon.svg')}}" alt="search" class="w-3.5">
                    </div>
                </div>
                <div class="flex h-full items-center">
                    <div class="flex gap-8">
                        <img src="{{asset('images/bell_icon.svg')}}" alt="notification" class="opacity-25 w-4">
                        <img src="{{asset('images/mail_icon.svg')}}" alt="mail" class="opacity-25 w-4">
                    </div>
                    <div class="bg-black opacity-15 h-3/4 w-[2px] mx-4"></div>
                    <div class="flex items-center gap-4">
                        <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                        <div class="w-8 aspect-square rounded-full">
                            <img src="{{asset('images/undraw_profile.svg')}}" alt="profile" class="w-full h-full">
                        </div>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="border rounded-lg bg-admin-danger text-white p-2">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="h-6 bg-gradient-to-t from-gray-100 to-gray-200"></div>
            <div class="px-6 pb-8 bg-gray-100 flex-grow">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
