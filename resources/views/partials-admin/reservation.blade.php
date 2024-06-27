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
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menu-table-body">
            @foreach ($reservations as $res)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $res->name }}</td>
                    <td>{{ $res->date->format('d-m-Y') }}</td>
                    <td>{{ $res->time->format('H:i')  }}</td>
                    <td>{{ $res->guests }}</td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        </table>
    </div>
</div>