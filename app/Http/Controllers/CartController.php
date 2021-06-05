<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Coupon;
use App\Cart;
use DB;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();
        $discount = 0;

        $total = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.cart_product_id')
                ->where('carts.cart_user_id', '=', Auth::user()->id)
                ->sum(DB::raw('products.product_price*carts.product_quantity'));

        return view('userCart', ['products' => $products, 'carts' => $carts, 'categories' => $categories, 'total' => $total, 'discount' => $discount]);
    }

    public function store(Request $request)
    {
        $model = new Cart();

        $model->cart_user_id = $request->post('user_id');;
        $model->product_quantity = $request->post('product_quantity');
        $model->cart_product_id = $request->post('product_id');
        $model->save();
        
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $cartID = $request->post('cart_id');

        $model = Cart::find($cartID);

        $discount = 0;

        $model->product_quantity = $request->post('product_quantity_'.$cartID);

        $model->update();

        return redirect('carrito');

    }

    public function delete($id)
    {
        $model = Cart::find($id);

        $model->delete();
        
        return redirect('carrito');
    }

    public function checkout(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        $carts = Cart::all();
        $coupons = Coupon::all();
        $discount = 10;

        $total = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.cart_product_id')
                ->where('carts.cart_user_id', '=', Auth::user()->id)
                ->sum(DB::raw('products.product_price*carts.product_quantity'));

        return view('checkout', ['products' => $products, 'carts' => $carts, 'discount' => $discount, 'categories' => $categories, 'total' => $total]);
    }

    public function checkCoupon(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();

        $total = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.cart_product_id')
                ->where('carts.cart_user_id', '=', Auth::user()->id)
                ->sum(DB::raw('products.product_price*carts.product_quantity'));

        
        $code = $request->post('couponCh');

        foreach($coupons as $coupon)
        {
            if(strpos($coupon->coupon_code, '$code') !== false)
            {
                $discount = $coupon->coupon_value;
            } else {
                $discount = 10;
            }
        }

        return view('userCart', ['products' => $products, 'carts' => $carts, 'categories' => $categories, 'total' => $total, 'discount' => $discount]);
    }

}
