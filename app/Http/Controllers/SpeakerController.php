<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.speaker',[
            'speakers' => Speaker::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'picture' => 'required|image|file|max:1024'
        ]);

        $validatedData['picture'] = $request->file('picture')->store('speaker-picture');

        $validatedData['agenda_id'] = Agenda::where('status','occur')->first()->id;

        Speaker::create($validatedData);

        return back()->with('message','Berhasil Menambahkan Data Pemateri');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speaker $speaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'picture' => 'required|image|file|max:1024'
        ]);

        if ($speaker->picture) {
            Storage::delete($speaker->picture);
        }

        $validatedData['picture'] = $request->file('picture')->store('speaker-picture');

        $speaker->update($validatedData);

        return back()->with('message','Berhasil Mengubah Data Pemateri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        if ($speaker->picture) {
            Storage::delete($speaker->picture);
        }

        Speaker::destroy($speaker->id);

        return redirect()->back();
    }
}
