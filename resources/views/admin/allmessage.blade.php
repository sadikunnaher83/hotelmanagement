
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

          <h2 class="h5 margin-bottom mb-5">All Message</h2>

          <div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">All Messages</h4>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Send Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $index => $message)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/sendmail', $message->id) }}">Send mail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



          </div>
        </div>
      </div>

     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>
