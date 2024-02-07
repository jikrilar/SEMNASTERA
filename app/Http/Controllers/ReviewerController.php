<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reviewer', [
            'reviewers' => Reviewer::all()
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
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'picture' => 'required',
            'gender' => 'required'
        ]);

        $validatedData['picture'] = $request->file('picture')->store('reviewer-picture');

        $user = User::create([
            'name' => $request->name,
            'role' => 'reviewer',
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active'
        ]);

        Reviewer::create([
            'id' => $user->id,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'picture' => $validatedData['picture'],
            'auth_id' => $user->id
        ]);

        return back()->with('message','Berhasil Menambahkan Reviewer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviewer $reviewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviewer $reviewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reviewer $reviewer)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'mobile_number' => ['required', 'numeric', 'max:15'],
            'picture' => ['required', 'file', 'image', 'max:1024'],
            'gender' => 'required',
            'status' => 'required'
        ]);

        if ($reviewer->picture) {
            Storage::delete($reviewer->picture);
        }

        $validatedData['picture'] = $request->file('picture')->store('reviewer-picture');

        $reviewer->update([
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'picture' => $validatedData['picture'],
        ]);

        User::where('id', $reviewer->auth_id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return back()->with('message','Berhasil Mengubah Data Reviewer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviewer $reviewer)
    {
        if ($reviewer->picture) {
            Storage::delete($reviewer->picture);
        }

        Reviewer::destroy($reviewer->id);

        return back()->with('message','Berhasil Menghapus Reviewer');
    }
}
