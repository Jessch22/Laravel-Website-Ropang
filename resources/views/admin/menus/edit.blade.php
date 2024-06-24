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
    <label for="category">Category</label>
        <select id="category" name="category" class="form-control" required>
            <option value="" disabled selected>Select a category</option>
            <option value="ns-kuning" {{ $menu->category == 'ns-kuning' ? 'selected' : '' }}>Nasi Kuning</option>
            <option value="roti" {{ $menu->category == 'roti' ? 'selected' : '' }}>Roti</option>
            <option value="minuman" {{ $menu->category == 'minuman' ? 'selected' : '' }}>Minuman</option>
            <option value="mie" {{ $menu->category == 'mie' ? 'selected' : '' }}>Mie</option>
            <option value="lainnya" {{ $menu->category == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
</div>
        <button type="submit" class="btn btn-primary">Update Menu</button>
    </form>
@endsection