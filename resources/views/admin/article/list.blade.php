@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><a href="/admin/articles/add" class="btn btn-primary">Add article</a></div>
            <div class="col-lg-6">Articles: </div>
        </div>
        <div class="row">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>Picture</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($articles as $art)
                <tr>
                    <td>{{ $art->id }}</td>
                    <td>{{ $art->title }}</td>
                    <td>{{ $art->category->title }}</td>
                    <td>{{ strip_tags(substr($art->description, 0, 50)) }}...</td>
                    <td><img width="64" src="{{ $art->image->url }}" alt=""></td>
                    <td>
                        <a href="/admin/articles/item/{{ $art->id }}" class="btn btn-success">Edit</a>
                        <a href="/admin/articles/item/{{ $art->id }}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection