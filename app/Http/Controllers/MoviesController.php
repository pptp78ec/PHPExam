<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
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
                'name' =>'required|max:50',
                'length' =>'required',
                'genre' =>'required|max:20',
                'imagepath' => 'required',
                'director' => 'required|max:80',
                'premiere' => 'required',
                'descr'=> 'required|max:1000',
            ]
        );
        $movie = new Movies();
        $savedpath = "";
        if($request->hasFile('imagepath')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $savedpath = Storage::putFile('badges', $request->file('imagepath'));
            // $request->file('imagepath')->store('public/badges','storage');
        }
        $movie->name = $request->get('name');
        $movie->length = $request->get('length');
        $movie->genre = $request->get('genre');
        $movie->director = $request->get('director');
        $movie->premiere = $request->get('premiere');
        $movie->descr = $request->get('descr');
        // $movie->imagepath = "/storage/". $request->file('imagepath')->hashname();
        $movie->imagepath = "storage/". $savedpath;
        $movie->created_at = new DateTime();
        $movie->updated_at = new DateTime();
        $movie->save();
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movies::find($id);
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movies::find($id);
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' =>'required|max:50',
                'length' =>'required',
                'genre' =>'required|max:20',
                'imagepath' => 'required',
                'director' => 'required|max:80',
                'premiere' => 'required',
                'descr'=> 'required|max:1000',
            ]
        );
        $movie = Movies::find($id);
        $savedpath = "";
        if($request->hasFile('imagepath')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            //$request->file('imagepath')->store('public/badges','storage');
            $savedpath = Storage::putFile('badges', $request->file('imagepath'));
        }
        $movie->name = $request->get('name');
        $movie->length = $request->get('length');
        $movie->genre = $request->get('genre');
        $movie->director = $request->get('director');
        $movie->premiere = $request->get('premiere');
        $movie->descr = $request->get('descr');
        //$movie->imagepath = "/storage/". $request->file('imagepath')->hashname();
        $movie->imagepath = "storage/". $savedpath;
        $movie->created_at = new DateTime();
        $movie->updated_at = new DateTime();
        $movie->save();
        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movies::find($id);
        $movie->delete();
        return redirect('/movies');
    }
}
