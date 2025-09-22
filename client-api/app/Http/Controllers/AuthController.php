<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    /**
     * login de usuarios
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $response = Http::post('https://dummyjson.com/auth/login', [
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'expiresInMins' => 60,
        ]);

        if ($response->successful() && isset($response['accessToken'])) {
            // Guardar token y usuario en sesión
            $request->session()->put('api_token', $response['accessToken']);
            $request->session()->put('user', $response->json());

            return redirect()->intended('/');
        } else {
            return back()->withErrors(['login' => 'Credenciales inválidas']);
        }      
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['api_token', 'user']);
        return redirect()->route('login');
    }

}
