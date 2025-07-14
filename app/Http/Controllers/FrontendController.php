<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
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
}
