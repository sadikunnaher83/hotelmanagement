<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

       $room = Room::findOrFail($id);

        $bookings = Booking::where('room_id', $id)
            ->orderBy('startDate', 'asc')
            ->get();

        return view('home.roomdetails', compact('room', 'bookings'));
    }

public function addbooking(Request $request, $id)
    {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);

        $data = new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('startDate', [$startDate, $endDate])
                    ->orWhereBetween('endDate', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('startDate', '<=', $startDate)
                            ->where('endDate', '>=', $endDate);
                    });
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Room already Booked');
        }


        $data->startDate = $startDate;
        $data->endDate = $endDate;
        $data->save();

        return redirect()->back()->with('message', 'Room Booked Successfully');
    }

}
