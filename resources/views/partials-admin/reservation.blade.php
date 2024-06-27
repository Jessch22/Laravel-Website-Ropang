<div id="reservations" class="content-section" style="display:none;">
    <h2>Reservation</h2>
    <!-- <button class="add-btn" onclick="addReservation()">Add Reservation</button> -->
    <div class="table-container">
    @if ($reservations->isEmpty())
        <p>No reservation available.</p>
    @else
        <table id="reservation-table">
            <thead>
                <tr>
                    <th><a href="#" onclick="sortTable('number', 'reservation-table')">No.</a></th>
                    <th><a href="#" onclick="sortTable('name', 'reservation-table')">Customer Name</a></th>
                    <th><a href="#" onclick="sortTable('email', 'reservation-table')">Email</a></th>
                    <th><a href="#" onclick="sortTable('phone', 'reservation-table')">Phone</a></th>
                    <th><a href="#" onclick="sortTable('date', 'reservation-table')">Date</a></th>
                    <th><a href="#" onclick="sortTable('time', 'reservation-table')">Time</a></th>
                    <th><a href="#" onclick="sortTable('people', 'reservation-table')">People</a></th>
                    <th><a href="#" onclick="sortTable('message', 'reservation-table')">Message</a></th>
                    <th><a href="#" onclick="sortTable('status', 'reservation-table')">Status</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="reservation-table-body">
            @foreach ($reservations as $res)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $res->name }}</td>
                    <td>{{ $res->email }}</td>
                    <td>{{ $res->phone }}</td>
                    <td>{{ $res->date->format('d-m-Y') }}</td>
                    <td>{{ $res->time->format('H:i')  }}</td>
                    <td>{{ $res->people }}</td>
                    <td>{{ $res->message }}</td>
                    <td>
                        <select value='{{ $res->status }}' onchange="updateReserveStatus(this.value, '{{ $res->id }}')">
                            <option value="pending"{{ $res->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed"{{ $res->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled"{{ $res->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </td>
                    <td>
                        <form action="{{ route('admin.reservation.destroy', $res->id) }}" method="POST" class="d-inline">
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
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function updateReserveStatus(status, reservationId) {
    axios.post('/updateReserveStatus', {
        status: status,
        reservationId: reservationId
    })
    .then(response => {
        console.log(response.data, status, reservationId);
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
            case 'phone':
                compare = (rowA, rowB) => {
                    const phoneA = rowA.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const phoneB = rowB.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    return phoneA.localeCompare(phoneB);
                };
                break;
            case 'date':
                compare = (rowA, rowB) => {
                    const dateA = new Date(rowA.querySelector('td:nth-child(5)').textContent);
                    const dateB = new Date(rowB.querySelector('td:nth-child(5)').textContent);
                    return dateA - dateB;
                };
                break;
            case 'time':
                compare = (rowA, rowB) => {
                    const timeA = rowA.querySelector('td:nth-child(6)').textContent;
                    const timeB = rowB.querySelector('td:nth-child(6)').textContent;
                    return timeA.localeCompare(timeB);
                };
                break;
            case 'people':
                compare = (rowA, rowB) => {
                    const peopleA = parseInt(rowA.querySelector('td:nth-child(7)').textContent);
                    const peopleB = parseInt(rowB.querySelector('td:nth-child(7)').textContent);
                    return peopleA - peopleB;
                };
                break;
            case 'message':
                compare = (rowA, rowB) => {
                    const messageA = rowA.querySelector('td:nth-child(8)').textContent.toLowerCase();
                    const messageB = rowB.querySelector('td:nth-child(8)').textContent.toLowerCase();
                    return messageA.localeCompare(messageB);
                };
                break;
            case 'status':
                compare = (rowA, rowB) => {
                    const statusA = rowA.querySelector('td:nth-child(9) select').value;
                    const statusB = rowB.querySelector('td:nth-child(9) select').value;
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
