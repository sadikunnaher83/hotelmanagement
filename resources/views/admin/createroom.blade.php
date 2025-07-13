<!DOCTYPE html>
<html>
  <head>

  @include('admin.css')

  <style>

    label{
        display: inline-block;
        width: 150px;
        text-align: right;
    }
    .div_deg{
        padding: 15px;
        margin: 10px;
    }

  </style>
  </head>
  <body>
    @include('admin.header')
    <!-- Sidebar Navigation-->

    @include('admin.sider')


    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h4 class="h5 no-margin-bottom">Add Room</h4>
            <div>
            <form action="{{ url('addroom') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                <label for="">Room Title</label>
                <input type="text" name="title">
            </div>
            <div class="div_deg">
                <label for="">Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="div_deg">
                <label for="">Price</label>
                <input type="number" name="price">
            </div>
            <div class="div_deg">
                <label for="">Room Type</label>
                <select name="type">
                    <option selected value="regular">Regular</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                    <option value="family">Family</option>
                    <option value="presidential">Presidential</option>
                </select>
            </div>
           <div class="div_deg">
                <label for="wifi">Free Wifi</label>
                <select name="wifi">
                    <option value="yes" selected>Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="div_deg">
                <label for="">Upload Image</label>
                <input type="file" name="image">
            </div>
            <div class="div_deg">

                <input type="submit" value="Add Room" class="btn btn-success">

            </div>
         </form>

</div>


          </div>
        </div>
      </div>
     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>
