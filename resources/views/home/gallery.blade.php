<!-- gallery -->
<div class="gallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Gallery</h2>
            </div>
         </div>
      </div>

      {{-- শুরুতে একটিই row নাও --}}
      <div class="row">
         @foreach ($gallaries as $gallary)
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="gallery_img">
                  <figure>
                     <img src="{{ asset('uploads/gallary/' . $gallary->image) }}" alt="Gallery Image">
                  </figure>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>
<!-- end gallery -->
