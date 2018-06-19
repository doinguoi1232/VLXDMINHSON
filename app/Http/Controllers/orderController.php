<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\orderDetail;
use Illuminate\Support\Facades\DB;
class orderController extends Controller
{
    public function index()       
    {
        $order = order::all();
        return view('admin.order.index')->with('order', $order);
       
    }
    
    public function create()       
    {
        return view('admin.order.add');
       
    }    public function store(Request $request )       
    {
        $this->validate($request, [
            'tenkhachhang' => 'required|max:255',
        ],
                [
            'tenkhachhang.required' => 'Vui lòng nhập tên loại sản phẩm',
        ]); 
        $order=new order;
        $order->tenkhachhang=$request->tenkhachhang;
        $order->tongtien=0;
        $order->tiendathanhtoan=$request->tiendathanhtoan;;
        $order->tienchuathanhtoan=0;
        $order->loinhuan=0;
        $order->userd_id=1;
        $order->save();
    }

    public function show($id)
    {
        $order=  DB::table('orders_detail')->where('order_id',$id)->get();
        return view('admin.order.indexShow')
            ->with('order', $order);
    }

    public function show($id)
    {
        $order=  DB::table('orders_detail')->where('order_id',$id)->get();
        return view('admin.order.indexShow')
            ->with('order', $order);
    }
}
