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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
        ]);

        $token = $request->session()->get('api_token');
        $user = $request->session()->get('user');
        $userId = $user['id'] ?? 1;

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Content-Type' => 'application/json',
        ])->post('https://dummyjson.com/todos/add', [
            'todo' => $request->todo,
            'completed' => false,
            'userId' => $userId,
        ]);

        if ($response->successful()) {
            return redirect()->route('home')->with('success', 'Tarea agregada exitosamente!');
        }

        return redirect()->route('home')->with('error', 'Error al agregar la tarea');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
            'completed' => 'required|boolean',
        ]);

        $token = session('api_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Content-Type' => 'application/json',
        ])->put("https://dummyjson.com/todos/{$id}", [
            'todo' => $request->todo,
            'completed' => $request->completed,
        ]);

        if ($response->successful()) {
            return redirect()->route('home')->with('success', 'Tarea actualizada exitosamente!');
        }

        return redirect()->route('home')->with('error', 'Error al actualizar la tarea');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = session('api_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->delete("https://dummyjson.com/todos/{$id}");

        if ($response->successful()) {
            return redirect()->route('home')->with('success', 'Tarea eliminada exitosamente!');
        }

        return redirect()->route('home')->with('error', 'Error al eliminar la tarea');
    }

    /**
     * Cambiar el estado de un todo
     */
    public function toggle(string $id)
    {
        $token = session('api_token');

        // Obtener la tarea actual
        $getCurrentResponse = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->get("https://dummyjson.com/todos/{$id}");

        if (!$getCurrentResponse->successful()) {
            return redirect()->route('home')->with('error', 'Tarea no encontrada');
        }

        $currentTodo = $getCurrentResponse->json();
        $newCompletedStatus = !$currentTodo['completed'];

        // Actualizar el estado
        $updateResponse = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Content-Type' => 'application/json',
        ])->put("https://dummyjson.com/todos/{$id}", [
            'completed' => $newCompletedStatus,
        ]);

        if ($updateResponse->successful()) {
            $message = $newCompletedStatus ? 'Tarea marcada como completada!' : 'Tarea marcada como pendiente!';
            return redirect()->route('home')->with('success', $message);
        }

        return redirect()->route('home')->with('error', 'Error al cambiar el estado de la tarea');
    }
}