@include('admin.css')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

               <div class="container my-5" style="max-width: 700px;">
        <h4 class="mb-4 text-center">Update Room</h4>

            <form action="{{ url('roomupdate/'.$room->id) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
                @csrf
                @method('PUT')

                <div class="mb-3 row align-items-center">
                    <label for="title" class="col-sm-4 col-form-label text-end">Room Title</label>
                    <div class="col-sm-8">
                        <input type="text" id="title" name="title" value="{{ $room->room_title }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="col-sm-4 col-form-label text-end">Description</label>
                    <div class="col-sm-8">
                        <textarea id="description" name="description" class="form-control" rows="4" required>{{ $room->description }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="price" class="col-sm-4 col-form-label text-end">Price</label>
                    <div class="col-sm-8">
                        <input type="number" id="price" name="price" value="{{ $room->price }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="type" class="col-sm-4 col-form-label text-end">Room Type</label>
                    <div class="col-sm-8">
                        <select id="type" name="type" class="form-select" required>
                            <option value="regular" {{ $room->room_type == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="deluxe" {{ $room->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="suite" {{ $room->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
                            <option value="family" {{ $room->room_type == 'family' ? 'selected' : '' }}>Family</option>
                            <option value="presidential" {{ $room->room_type == 'presidential' ? 'selected' : '' }}>Presidential</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="wifi" class="col-sm-4 col-form-label text-end">Free Wifi</label>
                    <div class="col-sm-8">
                        <select id="wifi" name="wifi" class="form-select" required>
                            <option value="yes" {{ $room->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ $room->wifi == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-end">Previous Image</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('uploads/room/'.$room->image) }}" width="150" height="100" alt="Room Image" class="img-thumbnail">
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="image" class="col-sm-4 col-form-label text-end">Upload New Image</label>
                    <div class="col-sm-8">
                        <input type="file" id="image" name="image" class="form-control">
                        <small class="text-muted">Leave empty if you don't want to change image.</small>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5">Update Room</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @include('admin.footer')

