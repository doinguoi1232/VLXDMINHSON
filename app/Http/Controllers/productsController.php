<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\products;
use App\stores;
class productsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add')->with('categories', $categories);
       
    }
    
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ],
                [
            'name.required' => 'Vui lòng nhập tên sản phâm',
        ]); 
        $products=new products;
        $products->name=$request->name;
        $products->alias=$request->name;
        $products->price=$request->don_gia;
        $products->keywrod=$request->name;
        $products->soluong=$request->so_luong;
        $products->quycach=$request->name;
        $products->donvitinh=$request->don_vi;
        $products->ghichu=$request->ghi_chu;
        $products->description=222;
        $products->userd_id=1;
        $products->category_id=$request->categories;
        $products->providers_id=1;
        $products->save();
        $soluong_stores = stores::all();
           foreach ($soluong_stores as $soluong_store){
               if($soluong_store->name==$request->name){
                    $stores_soluong=stores::where('name',$request->name)->first();
                    $stores_id = stores::find($stores_soluong->id);
                    $stores_id->soluong=$stores_soluong->soluong+$request->so_luong;
                    $stores_id->save();
                    return redirect()->route('indexCategories');
               }
           }
        $stores=new stores;
        $stores->soluong=$request->so_luong;
        $stores->products_id=$products->id;
        $stores->userd_id=1;
        $stores->name=$request->name;
        $stores->save();
        return redirect()->route('indexCategories');
        
       
    }
}
