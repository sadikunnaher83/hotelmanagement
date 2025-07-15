<!DOCTYPE html>
<html>
  <head>

  @include('admin.css')

  </head>
  <body>
    @include('admin.header')
    <!-- Sidebar Navigation-->

    @include('admin.sider')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <h2 class="h5 no-margin-bottom">Bookings</h2>


          <table class="table table-striped">
            <tr>
              <th>Room_Id</th>
              <th> Customer Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Arival Date</th>
              <th>Leaving Date</th>
              <th>Status</th>
              <th>Room Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Delete</th>
              <th>Status Update</th>

            </tr>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->room_id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->startDate }}</td>
                <td>{{ $booking->endDate }}</td>
                {{-- <td>{{ $booking->status }}</td> --}}
                <td>
                @php
                    $status = strtolower($booking->status);
                @endphp

                @if($status === 'approved')
                    <span style="color: green;">Approved</span>
                @elseif($status === 'rejected')
                    <span style="color: red;">Rejected</span>
                @elseif($status === 'pending')
                    <span style="color: blue;">Pending</span>
                @else
                    <span style="color: gray;">Unknown</span>
                @endif
            </td>







                <td>{{ $booking->room->room_title }}</td>

                <td>{{ $booking->room->price }}</td>
                <td>
                    <img src="{{ asset('uploads/room/'.$booking->room->image) }}" alt="{{ $booking->room->room_title }}" width="40" height="50">
                </td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete this booking?');" class="btn btn-danger btn-sm" href="{{ url('bookingdelete', $booking->id) }}">Delete</a>
                </td>
                <td>
                    <span style="padding-bottom: 10px">
                       <a class="btn btn-success  btn-sm" href="{{ url('approvebook', $booking->id) }}">Approved</a>
                    </span>
                     <a class="btn btn-warning  btn-sm" href="{{ url('rejected', $booking->id) }}">Rejected</a>

                </td>

            </tr>
            @endforeach
          </table>
          <div class="d-flex justify-content-end mt-4">
            {{ $bookings->links() }}
          </div>
          </div>
        </div>
    </div>



     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>
