<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviewer.review',[
            'reviews' => Review::where('reviewer_id',auth()->user()->id)->with('paper')->get()
        ]);
    }

    public function show(Paper $paper)
    {
        return view('review-result', [
            'reviews' => Review::where('paper_id', $paper->id)->with('paper')->get()
        ]);
    }

    public function selectReviewer(Request $request, Paper $paper)
    {
        $request->validate([
            'reviewer1' => 'required',
            'reviewer2' => 'required'
        ]);

        Review::create([
            'reviewer_id' => $request->reviewer1,
            'paper_id' => $paper->id,
            'status' => 'in review',
        ]);
        Review::create([
            'reviewer_id' => $request->reviewer2,
            'paper_id' => $paper->id,
            'status' => 'in review',
        ]);

        return back()->with('message','Berhasil Menentukan Reviewer Untuk Artikel '.$paper->title_ind);
    }

    public function store(Request $request, Review $review)
    {
        $request->validate([
            'status' => 'required',
            'comment' => 'required'
        ]);

        $review->update([
            'status' => $request->status,
            'comment' => $request->comment
        ]);

        return back()->with('message','Berhasil Menambahkan Review Pada Makalah'. $review->paper->title);
    }

    public function update(Request $request, Paper $paper)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            'file' => 'required',
        ]);

        $validatedData['file'] = $request->file('file')->store('file-paper');

        $paper->update($validatedData);

        return back()->with('message','Berhasil Mengubah Data Makalah');
    }
}

