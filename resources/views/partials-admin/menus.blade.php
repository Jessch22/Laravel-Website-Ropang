<!-- menu -->
<div id="menu" class="content-section" style="display:none;">
    <h2>Menu</h2>
    <a href="{{ route('admin.menus.create') }}" class="add-btn">Add Menu Item</a>
    <div class="table-container">
    @if ($menus->isEmpty())
        <p>No menus available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menu-table-body">
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->category }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-link">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <!-- Delete form -->
                        <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>