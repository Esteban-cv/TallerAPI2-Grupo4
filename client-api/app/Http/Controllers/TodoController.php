<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $token = $request->session()->get('api_token');
        $user = $request->session()->get('user');
        $userId = $user['id'] ?? null;

        // Obtiene el usuario id del usuario logueado y extrae sus todos 
        if ($userId) {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $token",
            ])->get('https://dummyjson.com/todos/user/' . $userId);
        } else {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $token",
            ])->get('https://dummyjson.com/todos');
        }

        $todos = $response->successful() ? $response['todos'] : [];

        return view('todos.index', compact('todos'));
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
}
