<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Product;
use App\Cart;
use App\Coupon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == 1)
        {
            $categories = Category::all();
            $products = Product::all();
            $carts = Cart::all();
            $coupons = Coupon::all();
            $users = User::all();
            return view('admin/dashboard', ['categories' => $categories, 'products' => $products, 'carts' => $carts, 'coupons' => $coupons, 'users' => $users]);
        } else {
            return view('accessDenied');
        }
    }

    public function listUsers()
    {
        if (Auth::user()->admin == 1)
        {
            $categories = Category::all();
            $products = Product::all();
            $carts = Cart::all();
            $coupons = Coupon::all();
            $users = User::all();
            return view('admin/users', ['categories' => $categories, 'products' => $products, 'carts' => $carts, 'coupons' => $coupons, 'users' => $users]);
        } else {
            return view('accessDenied');
        }
    }
}
