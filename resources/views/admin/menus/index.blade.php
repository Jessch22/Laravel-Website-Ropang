@extends('layouts.admin')

@section('content')
    <h1>Menus</h1>
    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-2">Add New Menu</a>
    @if ($menus->isEmpty())
        <p>No menus available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->price }}</td>
                        <td>{{ $menu->category }}</td>
                        <td>
                            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
