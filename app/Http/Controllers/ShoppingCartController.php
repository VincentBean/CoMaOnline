<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function addToCart(Request $request, $id)
    {
        //Retrieves all the data from the model on the product
        $product = Product::find($id);

        //Lets check if the listed product has a promotion
        if ($product->promotion != null) {
            $cart = Cart::add($product->id, $product->title, $request->amount, $product->promotion->discount_price, 0, ['weight' => $product->weight, 'image' => $product->image_url]);
            return redirect()->back()->with('message', $product->title.' '.$request->amount.'x  terwaarde van: €'.$product->promotion->discount_price.'  toegevoegd aan winkelmandje.');
        } else {
            $cart = Cart::add($product->id, $product->title, $request->amount, $product->price, 0, ['weight' => $product->weight, 'image' => $product->image_url]);
            return redirect()->back()->with('message', $product->title.' '.$request->amount.'x terwaarde van: €'.($product->price * $request->amount).' toegevoegd aan winkelmandje.');
        }
        
    }

    public function index()
    {
        return view('frontend.shoppingcart.index');
    }

    public function delete($id)
    {
        if ($id != null) {
            $cartItem = Cart::content()->where('id', $id)->first();
            Cart::remove($cartItem->rowId);
        }

        return redirect()->route('home.cart');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->route('home.cart');
    }

    public function updateCart(Request $request)
    {
        $rules = $request->validate([
            'amount.*' => 'required|numeric|min:1|max:200',
        ]);
        // like a C# dictonary this input has a key and value
        // In this case the key provides us with the rowId to update each cart_item
        if($request->amount != null)
        {
            foreach ($request->amount as $key => $amount) {
                Cart::update($key, $amount); // This will update the quantity of products
            }
            return redirect()->back()->with('message', 'Winkelwagen bijgewerkt');
        }
        return redirect()->back();
    }
}
