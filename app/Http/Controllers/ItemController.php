<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\ItemIn;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'brand' => ['string', 'required'],
            'series' => ['string', 'required'],
            'specification' => ['string', 'required'],
            'stock' => ['integer', 'min:0', 'required'],
            'category_id' => ['integer', 'required'],
        ]);
        $newItem = Item::create([
            'brand' => $request->brand,
            'series' => $request->series,
            'specification' => $request->specification,
            'stock' => 0,
            'category_id' => $request->category_id,
        ]);
        if ($request->stock > 0) {
            ItemIn::create([
                'in_date' => date('Y-m-d'),
                'in_quantity' => $request->stock,
                'item_id' => $newItem->id,
            ]);
        }
        if($request->hasFile('image')){
            $request->image->store('images', 'public');
            ItemImage::create([
                'filename' => $request->file('image')->hashName(),
                'item_id' => $newItem->id,
            ]);
        }

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
        // TODO: display original image when editing and add remove image option
        $request->validate([
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'brand' => ['string', 'required'],
            'series' => ['string', 'required'],
            'specification' => ['string', 'required'],
            'category_id' => ['integer', 'required'],
        ]);
        if($request->hasFile('image')){
            if($item->itemImage != null) {
                $item->itemImage->delete();
                Storage::disk('public')->delete('images/' . $item->itemImage->filename);
            }
            $request->image->store('images', 'public');
            ItemImage::create([
                'filename' => $request->file('image')->hashName(),
                'item_id' => $item->id,
            ]);
        }
        $item->update(
            $request->validate([
                'brand' => ['string', 'required'],
                'series' => ['string', 'required'],
                'specification' => ['string', 'required'],
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
