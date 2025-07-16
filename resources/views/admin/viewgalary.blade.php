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

          <h2 class="h5 no-margin-bottom">View Galary</h2>
           <h2 class="h4 mb-4">📷 View Gallery</h2>

            {{-- Gallery Images --}}
                <div class="row mb-5">
                    @foreach ($gallaries as $gallary)
                        <div class="col-md-3 col-sm-4 col-6 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset('uploads/gallary/'.$gallary->image) }}" class="card-img-top" alt="Gallery Image" style="height: 180px; object-fit: cover;">

                                <a href="{{ url('/deletegallary/' . $gallary->id) }}" class="btn btn-warning btn-sm">🗑 Delete</a>
                            </div>
                        </div>
                    @endforeach
                </div>



            <form action="{{ url('uploadgalary') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light" style="max-width: 500px;">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">➕ Add Image</button>
                </div>
            </form>
          </div>
        </div>
    </div>

     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>

