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
                    <th><a href="#" onclick="sortTable('number')">No.</a></th>
                    <th><a href="#" onclick="sortTable('name')">Name</a></th>
                    <th><a href="#" onclick="sortTable('description')">Description</a></th>
                    <th><a href="#" onclick="sortTable('price')">Price</a></th>
                    <th><a href="#" onclick="sortTable('category')">Category</a></th>
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

<script>
    function sortTable(sortType) {
        const table = document.getElementById('menu-table-body');
        const rows = Array.from(table.rows);
        
        let compareFunction;

        switch(sortType) {
            case 'number':
                compareFunction = (a, b) => a.cells[0].innerText - b.cells[0].innerText;
                break;
            case 'name':
                compareFunction = (a, b) => a.cells[1].innerText.localeCompare(b.cells[1].innerText);
                break;
            case 'description':
                compareFunction = (a, b) => a.cells[2].innerText.localeCompare(b.cells[2].innerText);
                break;
            case 'price':
                compareFunction = (a, b) => parseFloat(a.cells[3].innerText) - parseFloat(b.cells[3].innerText);
                break;
            case 'category':
                compareFunction = (a, b) => a.cells[4].innerText.localeCompare(b.cells[4].innerText);
                break;
            default:
                return;
        }

        rows.sort(compareFunction);

        // Re-append rows in the sorted order
        rows.forEach(row => table.appendChild(row));
    }
</script>
