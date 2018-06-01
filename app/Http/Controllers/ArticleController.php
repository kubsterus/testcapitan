<?php

namespace App\Http\Controllers;

use App;
use App\Article;
use App\Category;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\VarDumper\Cloner\Data;

class ArticleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function add(){
        $categories = Category::all();
        return view("admin.article.single", ["categories"=>$categories]);
    }
    function create(Request $request){
        $picture_id = 0;
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $picture = new Picture();
            $path = public_path()."/uploads/";
            $file_name = time()."photo.".$file->getClientOriginalExtension();
            $file->move($path, $file_name);
            $picture->url = "/uploads/".$file_name;
            $picture->save();
            $picture_id = $picture->id;
        }
        $article = new Article();
        $article->title = $request->get("title");
        $article->description = $request->get("description");
        $article->category = $request->get("category");
        $article->image = $picture_id;
        $article->save();
        return redirect("/admin/articles/item/".$article->id);
    }
    function edit($id){
        $data = Input::all();
        $article = Article::where("id", $id)->first();
        if(!empty($data)){
            if($data["image"] != $article->image){
                if(Input::hasFile('picture')){
                    if($article->image != $data["image"]) {
                        $file = Input::file('picture');
                        $picture = new Picture();
                        $path = public_path() . "/uploads/";
                        $file_name = time() . "photo." . $file->getClientOriginalExtension();
                        $file->move($path, $file_name);
                        $picture->url = "/uploads/" . $file_name;
                        $picture->save();
                        $data['image'] = $picture->id;
                    }
                }
            }
            unset($data["_token"]);
            unset($data['picture']);
            Article::where("id", $id)->update($data);
            return redirect("/admin/articles/item/".$id);
        }
        $article = Article::where("id", $id)->first();
        $article->category = Category::where("id", $article->category)->first();
        $article->image = Picture::where("id", $article->image)->first();
        $categories = Category::all();
        if($article == null){
            return redirect("/admin/articles/add");
        }
        return view("admin.article.single", ["article"=>$article, "categories"=>$categories]);
    }
    function delete($id){
        Article::destroy($id);
        return redirect("/admin/articles");
    }
    function all(){
        $articles = new Article();
        $articles = $articles->collect();
        return view("admin.article.list", ["articles"=>$articles]);
    }
}
