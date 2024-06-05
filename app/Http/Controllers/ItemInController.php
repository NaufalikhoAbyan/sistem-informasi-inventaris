<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemIn;
use Illuminate\Http\Request;

class ItemInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang_masuk.index', [
            'itemIns' => ItemIn::all(),
            'count' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang_masuk.create', [
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemIn::create(
            $request->validate([
                'in_date' => ['date', 'required'],
                'in_quantity' => ['integer', 'min:0', 'required'],
                'item_id' => ['integer', 'required']
            ])
        );

        return redirect()->route('item-in.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemIn $item_in)
    {
        return view('barang_masuk.show', [
            'itemIn' => $item_in
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemIn $item_in)
    {
        return view('barang_masuk.edit', [
            'itemIn' => $item_in,
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemIn $item_in)
    {
        $item_in->update(
            $request->validate([
                'in_date' => ['date', 'required'],
                'in_quantity' => ['integer', 'min:0', 'required'],
                'item_id' => ['integer', 'required']
            ])
        );
        return redirect()->route('item-in.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemIn $item_in)
    {
        $item_in->delete();
        return redirect()->route('item-in.index');
    }
}
