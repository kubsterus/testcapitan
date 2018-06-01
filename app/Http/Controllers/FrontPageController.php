<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    function index(){
        $categories = Category::all();
        $articles = new Article();
        $articles = $articles->collect();
        $artc = new Article();
        return view("layouts.front", ["categories"=>$categories, "articles"=>$articles]);
    }
    function category($alias = null , $page = null){
        if(empty($page)){
            $page = 0;
        }
        $categories = Category::all();
        if(!empty($alias)){
            $category = Category::where("alias", $alias)->first();
        }
        else{
            $category = $categories->first()->get();
        }
        $articles = new Article();
        $cat_articles = $articles->collect(null, $category->id);
        $articles = $articles->collect($page, $category->id);
        $artc = new Article();
        $pagination = $artc->getPagination($cat_articles, $page);
        return view("layouts.front", ["categories"=>$categories, "articles"=>$articles, "category"=>$category, "pagination"=>$pagination]);
    }
}
