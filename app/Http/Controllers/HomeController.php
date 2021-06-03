<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\User;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest()
                    ->take(9)
                    ->get();
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();

        return view('index', ['products' => $products, 'carts' => $carts, 'categories' => $categories]);
    }

    public function home()
    {
        $products = Product::all();
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();

        return view('home', ['products' => $products, 'carts' => $carts, 'categories' => $categories]);
    }

    public function changeAvatar(Request $request)
    {
        $model = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = Auth::user()->name.'-'.$avatar->getClientOriginalName();
            \Storage::disk('avatar')->put($filename,  \File::get($avatar));
            \Storage::delete('users_avatar/'.$model->avatar);

            $model->avatar = $filename;
        }

        $model->update();

        return redirect('perfil');
    }

    public function changeEmail(Request $request)
    {
        $model = Auth::user();

        $model->email = $request->post('email');

        $model->update();

        return redirect('perfil');
    }

    public function changePassword(Request $request)
    {
        $model = Auth::user();

        $password = $request->post('password');
        $password = Hash::make($password);
        $model->password = $password;

        $model->update();

        return redirect('perfil');
    }

    public function contact()
    {
        return view('contact');
    }

    public function getCatalogue(Request $request, $name)
    {
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();
        
        switch($name){
            case "figuras":
                $products = Product::where('product_name', 'LIKE', 'Figura%')->latest()->get();
                break;
            case "camisetas":
                $products = Product::where('product_name', 'LIKE', 'Camiseta%')->latest()->get();
                break;
            case "funko-pop":
                $products = Product::where('product_name', 'LIKE', 'Funko%')->latest()->get();
                break;
            case "tazas":
                $products = Product::where('product_name', 'LIKE', 'Taza%')->latest()->get();
                break;
            case "fundas":
                $products = Product::where('product_name', 'LIKE', 'Funda%')->latest()->get();
                break;
            case "peluches":
                $products = Product::where('product_name', 'LIKE', 'Peluche%')->latest()->get();
                break;
            case "mascarillas":
                $products = Product::where('product_name', 'LIKE', 'Mascarilla%')->latest()->get();
                break;
        }

        return view('catalogue', ['products' => $products, 'carts' => $carts, 'categories' => $categories]);
    }

    public function getCollection(Request $request, $category)
    {
        $categories = Category::all();
        $coupons = Coupon::all();
        $carts = Cart::all();
        
        switch($category){
            case "final-fantasy":
                $products = Product::where('category_id', '=', 2)->latest()->get();
                break;
            case "assassins-creed":
                $products = Product::where('category_id', '=', 3)->latest()->get();
                break;
            case "dragon-ball":
                $products = Product::where('category_id', '=', 4)->latest()->get();
                break;
            case "harry-potter":
                $products = Product::where('category_id', '=', 5)->latest()->get();
                break;
            case "star-wars":
                $products = Product::where('category_id', '=', 6)->latest()->get();
                break;
            case "marvel":
                $products = Product::where('category_id', '=', 7)->latest()->get();
                break;
            case "dc-comics":
                $products = Product::where('category_id', '=', 8)->latest()->get();
                break;
            case "cine":
                $products = Product::where('category_id', '=', 9)->latest()->get();
                break;
            case "gaming":
                $products = Product::where('category_id', '=', 10)->latest()->get();
                break; 
        }

        return view('collection', ['products' => $products, 'carts' => $carts, 'categories' => $categories]);
    }


}
