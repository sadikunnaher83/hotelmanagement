<!DOCTYPE html>
<html lang="en">
   <head>

     @include('home.css')

   </head>



   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('assets/images/loading.gif')}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>

        @include('home.header')

      </header>
      <!-- end header inner -->

<div class="row" style="display: flex; justify-content: center;">

    <div class="col-md-4 col-sm-6" style="border: 2px solid #d116d4;; padding: 15px; margin: 10px; box-shadow: 2px 2px 10px rgba(216, 9, 199, 0.1);">
        <div class="room">
            <div class="room_img" style="width: 100%; height: 250px; overflow: hidden; border-radius: 8px;">
                <img src="{{ asset('uploads/room/' . $room->image) }}"
                     alt="{{ $room->room_title }}"
                     style="width: 100%; height: 80%;">
            </div>
            <div class="bed_room" style="padding-top: 15px;">
                <h3 style="margin-bottom: 10px;">{{ $room->room_title }}</h3>
                <p style="margin-bottom: 10px;">{{ $room->description }}</p>
                <h3 style="margin-bottom: 5px;">Free wifi: {{ $room->wifi }}</h3>
                <h3 style="margin-bottom: 5px;">Room Type: {{ $room->room_type }}</h3>
                <h3 style="margin-bottom: 5px;">Room Price: {{ $room->price }} ৳</h3>
            </div>
        </div>
    </div>

<div class="div-md-4 col-sm-6">

     <div class="div-md-4 col-sm-6">
      <h2 style="color: purple;">Book Room</h2>

      @if(session()->has('message'))
      <div class="alert alert-success">
         {{ session()->get('message') }}
      </div>
      @endif

        @if($errors)
            @foreach ($errors->all() as $errors )
                <li style="color: red;">{{ $errors }}</li>
            @endforeach
        @endif

                <form action="{{ url('addbooking', $room->id) }}" method="POST">
                @csrf
                <div class="div">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>
                <div class="div">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="div">
                    <label for="">Phone</label>
                    <input type="text" name="phone">
                </div>
                <div class="div">
                    <label for="">Start Date</label>
                    <input type="date" name="startDate" id="startDate">
                </div>
                <div class="div">
                    <label for="">End Date</label>
                    <input type="date" name="endDate" id="endDate">
                </div>
                <div class="div">
                    <input type="submit" class="btn btn-success" value="Book room">
                </div>
            </form>
            </div>

</div>


</div>

      <!--  footer -->
      @include('home.footer')
      <!-- end footer -->

      <script type="text/javascript">
      $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getfullYear();

        if (month < 10)
          month = '0' + month.toString();
        if (day < 10)
          day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        document.getElementById('startDate').setAttribute('min', maxDate);
        document.getElementById('endDate').setAttribute('min', maxDate);

      });


      </script>

      <!-- Javascript files-->
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('assets/js/custom.js')}}"></script>
   </body>
</html>

