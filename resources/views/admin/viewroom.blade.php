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

          <h2 class="h5 no-margin-bottom">View Rooms</h2>

          <table class="table table-striped">
            <tr>
              <th>Room Title</th>
              <th>Image</th>
              <th>Description</th>
              <th>Price</th>
              <th>WiFi</th>
              <th>Room Type</th>
              <th>Delete</th>
              <th>Update</th>
            </tr>

            @foreach ($data as $room)
             <tr>
                    <td>{{ $room->room_title }}</td>
                    <td>{{ !! Str::limit($room->description, 200) }}</td>
                    {{-- <td>{{ $room->description }}</td> --}}
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->wifi ? 'yes' : 'no' }}</td>
                    <td>{{ $room->room_type  }}</td>
                    <td>
                        <img src="{{ asset('uploads/room/'.$room->image) }}" alt="{{ $room->room_title }}" width="40" height="50">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this room?');" class="btn btn-danger btn-sm" href="{{ url('roomdelete', $room->id) }}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success  btn-sm" href="{{ url('roomupdate', $room->id) }}">Update</a>
                    </td>
            </tr>
            @endforeach
        </table>
          <!--pagination-->

         <div class="d-flex justify-content-end mt-4">
           {{ $data->links() }}
         </div>


          </div>
         </div>
       </div>


     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>

