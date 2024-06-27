<div id="users" class="content-section" style="display:none;">
    <h2>User</h2>
    <button class="add-btn" onclick="addUser()">Add User</button>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Purchases</th>
                    <th>Total Expenditure</th>
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
    // Kirim permintaan AJAX ke backend untuk memperbarui role
    axios.post('/updateUserRole', {
        role: role,
        userId: userId
    })
    .then(response => {
        console.log(response.data);
        // Beri feedback ke pengguna atau perbarui tabel jika perlu
        // Misalnya, perbarui tabel secara dinamis setelah perubahan berhasil
    })
    .catch(error => {
        console.error(error);
        // Handle error
    });
    }

</script>