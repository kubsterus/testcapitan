<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function add(){
        return view("admin.category.single");
    }
    function create(){
        $data = (object)Input::all();
        $category = new Category();
        $category->alias = $data->alias;
        $category->title = $data->title;
        $category->save();
        return redirect("/admin/categories/item/".$category->id);
    }
    function edit($id){
        $data = Input::all();
        if(!empty($data)){
            unset($data["_token"]);
            Category::where("id", $id)->update($data);
            return redirect("/admin/categories/item/".$id);
        }
        $category = Category::where("id", $id)->first();
        if($category == null){
            return redirect("/admin/categories/add");
        }
        return view("admin.category.single", ["category"=>$category]);
    }
    function delete($id){
        Category::destroy($id);
        return redirect("/admin/categories");
    }
    function all(){
        $categories = Category::all();
        return view("admin.category.list", ["categories"=>$categories]);
    }
}
