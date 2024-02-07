<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cost;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.author', [
            'authors' => Author::all(),
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
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active',
            'role' => 'author'
        ]);

        Author::create([
            'id' => $user->id,
            'cost_id' => $request->cost_id,
            'user_id' => $user->id
        ]);

        return back()->with('message','Berhasil Menambahkan Author');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'cost_id' => 'required',
        ]);

        $author->update([
            'cost_id' => $request->cost_id,
        ]);

        User::where('id', $author->user_id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return back()->with('message','Berhasil Mengubah Data Author');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author->picture) {
            Storage::delete($author->picture);
        }

        Author::destroy($author->id);

        return back()->with('message','Berhasil Menghapus Author');
    }
}
