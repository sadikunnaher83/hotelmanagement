  <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/avatar-8.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Sathi Islam</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">

                <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">

                    <li><a href="{{ route('admin.createroom') }}">Add Rooms</a></li>

                    <li><a href="{{ url('viewroom') }}">View Rooms</a></li>

                  </ul>
                </li>
               <li>
                <a href="{{ url('bookings') }}"> <i class="icon-home"></i>Bookings</a>
               </li>
               <li>
                <a href="{{ url('viewgalary') }}"> <i class="icon-home"></i>Galary</a>
               </li>
               <li>
                <a href="{{ url('allmessages') }}"> <i class="icon-home"></i>Message</a>
               </li>

        </ul>

      </nav>
      <!-- Sidebar Navigation end-->
