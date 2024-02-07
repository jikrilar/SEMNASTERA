<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.agenda', [
            'agendas' => Agenda::all(),
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
            'date' => 'required',
            'poster' => 'required|file|image|max:1024',
        ]);

        $validatedData['poster'] = $request->file('poster')->store('poster');

        $validatedData['status'] = 'in progress';

        Agenda::create($validatedData);

        return back()->with('message','Berhasil Menjadwalkan Seminar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'poster' => 'file|image',
            'status' => 'required'
        ]);

        if ($request->poster) {
            $validatedData['poster'] = $request->file('poster')->store('poster');
        }

        $agenda->update($validatedData);

        return back()->with('message','Berhasil Update Agenda Seminar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        if ($agenda->poster) {
            Storage::delete($agenda->poster);
        }

        Agenda::destroy($agenda->id);

        return back()->with('message','Berhasil Menghapus Jadwal Seminar');
    }
}
