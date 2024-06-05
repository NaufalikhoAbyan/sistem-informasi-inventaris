@extends('layout.layout')
@section('title', 'Edit Barang Keluar')
@section('content')
    <div class="flex flex-col gap-2">
        <a href="{{ route('item-out.index') }}">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="{{asset('images/back_icon.svg')}}" alt="" class="h-8">
                <p>Back</p>
            </div>
        </a>
        <p class="text-[28px] opacity-60">Edit Barang Keluar</p>
    </div>

    <form action="{{ route('item-out.update', $itemOut->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Tanggal Keluar</p>
                <input type="date" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="out_date" value="{{$itemOut->out_date}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kuantitas</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="out_quantity" value="{{$itemOut->out_quantity}}">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="item_id">
                    @foreach($items as $item)
                        <option value="{{$item->id}}" {{$item->id == $itemOut->item_id ? "selected" : ""}}>{{$item->brand}} {{$item->series}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="button-primary w-fit">Tambah</button>
        </div>
    </form>
@endsection
