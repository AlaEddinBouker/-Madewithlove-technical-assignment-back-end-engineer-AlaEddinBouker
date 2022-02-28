<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {

        return view('cart');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',

        ]);
        Cart::add(Str::slug($request->name), $request->name, 1, $request->price);
        Session::flash('success_message', 'Added to cart with success');
        return back();
    }
    public function delete($id)
    {
        $item = Cart::content()->where('rowId', $id)->first();
        if ($item != null) {
            $record = Record::where('slug', $item->id)->first();
            if ($record) {

                $record->update([
                    'occurence' => $record->occurence + 1,
                ]);
            } else {
                Record::create([
                    'name' => $item->name,
                    'slug' => $item->id,
                ]);
            }
            Cart::remove($id);
            Session::flash('success_message', 'Removed from cart with success');
            return back();
        } else {
            abort(404);
        }
    }
    public function checkout()
    {
        if (Cart::content()->count() == 0) {
            return redirect()->route('home');
        }
        Cart::destroy();
        Session::flash('success_message', 'Thank you for your order');
        return view('confirmation');
    }
}
