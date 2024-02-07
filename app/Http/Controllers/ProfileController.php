<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Reviewer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile',[
            'users' => Author::where('id', auth()->user()->id)->get()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'mobile_number' => 'required',
            'institution' => 'required',
            'picture' => 'required|image',
            'gender' => 'required'
        ]);

        if (auth()->user()->role == 'author') {
            $author = Author::where('user_id', auth()->id())->get();

            if ($author->picture) {
                Storage::delete($author->picture);
            }

            $validatedData['picture'] = $request->file('picture')->store('author-picture');

            Author::where('user_id', auth()->id())->update([
                'mobile_number' => $request->mobile_number,
                'institution' => $request->institution,
                'gender' => $request->gender,
                'picture' => $validatedData['picture'],
            ]);
        } else {
            $reviewer = Reviewer::where('user_id', auth()->id())->get();

            if ($reviewer->picture) {
                Storage::delete($reviewer->picture);
            }

            $validatedData['picture'] = $request->file('picture')->store('reviewer-picture');

            Reviewer::where('user_id', auth()->id())->update([
                'mobile_number' => $request->mobile_number,
                'institution' => $request->institution,
                'gender' => $request->gender,
                'picture' => $validatedData['picture'],
            ]);
        }

        return back()->with('message','Berhasil Mengubah Profile');
    }
}
