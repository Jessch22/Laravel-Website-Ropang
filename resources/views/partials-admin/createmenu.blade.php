<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="menu" class="content-section">
            <h2>Add Menu Item</h2>
            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                      <option value="roti">Roti</option>
                      <option value="indomie">Indomie</option>
                      <option value="nasi">Nasi</option>
                      <option value="pisang">Pisang</option>
                      <option value="ayam">Ayam</option>
                      <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>
</body>
</html>
