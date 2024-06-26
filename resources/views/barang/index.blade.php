@extends('layout.layout')
@section('title', 'Barang')
@section('content')
    <div class="flex justify-between items-center">
        <p class="text-[28px] opacity-60">Barang</p>
        <a href="{{ route('item.create') }}">
            <button class="button-primary">
                Tambah +
            </button>
        </a>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-admin-danger font-bold">{{$error}}</p>
        @endforeach
    @endif
    <div class="border rounded-lg bg-white shadow-md mt-4">
        <div class="p-5 bg-admin-gray rounded-t-lg border-b">
            <p class="font-bold text-primary">Tabel Barang</p>
        </div>
        <div class="p-5 w-full">
            <table class="table w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">No.</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Gambar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Merk</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Seri</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Spesifikasi</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Stok</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Kategori</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Action</th>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$count}}.</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                        @if($item->itemImage)
                            <img src="{{asset('storage/images/' . $item->itemImage->filename)}}" alt="item image" class="w-12">
                        @else
                            Tidak ada Gambar
                        @endif
                    </td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$item->brand}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$item->series}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$item->specification}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$item->stock}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">({{$item->category->category}}) {{$item->category->description}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                        <div class="flex w-full justify-center gap-2">
                            <a href="{{ route('item.show', $item->id) }}" class="bg-primary p-2 flex items-center rounded-lg gap-4"><img src="{{asset('images/show_icon.svg')}}" alt="show" class="w-6"></a>
                            <a href="{{ route('item.edit', $item->id) }}" class="bg-admin-warning p-2 flex items-center rounded-lg gap-4"><img src="{{asset('images/edit_icon.svg')}}" alt="edit" class="w-6"></a>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah anda ingin menghapus data ini?');">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-admin-danger p-2 flex items-center rounded-lg gap-4" onclick="destroy()"><img src="{{asset('images/delete_icon.svg')}}" alt="delete" class="w-6"></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php
                    $count++
                @endphp
                @endforeach
                </thead>
            </table>
        </div>
    </div>
@endsection
