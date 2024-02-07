<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cost',[
            'costs' => Cost::all()
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
            'category' => 'required',
            'nominal' => 'required',
            'earlybird_nominal' => 'required',
            'earlybird_date' => 'required',
        ]);

        Cost::create($validatedData);

        return back()->with('message','Berhasil Menambahkan Informasi Biaya');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cost $cost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cost $cost)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'nominal' => 'required',
            'earlybird_nominal' => 'required',
            'earlybird_date' => 'required',
        ]);

        $cost->update($validatedData);

        return back()->with('message','Berhasil Merubah Informasi Biaya');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cost $cost)
    {
        Cost::destroy($cost->id);

        return back()->with('message','Berhasil Hapus Informasi Biaya');
    }
}
