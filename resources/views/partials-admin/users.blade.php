<div id="users" class="content-section" style="display:none;">
    <h2>User</h2>
    <a href="" class="add-btn">Add User</a>
    <div class="table-container">
        <table id="user-table">
            <thead>
                <tr>
                    <th><a href="#" onclick="sortTable('number')">No.</a></th>
                    <th><a href="#" onclick="sortTable('name')">Name</a></th>
                    <th><a href="#" onclick="sortTable('email')">Email</a></th>
                    <th><a href="#" onclick="sortTable('role')">Role</a></th>
                    <th><a href="#" onclick="sortTable('purchases')">Purchases</a></th>
                    <th><a href="#" onclick="sortTable('total_expenditure')">Total Expenditure</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="user-table-body">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <select onchange="updateUserRole(this.value, '{{ $user->id }}')">
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </td>
                    <td>{{ $user->purchases_count }}</td>
                    <td>Rp {{ number_format($user->purchases_sum_total_price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function updateUserRole(role, userId) {
        axios.post('/updateUserRole', {
            role: role,
            userId: userId
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error(error);
        });
    }

    function sortTable(column) {
        const table = document.getElementById('user-table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        
        let compare;

        switch(column) {
            case 'number':
                compare = (rowA, rowB) => {
                    const numA = parseInt(rowA.querySelector('td:nth-child(1)').textContent);
                    const numB = parseInt(rowB.querySelector('td:nth-child(1)').textContent);
                    return numA - numB;
                };
                break;
            case 'name':
                compare = (rowA, rowB) => {
                    const nameA = rowA.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const nameB = rowB.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    return nameA.localeCompare(nameB);
                };
                break;
            case 'email':
                compare = (rowA, rowB) => {
                    const emailA = rowA.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const emailB = rowB.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    return emailA.localeCompare(emailB);
                };
                break;
            case 'role':
                compare = (rowA, rowB) => {
                    const roleA = rowA.querySelector('td:nth-child(4) select').value;
                    const roleB = rowB.querySelector('td:nth-child(4) select').value;
                    return roleA.localeCompare(roleB);
                };
                break;
            case 'purchases':
                compare = (rowA, rowB) => {
                    const purchasesA = parseInt(rowA.querySelector('td:nth-child(5)').textContent);
                    const purchasesB = parseInt(rowB.querySelector('td:nth-child(5)').textContent);
                    return purchasesA - purchasesB;
                };
                break;
            case 'total_expenditure':
                compare = (rowA, rowB) => {
                    const expenditureA = parseFloat(rowA.querySelector('td:nth-child(6)').textContent.replace(/[^\d.-]/g, ''));
                    const expenditureB = parseFloat(rowB.querySelector('td:nth-child(6)').textContent.replace(/[^\d.-]/g, ''));
                    return expenditureA - expenditureB;
                };
                break;
            default:
                return;
        }

        rows.sort(compare);
        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
    }
</script>
