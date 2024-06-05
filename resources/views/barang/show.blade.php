@extends('layout.layout')
@section('title', 'Lihat Barang')
@section('content')
    <div class="flex flex-col gap-2">
        <a href="{{ route('item.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Lihat Barang</p>
    </div>

    <div class="card flex flex-col gap-4">
        <div>
            <p class="text-primary font-bold">Merk</p>
            <p class="text-2xl">{{$item->brand}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Seri</p>
            <p class="text-2xl">{{$item->series}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Spesifikasi</p>
            <p class="text-2xl">{{$item->specification}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Stok</p>
            <p class="text-2xl">{{$item->stock}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Kategori</p>
            <p class="text-2xl">({{$category->category}}) {{$category->description}}</p>
        </div>
    </div>
@endsection
