<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmailNotification;
use Notifiable;


class BackendController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }

    public function createroom()
    {
        return view('admin.createroom');
    }

    public function addroom(Request $request)
    {

       $data = new Room;
       $data->room_title = $request->title;
       $data->image = $request->image;
      if ($request->hasFile('image')) {
       $image = $request->file('image');


     $imagename = time().'.'.$image->getClientOriginalExtension();

    // Move the image to public/uploads/room folder
     $image->move(public_path('uploads/room'), $imagename);

    // Save the image name in the database
    $data->image = $imagename;
 }

       $data->description = $request->description;
       $data->price = $request->price;
       $data->wifi = $request->wifi;
       $data->room_type = $request->type;
       $data->save();
       return redirect()->back();

    }

    public function viewroom(Request $request)
    {
        $data = Room::paginate(4);
        return view('admin.viewroom', compact('data'));
    }

    public function roomdelete($id)
    {
        $data = Room::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'Room deleted successfully');

    }



public function roomupdate($id)
{
    $room = Room::findOrFail($id);
    return view('admin.roomupdate', compact('room'));
}


public function roomupdateSubmit(Request $request, $id)
{
    $room = Room::findOrFail($id);

    $room->room_title = $request->title;
    $room->description = $request->description;
    $room->price = $request->price;
    $room->wifi = $request->wifi;
    $room->room_type = $request->type;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/room'), $imagename);
        $room->image = $imagename;
    }

    $room->save();

    return redirect()->route('viewroom')->with('message', 'Room updated successfully');
}

    public function bookings()
    {
        $bookings = Booking::paginate(6);
        return view('admin.bookings', compact('bookings'));
    }

    public function bookingdelete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Booking deleted successfully');
    }

   public function approvebook($id)
   {
       $booking = Booking::findOrFail($id);
       $booking->status = 'Approved';
       $booking->save();

    return redirect()->back()->with('message', 'Booking approved successfully');
   }

   public function rejected($id)
   {
       $booking = Booking::findOrFail($id);
       $booking->status = 'Rejected';
       $booking->save();

    return redirect()->back()->with('message', 'Booking rejected successfully');
   }

   public function viewgalary()
   {
    $gallaries = Gallary::all();
    return view('admin.viewgalary', compact('gallaries'));

    }

    public function uploadgalary(Request $request)
    {
        $gallaries = new Gallary();
        $image = $request->image;

if($image)
{
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $image->move('uploads/gallary', $imagename);
    $gallaries->image = $imagename;
    $gallaries->save();

    return redirect()->back()->with('message', 'Image uploaded successfully!');
}

    }

    public function deletegallary($id)
    {
        $gallaries = Gallary::findOrFail($id);
        $gallaries->delete();
        return redirect()->back();
    }

    // public function allmessages()
    // {
    //     $messages = Contact::all();
    //     return view('admin.allmessage', compact('messages'));
    // }

    public function allmessages()
{
    $messages = Contact::paginate(4);

    return view('admin.allmessage', compact('messages'));
}


    public function sendmail($id)
    {
        $message = Contact::findOrFail($id);
        return view('admin.sendmail', compact('message'));
    }

public function mail(Request $request, $id)
{
    $message = Contact::find($id);

    $details = [
        'greeting' => $request->greeting,
        'body' => $request->body,
        'actiontext' => $request->actiontext,
        'actionturl' => $request->actionturl,
        'endline' => $request->endline,
    ];

    Notification::send($message, new SendEmailNotification($details));
    return redirect()->back()->with('message', 'Email sent successfully');

}

}
