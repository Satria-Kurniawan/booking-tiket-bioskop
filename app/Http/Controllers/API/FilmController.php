<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Arr;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datafilm = Film::getCategory()->get();

        return response()->json($datafilm);
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
        $validasi = $request->validate([
            'judul' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_tayang' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        try {

            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('/images', $file_name);
            $validasi['image'] = $path;

            $response = Film::create($validasi);

            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'error',
                'errors' => $e->getMessage()
            ]);
        }
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
        $datafilm = Film::getCategory()->find($id);

        return response()->json($datafilm);
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
        $validasi = $request->validate([
            'judul' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_tayang' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        try {

            if ($request->file('image')) {
                $file_name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('/images', $file_name);
                $validasi['image'] = $path;
            }

            $response = Film::findOrFail($id);
            $response->update($validasi);

            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $datafilm = Film::find($id);
            $datafilm->delete();

            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'error',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
