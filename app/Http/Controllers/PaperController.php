<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Archive;
use App\Models\Paper;
use App\Models\Author;
use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\MailNotify;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->role == 'author') {
            $paper_id = Paper::where('author_id',auth()->id())->first()->id;
        }

        if (auth()->user()->role == 'admin') {
            return view('admin.paper',[
                'reviewers'=> Reviewer::all(),
                'papers' => Paper::latest()->filter(request(['search']))->with('author')->get(),
                'authors' => Author::all()
            ]);
        } else {
            return view('author.submission',[
                'papers' => Paper::where('author_id',auth()->id())->get(),
                'reviews' => Review::where('paper_id',$paper_id)->get(),
                'revision' => Review::where('paper_id',$paper_id)->where('status','revision')->get(),
            ]);
        }
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
            'title_ind' => 'required',
            'title_en' => 'required',
            'abstract_ind' => 'required',
            'abstract_en' => 'required',
            'file' => 'required'
        ]);

        if (auth()->user()->role == 'admin') {
            $validatedData['author_id'] = $request->author_id;
        } else {
            $validatedData['author_id'] = auth()->id();
        }

        $validatedData['file'] = $request->file('file')->store('file-paper');

        $agenda_id = Agenda::where('status','occur')->first()->id;

        $validatedData['archive_id'] = Archive::where('agenda_id', $agenda_id)->first()->id;

        Paper::create($validatedData);

        try {
            Mail::to(auth()->user()->email)->send(new MailNotify());
            return back()->with('message','Berhasil Menambahkan Makalah');
        } catch (\Throwable $th) {
            return response()->json(['Something went wrong']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Paper $paper)
    {
        return view('paper-detail', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paper $paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paper $paper)
    {
        $validatedData = $request->validate([
            'title_ind' => 'required',
            'title_en' => 'required',
            'abstract_ind' => 'required',
            'abstract_en' => 'required',
            'file' => 'required'
        ]);

        $validatedData['file'] = $request->file('file')->store('file-paper');

        $paper->update($validatedData);

        return back()->with('message','Berhasil Mengubah Data Makalah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paper $paper)
    {
        if ($paper->file) {
            Storage::delete($paper->file);
        }

        Paper::destroy($paper->id);

        return back()->with('message','Berhasil Menghapus Makalah');
    }
}
