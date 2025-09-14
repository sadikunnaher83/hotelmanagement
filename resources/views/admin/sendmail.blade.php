<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
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

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


      <h4>Mail Send to {{ $message->name }}</h4>

             <form action="{{ url('mail',$message->id) }}" method="POST">
                @csrf
                <div class="div_deg">
                <label for="">Greeting</label>
                <input type="text" name="greeting">
            </div>
            <div class="div_deg">
                <label for="">Mail Body</label>
                <textarea name="body"></textarea>
            </div>
            <div class="div_deg">
                <label for="">Action Text</label>
                <input type="text" name="actiontext">
            </div>
            <div class="div_deg">
                <label for="">Action Url</label>
                <input type="text" name="actionturl">
            </div>
            <div class="div_deg">
                <label for="">End Line</label>
                <input type="text" name="endline">
            </div>

            <div class="div_deg">

                <input type="submit" value="Send Mail" class="btn btn-success">

            </div>
         </form>


          </div>
        </div>
      </div>

     @include('admin.footer')
    <!-- Footer -->
  </body>
</html>

