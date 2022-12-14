<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("mentor.index", [
            "title" => "Mentor",
            "mentor" => Mentor::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mentor.create", [
            "title" => "Mentor"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mentor::create([
            "nama" => $request->nama,
            "gambar" => "https://drive.google.com/uc?export=view&id=" . explode("/", $request->gambar)[5],
            "deskripsi_singkat" => $request->deskripsi_singkat
        ]);
        return redirect("/mentor");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentor $mentor)
    {
        return view("mentor.edit", [
            "title" => "Mentor",
            "mentor" => $mentor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentor $mentor)
    {
        if ($request->gambar == $mentor->gambar) {
            $gambar = $request->gambar;
        } else {
            $gambar = "https://drive.google.com/uc?export=view&id=" . explode("/", $request->gambar)[5];
        }
        $mentor->update([
            "nama" => $request->nama,
            "gambar" => $gambar,
            "deskripsi_singkat" => $request->deskripsi_singkat
        ]);
        return redirect("/mentor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentor $mentor)
    {
        Mentor::destroy($mentor->id);
        return redirect("/mentor");
    }
}
