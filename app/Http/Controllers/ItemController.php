<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('barang.index', [
            'items' => $items,
            'count' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: make sure the stock is not 0 when a new item is created
        // TODO: stock will be 0 by default, if the stock is more that 0 when a new item is created, make an Item In data instead
        Item::create(
            $request->validate([
                'brand' => ['string', 'required'],
                'series' => ['string', 'required'],
                'specification' => ['string', 'required'],
                'stock' => ['integer', 'required'],
                'category_id' => ['integer', 'required'],
            ])
        );

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('barang.show', [
            'item' => $item,
            'category' => $item->category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('barang.edit', [
            'item' => $item,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // TODO: disable updating the stock value
        $item->update(
            $request->validate([
                'brand' => ['string', 'required'],
                'series' => ['string', 'required'],
                'specification' => ['string', 'required'],
                'stock' => ['integer', 'required'],
                'category_id' => ['integer', 'required'],
            ])
        );
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try{
            $item->delete();
        } catch(Exception $e){
            return redirect()->route('item.index')->withErrors(['error' => 'Data tidak dapat dihapus karena sedang digunakan oleh data lain']);
        }
        return redirect()->route('item.index');
    }
}
