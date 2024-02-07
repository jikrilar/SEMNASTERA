<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{

    public function index()
    {
        $agenda_id = Agenda::where('status','occur')->first()->id;
        return view('admin.date',[
            'dates' => Date::where('agenda_id', $agenda_id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_earlybird' => 'required',
            'tgl_penerimaan_makalah' => 'required',
            'tgl_camera' => 'required',
            'tgl_pembayaran' => 'required',
            'tgl_seminar' => 'required'
        ]);

        $agenda_id = Agenda::where('status','occur')->first()->id;

        Date::create([
            'description' => 'Batas Potongan Biaya EarlyBird',
            'date' => $request->tgl_earlybird,
            'agenda_id' => $agenda_id
        ]);

        Date::create([
            'description' => 'Batas Penerimaan Makalah',
            'date' => $request->tgl_penerimaan_makalah,
            'agenda_id' => $agenda_id
        ]);

        Date::create([
            'description' => 'Batas Pengiriman Camera Ready',
            'date' => $request->tgl_camera,
            'agenda_id' => $agenda_id
        ]);

        Date::create([
            'description' => 'Batas Akhir Pembayaran',
            'date' => $request->tgl_pembayaran,
            'agenda_id' => $agenda_id
        ]);

        Date::create([
            'description' => 'Pelaksanaan Seminar',
            'date' => $request->tgl_seminar,
            'agenda_id' => $agenda_id
        ]);

        return back()->with('message','Berhasil Menambahkan Informasi Tanggal');
    }

    public function update(Request $request, Date $date)
    {
        $validatedData = $request->validate([
            'date' => 'required'
        ]);

        $date->update($validatedData);

        return back()->with('message','Berhasil Merubah Tanggal '.$date->description);
    }
}
