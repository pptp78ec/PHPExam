<?php

namespace App\Http\Controllers;

use App\Models\MovieSessions;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MovieSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $movies = Movies::all(); 
            $sessions = MovieSessions::paginate(10);
        return view('moviesessions.index', compact('sessions', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movies::all();
        return view('moviesessions.create', compact('movies'));
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
                'place' =>'required|max:200',
                'timestart'=>'required',
                'timeend'=>'required',
                'movieid'=>'required',
            ]
        );
        $session = new MovieSessions();
        $session->place = $request->get('place');
        $session->timestart = date("Y-m-d H:i:s",strtotime($request->get('timestart'))) ;
        $session->timeend = date("Y-m-d H:i:s",strtotime($request->get('timeend'))) ;
        $session->movieid = $request->get('movieid');
        $session->created_at = new DateTime();
        $session->updated_at = new DateTime();
        $session->save();
        return redirect('/moviesessions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieSessions  $movieSessions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movies::find($id);
        $sessions = DB::table('movie_sessions')
                    ->where('movieid', '=', $id)
                    ->get();
        return view('moviesessions.show', compact('sessions', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovieSessions  $movieSessions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movies::all();
        $session = MovieSessions::find($id);
        return view('moviesessions.edit', compact('session', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovieSessions  $movieSessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'place' =>'required|max:200',
                'timestart'=>'required',
                'timeend'=>'required',
                'movieid'=>'required',
            ]
        );
        $session = MovieSessions::find($id);
        $session->place = $request->get('place');
        $session->timestart = date("Y-m-d H:i:s",strtotime($request->get('timestart'))) ;
        $session->timeend = date("Y-m-d H:i:s",strtotime($request->get('timeend'))) ;
        $session->movieid = $request->get('movieid');
        $session->updated_at = new DateTime();
        $session->save();
        return redirect('/moviesessions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieSessions  $movieSessions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = MovieSessions::find($id);
        $session->delete();
        return Redirect::back();

    }
}
