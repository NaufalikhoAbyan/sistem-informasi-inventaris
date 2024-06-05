@extends('layout.layout')
@section('title', 'Edit Kategori')
@section('content')
    <div class="flex flex-col gap-2">
        <a href="{{ route('item.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Edit Barang</p>
    </div>

    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Merk</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="brand" value="{{$item->brand}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Seri</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="series" value="{{$item->series}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">spesifikasi</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="specification" value="{{$item->specification}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Stok</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="stock" value="{{$item->stock}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kategori</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $item->category_id ? "selected" : ""}}>({{$category->category}}) {{$category->description}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="button-primary w-fit">Edit</button>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="text-admin-danger font-bold">{{$error}}</div>
                @endforeach
            @endif
        </div>
    </form>
@endsection
