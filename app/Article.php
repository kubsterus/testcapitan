<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $per_page = 4;
    public function getPagination($articles, $page){
        $items = ceil(count($articles) / $this->per_page);
        $next = $page + 1;
        if($next<$items){
            $next = 0;
        }
        $prev = $page - 1;
        if($prev>0){
            $prev = $items - 1;
        }
        $pag = [];
        $pag["items"] = $items;
        $pag["next"] = $next;
        $pag["prev"] = $prev;
        $pag["page"] = $page;
        return $pag;
    }
    public function collect($page = null, $category = 0){

        if((empty($page)) and (empty($category))){
            $articles = static::all();
            for($i = 0; $i<count($articles); $i++){
                $article = $articles[$i];
                $article->category = Category::where("id", $article->category)->first();
                $article->image = Picture::where("id", $article->image)->first();
                $articles[$i] = $article;
            }
            return $articles;
        }
        else{
            if($category == 0){
                $offset = ceil($page * $this->per_page);
                $articles = static::offset($offset)->limit($this->per_page)->get();
                for($i = 0; $i<count($articles); $i++){
                    $article = $articles[$i];
                    $article->category = Category::where("id", $article->category)->first();
                    $article->image = Picture::where("id", $article->image)->first();
                    $articles[$i] = $article;
                }
                return $articles;
            }
            else{
                $offset = ceil($page * $this->per_page);
                $articles = static::where("category", $category)->offset($offset)->limit($this->per_page)->get();
                for($i = 0; $i<count($articles); $i++){
                    $article = $articles[$i];
                    $article->category = Category::where("id", $article->category)->first();
                    $article->image = Picture::where("id", $article->image)->first();
                    $articles[$i] = $article;
                }
                return $articles;
            }

        }
    }
}
