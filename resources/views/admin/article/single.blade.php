@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            @if(isset($article))
                <h1>Edit article: {{ $article->title }}</h1>
            @else
                <h1>Create article</h1>
            @endif
        </div>
        <div class="row">
            <form action="@if(isset($article)) /admin/articles/item/{{ $article->id }} @else /admin/articles/create @endif" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="title">Title: </label>
                <input required type="text" name="title" id="title" class="form-control" value="@if(isset($article->title)) {{ $article->title  }} @endif">
                <label for="description">Description: </label>
                <textarea required name="description" id="description" cols="30" rows="10" class="form-control">@if(isset($article->description)) {{ $article->description  }} @endif</textarea>
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="0">None</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @if(isset($article->category->id)) @if($cat->id == $article->category->id) selected @endif @endif>{{ $cat->title }}</option>
                    @endforeach
                </select>
                <br>
                <input type="hidden" name="image" value="@if(isset($article->image->id)) {{ $article->image->id }} @endif">
                <div class="col-lg-3">
                    <label for="picture">Picture: </label>
                    <input type="file" name="picture" id="picture">
                    <button class="btn btn-primary">@if(isset($article)) Update @else Create @endif</button>
                </div>
                <div class="col-lg-9"><img width="150" src="@if(isset($article->image->url)) {{ $article->image->url }} @endif" alt="" id="preview"></div>
                <br>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/create_article.js') }}"></script>
@endsection