<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movies;
use App\Models\User;
use App\Models\MovieSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::all();
        $moviesessions = Moviesessions::all();
        $users = User::all();
        $bookings = Booking::paginate(20);
        return view('booking.index', compact('bookings', 'moviesessions', 'users', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'userid' =>'required',
                'moviesessionid' =>'required',
            ]
        );
        $booking = new Booking();
        $booking->userid = $request->get('userid');
        $booking->moviesessionid = $request->get('moviesessionid');
        $booking->save();
        return redirect('/movies')->withsuccess('Your ticket is booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //shows booked tickets for a user
        $movies = Movies::all();
        $moviesessions = Moviesessions::all();
        $user = User::find($id);
        $bookings = DB::table('bookings')
                    ->where('userid', '=', $id)
                    ->paginate(20);
                    return view('booking.show', compact('bookings', 'user', 'moviesessions','movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return Redirect::back();
    }
}
