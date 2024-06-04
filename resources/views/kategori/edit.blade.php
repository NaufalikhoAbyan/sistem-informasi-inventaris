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
        <p class="text-[28px] opacity-60">Edit Kategori</p>
    </div>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="description" value="{{$category->description}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="category">
                    <option value="A" {{$category->category == "A" ? "selected" : ""}}>A</option>
                    <option value="M" {{$category->category == "M" ? "selected" : ""}}>M</option>
                    <option value="BHP {{$category->category == "BHP" ? "selected" : ""}}">BHP</option>
                    <option value="BTHP" {{$category->category == "BTHP" ? "selected" : ""}}>BTHP</option>
                </select>
            </div>
            <button type="submit" class="button-primary w-fit">Edit</button>
        </div>
    </form>
@endsection
