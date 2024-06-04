@extends('layout.layout')
@section('title', 'Sistem Inventaris')
@section('content')
    <p class="text-[28px] opacity-60">Dashboard</p>
    <div class="flex gap-16 px-16 py-4">
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-primary font-bold">Kategori</p>
                <p class="text-3xl">0</p>
            </div>
            <img src="{{asset('images/kategori_icon_black.svg')}}" alt="kategori icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-green-500 font-bold">Barang</p>
                <p class="text-3xl">0</p>
            </div>
            <img src="{{asset('images/barang_icon_black.svg')}}" alt="barang icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-yellow-500 font-bold">Barang Masuk</p>
                <p class="text-3xl">0</p>
            </div>
            <img src="{{asset('images/barang_masuk_icon_black.svg')}}" alt="barang masuk icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-cyan-500 font-bold">Barang Keluar</p>
                <p class="text-3xl">0</p>
            </div>
            <img src="{{asset('images/barang_keluar_icon_black.svg')}}" alt="barang keluar icon" class="opacity-25 w-8">
        </div>
    </div>
@endsection
