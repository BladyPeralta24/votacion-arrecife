<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

    /***
     * Sotore a newly created resource in storage
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'ip' => 'required|ip',
        ]);

        // Crear un nuevo voto
        $vote = Vote::create([
            'ip_address' => $request->ip,
            'voto' => $request->voto,
        ]);

        // Devolver una respuesta
        return response()->json([
            'message' => 'Voto registrado con éxito.',
            'voto' => $vote,
        ]);
    }
}
