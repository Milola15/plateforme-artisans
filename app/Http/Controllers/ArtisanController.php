<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artisans = Artisan::with('user', 'services')->get();

        return response()->json($artisans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'metier' => 'required|string|max:255',
            'ville' => 'nullable|string|max:255',
            'tarif_horaire' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $artisan = Artisan::create($validated);

        return response()->json($artisan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artisan = Artisan::with('user', 'services', 'reviews')->findOrFail($id);

        return response()->json($artisan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artisan = Artisan::findOrFail($id);

        $validated = $request->validate([
            'metier' => 'sometimes|string|max:255',
            'ville' => 'nullable|string|max:255',
            'tarif_horaire' => 'sometimes|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $artisan->update($validated);

        return response()->json($artisan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artisan = Artisan::findOrFail($id);
        $artisan->delete();

        return response()->json(null, 204);
    }
}