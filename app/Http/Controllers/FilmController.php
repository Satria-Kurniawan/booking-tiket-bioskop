<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $datafilm = Film::with('category')->latest()->get();
        $ct = Category::all();

        return view('film', compact('datafilm'), compact('ct'));
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
        $request->validate([
            'judul' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_tayang' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        // $file = $request->image;
        // $file_name = $request->image->getClientOriginalName();
        // $file->move(public_path('images'), $file_name);

        $file_name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('/images', $file_name);

        Film::create([
            'id' => Request()->id,
            'judul' => Request()->judul,
            'tanggal_tayang' => Request()->tanggal_tayang,
            'waktu_tayang' => Request()->waktu_tayang,
            'image' => $path,
            'category_id' => Request()->category_id
        ]);
        return redirect('film')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datafilm = Film::findOrFail($id);
        $ct = Category::all();

        return view('edit-film', [
            'datafilm' => $datafilm
        ], compact('ct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_tayang' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $datafilm = Film::findOrFail($id);
        $datafilm->judul = $request->input('judul');
        $datafilm->tanggal_tayang = $request->input('tanggal_tayang');
        $datafilm->waktu_tayang = $request->input('waktu_tayang');
        if ($request->has('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('/images', $file_name);
            $datafilm->image = $path;
        }
        $datafilm->category_id = $request->input('category_id');

        $datafilm->save($request->all());

        return redirect('film')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datafilm = Film::findOrFail($id);
        $datafilm->delete();

        return back()->with('success', 'Berhasil dihapus');
    }
}
