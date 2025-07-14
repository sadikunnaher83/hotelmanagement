<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function roomdetails($id)
    {

        $room = Room::find($id);
        return view('home.roomdetails', compact('room'));
    }

    public function addbooking(Request $request, $id)
    {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);
        $booking = new Booking;
        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->startDate = $request->startDate;
        $booking->endDate = $request->endDate;
        $booking->save();
        return redirect()->back();

    }
}
