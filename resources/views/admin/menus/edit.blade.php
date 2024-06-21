@extends('layouts.admin')

@section('content')
    <h1>Edit Menu</h1>
    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $menu->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ $menu->price }}" required>
        </div>
        <div class="form-group">
            <label for="text">ImageUrl</label>
            <input type="text" id="image" name="image" class="form-control" value="{{ $menu->image }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" value="{{ $menu->category }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Menu</button>
    </form>
@endsection