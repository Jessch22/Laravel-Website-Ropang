<div id="contact" class="content-section" style="display:none;">
    <h2>Contact</h2>
    <div class="table-container">
    @if ($contact->isEmpty())
        <p>No contacts available.</p>
    @else
        <table id="contact-table">
            <thead>
                <tr>
                    <th><a href="#" onclick="sortTable('number', 'contact-table')">No.</a></th>
                    <th><a href="#" onclick="sortTable('name', 'contact-table')">Name</a></th>
                    <th><a href="#" onclick="sortTable('email', 'contact-table')">Email</a></th>
                    <th><a href="#" onclick="sortTable('subject', 'contact-table')">Subject</a></th>
                    <th><a href="#" onclick="sortTable('message', 'contact-table')">Message</a></th>
                    <th><a href="#" onclick="sortTable('status', 'contact-table')">Status</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="contact-table-body">
            @foreach ($contact as $contactItem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contactItem->name }}</td>
                    <td>{{ $contactItem->email }}</td>
                    <td>{{ $contactItem->subject }}</td>
                    <td>{{ $contactItem->message }}</td>
                    <td>
                        <select value='{{ $contactItem->status }}' onchange="updateContactStatus(this.value, '{{ $contactItem->id }}')">
                            <option value="pending"{{ $contactItem->status === 'pending' ? ' selected' : '' }}>Pending</option>
                            <option value="reviewed"{{ $contactItem->status === 'reviewed' ? ' selected' : '' }}>Reviewed</option>
                            <option value="closed"{{ $contactItem->status === 'closed' ? ' selected' : '' }}>Closed</option>
                        </select>
                    </td>
                    <td>
                        <form action="{{ route('admin.contact.destroy', $contactItem->id) }}" method="POST" class="d-inline">
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

    function sortTable(column, tableId) {
        const table = document.getElementById(tableId);
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
            case 'subject':
                compare = (rowA, rowB) => {
                    const subjectA = rowA.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const subjectB = rowB.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    return subjectA.localeCompare(subjectB);
                };
                break;
            case 'message':
                compare = (rowA, rowB) => {
                    const messageA = rowA.querySelector('td:nth-child(5)').textContent.toLowerCase();
                    const messageB = rowB.querySelector('td:nth-child(5)').textContent.toLowerCase();
                    return messageA.localeCompare(messageB);
                };
                break;
            case 'status':
                compare = (rowA, rowB) => {
                    const statusA = rowA.querySelector('td:nth-child(6) select').value;
                    const statusB = rowB.querySelector('td:nth-child(6) select').value;
                    return statusA.localeCompare(statusB);
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
