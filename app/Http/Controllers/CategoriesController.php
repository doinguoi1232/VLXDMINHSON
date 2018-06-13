<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()       
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
       
    }
    public function create()       
    {
        return view('admin.categories.add');
       
    }
    public function store(Request $request )       
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ],
                [
            'name.required' => 'Vui lòng nhập tên loại sản phẩm',
        ]); 
        $category=new category;
        $category->name=$request->name;
        $category->alias=$request->name;
        $category->parent_id=11;
        $category->keywords=$request->name;
        $category->description=222;
        $category->save();


       
    }
}
