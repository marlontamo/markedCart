<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {   
        $total = \Cart::getTotal();
        $items = \Cart::getContent();
        return view('cart.cart',compact('items','total'));
    }

    public function addCart($productId)
    {
        $product = Product::findOrFail($productId);

        \Cart::add(array(
            'id' => $productId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image,

            ),
            'associatedModel' => $product
        ));

        return redirect()->route('cart')->with('success','Item has been addeed to the cart');
    }

    public function addQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity' => +1
        ]);

        return back()->with('success','Quantity has been increased');
    }

    public function decreaseQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity'=> -1
        ]);

        return back()->with('success','item quantity has been decreased');
    }

    public function removeItem($productId)
    {
        \Cart::remove($productId);
        return back()->with('success','item has been removed from the cart');
    }

    public function clearCart()
    {
        \Cart::clear();
        return back()->with('success','There is no item in your cart');
    }
    public function checkout(){

        return view('cart.checkout');
    }
}
