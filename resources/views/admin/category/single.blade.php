@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            @if(isset($category))
                <h1>Edit category: {{ $category->title }}</h1>
            @else
                <h1>Cretate category</h1>
            @endif
        </div>
        <div class="row">
            <form action="@if(isset($category)) /admin/categories/item/{{ $category->id }} @else /admin/categories/create @endif" method="post">
                {{ csrf_field() }}
                    <label for="title">Title: </label>
                    <input required type="text" name="title" id="title" class="form-control" value="@if(isset($category->title)) {{ $category->title  }} @endif">
                    <label  for="alias">Alias: </label>
                    <input required type="text" name="alias" id="alias" class="form-control" value="@if(isset($category->title)) {{ $category->alias  }} @endif">
                    <button class="btn btn-primary">@if(isset($category)) Update @else Create @endif</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/create_category.js') }}"></script>
@endsection