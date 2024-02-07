<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\User;
use App\Models\Author;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Mail;
use App\Mail\MailNotify;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.login-register', [
            'costs' => Cost::all()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile_number' => 'required',
            'institution' => 'required',
            'cost_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'author',
            'status' => 'active',
        ]);

        $author = Author::create([
            'id' => $user->id,
            'mobile_number' => $request->mobile_number,
            'cost_id' => $request->cost_id,
            'institution' => $request->institution,
            'user_id' => $user->id
        ]);

        event(new Registered($user));

        Auth::login($user);

        try {
            Mail::to(auth()->user()->email)->send(new MailNotify());
            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            return response()->json(['Something went wrong']);
        }

    }
}
