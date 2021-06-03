<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{

    public function index()
    {
        if (Auth::user()->admin == 1)
        {
            $coupons = Coupon::all();
            return view('admin/coupons', ['coupons' => $coupons]);
        } else {
            return view('accessDenied');
        }
    }

    public function add()
    {
        if (Auth::user()->admin == 1)
        {
            $coupons = Coupon::all();
            return view('admin/addCoupon', ['coupons' => $coupons]);
        } else {
            return view('accessDenied');
        }
    }

    public function store(Request $request)
    {
        $model = new Coupon();
        $model->coupon_name = $request->post('coupon_name');
        $model->coupon_code = $request->post('coupon_code');
        $model->coupon_value = $request->post('coupon_value');
        $model->save();
        
        return redirect('admin/coupons');
    }

    public function edit($id)
    {
        if (Auth::user()->admin == 1)
        {
            if ($coupon = Coupon::find($id))
            {
                return view('admin.editCoupon', compact('coupon'));

            } 
        } else {
            return view('accessDenied');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->admin == 1)
        {
            $model = Coupon::find($id);
            $model->coupon_name = $request->post('coupon_name');
            $model->coupon_code = $request->post('coupon_code');
            $model->coupon_value = $request->post('coupon_value');
            $model->update();

            return redirect('admin/coupons');
        } else {
            return view('accessDenied');
        }
    }

    public function delete(Request $request, $id)
    {
        if (Auth::user()->admin == 1)
        {
            $model=Coupon::find($id);
            $model->delete();
        
            return redirect('admin/coupons');
        } else {
            return view('accessDenied');
        }
    }
}
