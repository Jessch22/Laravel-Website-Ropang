<div id="reservations" class="content-section" style="display:none;">
    <h2>Reservation</h2>
    <!-- <button class="add-btn" onclick="addReservation()">Add Reservation</button> -->
    <div class="table-container">
    @if ($reservations->isEmpty())
        <p>No reservation available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Pgone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>People</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menu-table-body">
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

</script>