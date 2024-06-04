@extends('layout.layout')
@section('title', 'Edit Kategori')
@section('content')
   <div class="flex flex-col gap-2">
        <a href="{{ route('category.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Lihat Kategori</p>
    </div>
    <div class="card flex flex-col gap-4">
        <div>
            <p class="text-primary font-bold">Deskripsi</p>
            <p class="text-2xl">{{$category->description}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Kategori</p>
            <p class="text-2xl">{{$category->category}}</p>
        </div>
    </div>
@endsection
