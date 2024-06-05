<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOut;
use Illuminate\Http\Request;

class ItemOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang_keluar.index', [
            'itemOuts' => ItemOut::all(),
            'count' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang_keluar.create', [
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemOut::create(
            $request->validate([
                'out_date' => ['date', 'required'],
                'out_quantity' => ['integer', 'min:0', 'required'],
                'item_id' => ['integer', 'required']
            ])
        );
        return redirect()->route('item-out.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemOut $item_out)
    {
        return view('barang_keluar.show', [
            'itemOut' => $item_out
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemOut $item_out)
    {
        return view('barang_keluar.edit', [
            'itemOut' => $item_out,
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemOut $item_out)
    {
        $item_out->update(
            $request->validate([
                'out_date' => ['date', 'required'],
                'out_quantity' => ['integer', 'min:0', 'required'],
                'item_id' => ['integer', 'required']
            ])
        );
        return redirect()->route('item-out.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOut $item_out)
    {
        $item_out->delete();
        return redirect()->route('item-out.index');
    }
}
