@extends('layout.layout')
@section('title', 'Barang Keluar')
@section('content')
    <div class="flex justify-between items-center">
        <p class="text-[28px] opacity-60">Barang Keluar</p>
        <a href="{{ route('item-out.create') }}">
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
            <p class="font-bold text-primary">Tabel Barang Keluar</p>
        </div>
        <div class="p-5 w-full">
            <table class="table w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">No.</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Tanggal Keluar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Kuantitas Keluar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Barang</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Action</th>
                </tr>
                @foreach($itemOuts as $itemOut)
                    <tr>
                        <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$count}}.</td>
                        <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$itemOut->out_date}}</td>
                        <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$itemOut->out_quantity}}</td>
                        <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{$itemOut->item->brand}} {{$itemOut->item->series}}</td>
                        <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                            <div class="flex w-full justify-center gap-2">
                                <a href="{{ route('item-out.show', $itemOut->id) }}" class="bg-primary p-2 flex items-center rounded-lg gap-4"><img src="{{asset('images/show_icon.svg')}}" alt="show" class="w-6"></a>
                                <a href="{{ route('item-out.edit', $itemOut->id) }}" class="bg-admin-warning p-2 flex items-center rounded-lg gap-4"><img src="{{asset('images/edit_icon.svg')}}" alt="edit" class="w-6"></a>
                                <form action="{{ route('item-out.destroy', $itemOut->id) }}" method="POST" onsubmit="return confirm('Apakah anda ingin menghapus data ini?');">
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
@endsection
