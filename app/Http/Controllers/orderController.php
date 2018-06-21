<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\orderDetail;
use Illuminate\Support\Facades\DB;
use App\products;
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
       
    }    
    
    public function store(Request $request )       
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
        $orderId=$id;
        $order=  DB::table('orders_detail')->where('order_id',$id)->get();
        return view('admin.order.indexShow')
            ->with('order', $order)->with('orderId', $orderId);
    }

    public function createOrderDetail($id)
    {
        $detail=$id;
        $products = products::all();
        return view('admin.order.addStore')->with('products', $products)->with('detail', $detail);
    }
    
    public function storeOrderDetail(Request $request)
    {
        $products = products::findOrFail($request->ten_san_pham);
        $tienban=$products->giaban*$request->so_luong;
        $tiennhap=$products->price*$request->so_luong;
        $giaban=$products->giaban*$request->so_luong;
        $orderDetail=new orderDetail;  
        $orderDetail->sanpham=$request->ten_san_pham;
        $orderDetail->soluong=$request->so_luong;
        $orderDetail->dongia=$products->giaban;
        $orderDetail->tienchuathanhtoan=$tienban-$tiennhap-$request->giam_gia;
        $orderDetail->giamgia=$request->giam_gia;
        $orderDetail->thanhtien=$giaban-$request->giam_gia;
        $orderDetail->order_id=$request->order_id;
        $orderDetail->save();
        $order = order::findOrFail($request->order_id);
        $order->loinhuan=$order->loinhuan+$orderDetail->tienchuathanhtoan;
        $order->tongtien=$order->tongtien+$orderDetail->thanhtien;
        $order->save();
        return redirect()->route('indexOreder');
       
    }
}
