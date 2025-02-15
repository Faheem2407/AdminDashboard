<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Amount;
use App\Models\Version;
use Exception;

class CardController extends Controller
{

    public function index()
    {
        $cards = Card::with('platform')->get();
        return view('backend.layouts.cards.index', compact('cards'));
    }

    public function create()
    {
        // $platforms = Platform::all();
        $platforms = Platform::all();
        $amounts = Amount::all();
        $versions = Version::all();
        return view('backend.layouts.cards.create', compact('platforms', 'amounts','versions'));
    }



    //recent comment
    public function store(Request $request)
    {
        $request->validate([
            'platform_id' => 'required|exists:platforms,id',
            'title' => [
                'required',
                'string',
                'unique:cards,title',
                'max:255',
                Rule::unique('cards')->where(function ($query) use ($request) {
                    return $query->whereRaw('LOWER(title) = ?', [strtolower($request->title)]);
                }),
            ],
            'image' => 'required|image|mimes:png,jpg,jpeg,ico|max:2048',
            'seller' => 'required|string|max:255',
            'type' => 'required|in:voucher,gift_card',
            'base_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'required|integer',
            'usage' => 'nullable|string',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'versions' => 'required|array',
            'versions.*' => 'string|exists:versions,id',
            'amounts' => 'required|array',
            'amounts.*' => 'integer|exists:amounts,id',
        ]);
        try{

            if ($request->hasFile('image')) {
                if ($request->image && Storage::exists('public/' . $request->image)) {
                    Storage::delete('public/' . $request->image);
                }
                $path = $request->file('image')->store('cards', 'public');
                $image = $path;
            }
        
            $card = Card::create([
                'platform_id' => $request->platform_id,
                'title' => strtolower($request->title),
                'image' => $image,
                'seller' => $request->seller,
                'type'=>$request->type,
                'base_price'=>$request->base_price,
                'discount'=> $request->discount,
                'stock'=> $request->stock,
                'usage'=> $request->usage,
                'description'=> $request->description,
                'delivery_time'=> $request->delivery_time,
            ]);
    
            // dd($dsada );

            $card->amounts()->sync($request->amounts);
            $card->versions()->sync($request->versions);

            return redirect()->route('cards.index')->with('success', 'Card created successfully.');

        }catch(Exception $e){
            return $e->getMessage();
        }


        return redirect()->route('cards.index')->with('success', 'Card created successfully.');
    }
    
    public function show(Card $card)
    {
        $card->load('amounts');
        return view('backend.layouts.cards.show', compact('card'));
    }

    public function edit(Card $card)
    {
        $platforms = Platform::all();
        $amounts = Amount::all();
        $versions = Version::all();
        return view('backend.layouts.cards.edit', compact('card', 'platforms', 'amounts','versions'));
    }


    public function update(Request $request, Card $card)
    {
        $request->validate([
            'platform_id' => 'required|exists:platforms,id',
            'title' => 'required|string|max:255|unique:cards,title,'.$card->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg,ico|max:2048',
            'seller' => 'required|string|max:255',
            'type' => 'required|in:voucher,gift_card',
            'base_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'required|integer',
            'usage' => 'nullable|string',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'versions' => 'nullable|array',
            'versions.*' => 'nullable|string|exists:versions,id',
            'amounts' => 'nullable|array',
            'amounts.*' => 'nullable|integer|exists:amounts,id',
        ]);

        if ($request->hasFile('image')) {
            if ($card->image && Storage::exists('public/' . $card->image)) {
                Storage::delete('public/' . $card->image);
            }
            $path = $request->file('image')->store('cards', 'public');
            $card->image = $path;
        }

        $card->update([
            'platform_id' => $request->platform_id,
            'title' => $request->title,
            'image' => isset($path) ? $path : $card->image,
            'seller' => $request->seller,
            'type' => $request->type,
            'base_price' => $request->base_price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'usage' => $request->usage,
            'description' => $request->description,
            'delivery_time' => $request->delivery_time,
        ]);

        // Update amounts if provided, otherwise keep the previous amounts
        if ($request->has('amounts')) {
            $card->amounts()->sync($request->amounts);
        }

        // Update versions if provided, otherwise keep the previous versions
        if ($request->has('versions')) {
            $card->versions()->sync($request->versions);
        }


        return redirect()->route('cards.index')->with('success', 'Card updated successfully.');
    }






    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index')->with('success', 'Card deleted successfully.');
    }
}
