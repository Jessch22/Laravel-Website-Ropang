<div id="contact" class="content-section" style="display:none;">
    <h2>Contact</h2>
    <div class="table-container">
    @if ($contact->isEmpty())
        <p>No contacts available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menu-table-body">
            @foreach ($contact as $contact)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <select value='{{ $contact->status }}' onchange="updateContactStatus(this.value, '{{ $contact->id }}')">
                            <option value="pending"{{ $contact->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed"{{ $contact->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="closed"{{ $contact->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </td>
                    <td>
                        <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" class="d-inline">
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function updateContactStatus(status, contactId) {
    axios.post('/updateContactStatus', {
        status: status,
        contactId: contactId
    })
    .then(response => {
        console.log(response.data, status, contactId);
    })
    .catch(error => {
        console.error(error);
    });
    }

</script>