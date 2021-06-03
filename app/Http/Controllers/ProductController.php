<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {       
        if(Auth::user()->admin == 1){
            $products = Product::all();
            $categories = Category::all();
            return view('admin/products', ['products' => $products, 'categories' => $categories]);
        } else {
            return view('accessDenied');
        }
    }

    public function add()
    {
        if (Auth::user()->admin == 1)
        {
            $products = Product::all();
            $categories = Category::all();
            return view('admin/addProduct', ['products' => $products, 'categories' => $categories]);
        } else {
            return view('accessDenied');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->admin == 1)
        {
            $model = new Product();

            $model->product_name = $request->post('product_name');
            $model->product_description = $request->post('product_description');
            $model->product_price = $request->post('product_price');
            $model->category_id = $request->post('product_category');

            ## Uploading and save image
            $image = $request->file('product_image');
            $filename = time().'-'.$image->getClientOriginalName();
            \Storage::disk('images')->put($filename,  \File::get($image));

            $model->product_image = $filename;
            $model->save();

            return redirect('admin/products');
        } else {
            return view('accessDenied');
        }
    }

    public function show($id)
    {
        if ($product = Product::find($id))
        {
            $categories = Category::all();
            $carts = Cart::all();
            return view('viewProducts', compact('product'), ['categories' => $categories, 'carts' => $carts]);
        }
    }

    public function edit($id)
    {
        if (Auth::user()->admin == 1)
        {
            if ($product = Product::find($id))
            {
                $categories = Category::all();
                return view('admin.editProduct', compact('product'), ['categories' => $categories]);
            }
        } else {
            return view('accessDenied');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->admin == 1)
        {
            $model = Product::find($id);

            $model->product_name = $request->post('product_name');
            $model->product_description = $request->post('product_description');
            $model->product_price = $request->post('product_price');
            $model->category_id = $request->post('product_category');

            ## check if image was uploaded
            if($request->hasFile('product_image'))
            {
                ## Uploading image
                $image = $request->file('product_image');
                $filename = time().'-'.$image->getClientOriginalName();
                \Storage::disk('images')->put($filename,  \File::get($image));

                \Storage::delete('products_images/'.$model->product_image);

                $model->product_image = $filename;

            }
            
            $model->update();

            return redirect('admin/products');
        } else {
            return view('accessDenied');
        }
    }

    public function delete($id)
    {
        if (Auth::user()->admin == 1)
        {
            $model=Product::find($id);

            \Storage::delete('products_images/'.$model->product_image);
            $model->delete();
            
            return redirect('admin/products');
        } else {
            return view('accessDenied');
        }
    }
}
