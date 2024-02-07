<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Attendance;
use App\Models\Attend;
use App\Models\Author;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $attend = Attend::all();
        } else {
            $attend = Attend::where('author_id', auth()->id())->get();
        }

        return view('attendance',[
            'attendances' => Attendance::all(),
            'attends' => $attend,
            'authors' => Author::all()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'meet_link' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        Attendance::create([
            'agenda_id' => Agenda::where('status','occur')->first()->id,
            'meet_link' => $request->meet_link,
            'attendance_start' => $request->start_time,
            'attendance_end' => $request->end_time,
        ]);

        return back()->with('message','Absensi Telah Dibuka');
    }

    public function attend(Author $author){
        $agenda_id = Agenda::where('status','occur')->first()->id;

        Attend::create([
            'author_id' => $author->id,
            'attendance_id' => Attendance::where('agenda_id', $agenda_id)->first()->id
        ]);

        return back()->with('message','Berhasil Absen Atas Nama '.$author->User->name);
    }
}
