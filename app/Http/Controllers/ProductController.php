<?php

namespace App\Http\Controllers;

use App\Events\ProductAddedToCart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Displaying list of available products
     * 
     * @return \Illuminate\Http\Resources
     */
    public function index()
    {
        return view('user.products.list')->with('products', Product::query()->available()->paginate(100));
    }

    /**
     * Add a product to the shopping cart
     * 
     * @param string number
     * @return \Illuminate\Http\Resources
     */
    public function addToCart($csrf_token, $number)
    {
        if ($csrf_token !== csrf_token()) {
            abort(419);
        }

        if (shopping_cart()->hasItem($number)) {
            return back()->with('error', 'Number is already added to the cart');
        }

        $product = Product::query()->where('number', $number)->first();
        
        if ($product) {
            if ($product->isAvailable()) {
                shopping_cart()->add($product, $number);

                // Fire an event to update the product status
                event(new ProductAddedToCart($product));

                return redirect()->back()->with(['success' => 'Product added to cart successfully']);
            }

            return redirect()->back()->with('warning', 'Product is not available for sale');
        }

        return redirect()->back()->with('error', 'Product not found');
    }
}
