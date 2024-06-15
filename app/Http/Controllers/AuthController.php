<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use App\Models\VerifiedToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Http::get('https://bayik4.github.io/api-wilayah-indonesia/api/provinces.json');
        $data_provinsi = json_decode($data);
        return view('auth.register', compact('data_provinsi'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials) && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();

            return redirect('/temp-home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $validToken = rand(1000, 9999);
        $get_token = new VerifiedToken();
        $get_token->token = $validToken;
        $get_token->email = $request->email;
        $get_token->save();

        $get_user_email = $request->email;
        $get_user_name = $request->name;
        Mail::to($get_user_email)->send(new SendEmail($get_user_email, $validToken, $get_user_name));

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/temp-home');
        }
    }

    public function verified(Request $request)
    {
        $get_token = VerifiedToken::where('token', $request->token)->first();

        if ($get_token) {
            $get_token->is_activated = 1;
            $get_token->save();
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1;
            $user->save();

            $getting_token = VerifiedToken::where('token', $request->token)->first();
            $getting_token->delete();

            return redirect('/');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
