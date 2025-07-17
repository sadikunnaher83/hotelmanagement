<!DOCTYPE html>
<html>
  <head>

    <base href="/public">
  @include('admin.css')

  </head>
  <body>
    @include('admin.header')
    <!-- Sidebar Navigation-->

    @include('admin.sider')

      <!-- Sidebar Navigation end-->

     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 margin-bottom mb-3">Send Mail</h2>




<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Send Mail</h4>
        </div>


          @if(session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
        @endif


        <form action="{{ url('/send-mail', $message->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%">Greeting</th>
                        <td>
                            <input type="text" name="greeting" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Mail Body</th>
                        <td>
                            <textarea name="body" class="form-control" rows="4" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Action Text</th>
                        <td>
                            <input type="text" name="action_text" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Action URL</th>
                        <td>
                            <input type="url" name="action_url" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>End Line</th>
                        <td>
                            <input type="text" name="end_part" class="form-control" required>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Send Mail</button>
            </div>
        </form>
    </div>
</div>



          </div>
          </div>
        </div>



     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>
