@extends('layouts.admin')

@section('content')
    <h1>Create Menu</h1>
    <form action="{{ route('admin.menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="text">ImageUrl</label>
            <input type="text" id="image" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>
        <!-- tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Create Menu</button>
    </form>
@endsection
