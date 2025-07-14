<!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
                @foreach($room as $rooms)

                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure>
                                <img src="{{ asset('uploads/room/' . $rooms->image) }}" alt="{{ $rooms->room_title }}" width="50" height="50">
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{ $rooms->room_title }}</h3>
                            <p>{{ $rooms->description }}</p>
                            <a class="btn btn-success" href="{{ url('roomdetails',$rooms->id) }}">Room Details</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>




            </div>
         </div>
      </div>
      <!-- end our_room -->
