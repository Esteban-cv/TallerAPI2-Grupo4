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
        if(Session::has('token'))
        {
            return redirect()->route('index');
        }
        
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
        //ulr = url_base + /endpoint_servicio
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->post($url . '/auth/login', [
            'username' => $request->username, //$request['username']
            'password' => $request->password
        ]);

        if($response->status() == Response::HTTP_OK)
        {
            $jsonResponse = json_decode($response);
            Session::put('user', $jsonResponse->user);
            Session::put('token', $jsonResponse->token);
            return redirect()->route('welcome');
        }
        else
        {
            return back()->withErrors([
                'username' => 'Credenciales incorrectas'
            ])->onlyInput('username'); 
        }          
    }

}
