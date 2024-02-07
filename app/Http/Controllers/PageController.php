<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Author;
use App\Models\Agenda;
use App\Models\Date;
use App\Models\Cost;
use App\Models\Speaker;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'agendas' => Agenda::where('status','in progress')->latest()->get(),
            'speakers' => Speaker::latest()->get(),
            'papers' => Paper::latest()->get(),
            'dates' => Date::all(),
            'costs' => Cost::all(),
        ]);
    }

    public function dashboard()
    {
        return view('dashboard', [
            'numberOfAuthors' => Author::count(),
            'numberOfPapers' => Paper::count(),
            'numberOfAgenda' => Agenda::count()
        ]);
    }

    public function paper()
    {
        return view('author.paper', [
            'authors' => Author::all(),
            'papers' => Paper::latest()->filter(request(['search']))->get(),
        ]);
    }
}
