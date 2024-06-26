@extends('layout.layout')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="flex flex-col gap-2">
        <a href="{{ route('category.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Tambah Kategori</p>
    </div>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="description">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="category">
                    <option value="A">A</option>
                    <option value="M">M</option>
                    <option value="BHP">BHP</option>
                    <option value="BTHP">BTHP</option>
                </select>
            </div>
            <button type="submit" class="button-primary w-fit">Tambah</button>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="text-admin-danger font-bold">{{$error}}</div>
                @endforeach
            @endif
        </div>
    </form>
@endsection
