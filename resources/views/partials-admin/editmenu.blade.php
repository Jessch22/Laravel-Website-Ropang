<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="menu" class="content-section">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Edit Menu Item</h2>
                <a href="/admin" class="btn btn-secondary">Kembali</a>
            </div>
            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Roti" {{ $menu->category === 'Roti' ? 'selected' : '' }}>Roti</option>
                        <option value="Indomie" {{ $menu->category === 'Indomie' ? 'selected' : '' }}>Indomie</option>
                        <option value="Nasi" {{ $menu->category === 'Nasi' ? 'selected' : '' }}>Nasi</option>
                        <option value="Pisang" {{ $menu->category === 'Pisang' ? 'selected' : '' }}>Pisang</option>
                        <option value="Ayam" {{ $menu->category === 'Ayam' ? 'selected' : '' }}>Ayam</option>
                        <option value="Lainnya" {{ $menu->category === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $menu->image }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $menu->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Menu</button>
            </form>
        </div>
    </div>
</body>
</html>
