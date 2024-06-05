@extends('layout.layout')
@section('title', 'Lihat Barang Keluar')
@section('content')
    <div class="flex flex-col gap-2">
        <a href="{{ route('item-out.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Lihat Barang Keluar</p>
    </div>

    <div class="card flex flex-col gap-4">
        <div>
            <p class="text-primary font-bold">Deskripsi</p>
            <p class="text-2xl">{{$itemOut->out_date}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Kategori</p>
            <p class="text-2xl">{{$itemOut->out_quantity}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Barang</p>
            <p class="text-2xl">{{$itemOut->item->brand}} {{$itemOut->item->series}}</p>
        </div>
    </div>
@endsection
