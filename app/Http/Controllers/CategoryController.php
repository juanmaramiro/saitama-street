<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        if (Auth::user()->admin == 1)
        {
            $categories = Category::all();
            return view('admin/categories', ['categories' => $categories]);
        } else {
            return view('accessDenied');
        }
    }

    public function add()
    {
        if (Auth::user()->admin == 1)
        {
            $categories = Category::all();
            return view('admin/addCategory', ['categories' => $categories]);
        } else {
            return view('accessDenied');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->admin == 1)
        {
            $model = new Category();
            $model->category_name = $request->post('category_name');
            $model->save();

            return redirect('admin/categories');
        } else {
            return view('accessDenied');
        }       
    }

    public function edit($id)
    {
        if (Auth::user()->admin == 1)
        {
            if ($category = Category::find($id))
            {
                return view('admin/editCategory', compact('category'));

            } 
        } else {
            return view('accessDenied');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->admin == 1)
        {
            $model = Category::find($id);
            $model->category_name = $request->post('category_name');
            $model->update();

            return redirect('admin/categories');
        } else {
            return view('accessDenied');
        }
    }

    public function delete(Request $request, $id)
    {
        if (Auth::user()->admin == 1)
        {
            $model=Category::find($id);
            $model->delete();

            return redirect('admin/categories');
        } else {
            return view('accessDenied');
        }

        
    }

}
