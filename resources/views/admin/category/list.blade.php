@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <h1>Category management</h1>
        </div>
        <div class="row">
            <div class="col-lg-6"><a href="/admin/categories/add" class="btn btn-primary">Create Category</a></div>
            <div class="col-lg-6">Categories: {{ count($categories) }}</div>
        </div>
        <div class="row">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Alias</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->alias }}</td>
                    <td>{{ $cat->title }}</td>
                    <td>
                        <a href="/admin/categories/item/{{ $cat->id }}" class="btn btn-success">Edit</a>
                        <a href="/admin/categories/item/{{ $cat->id }}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection