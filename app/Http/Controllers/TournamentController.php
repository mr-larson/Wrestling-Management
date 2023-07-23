<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\Promotion;

class TournamentController extends Controller
{
    public function index(Request $request)
    {
        // Get the list of tournaments with pagination
        $tournaments = Tournament::paginate(10);

        return view('management.tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        $promotions = Promotion::all();
        return view('management.tournaments.create', compact('promotions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'num_participants' => 'required|integer|min:8', // Add any other validation rules as needed
            'has_group_phase' => 'boolean',
            'promotion_id' => 'array', // If you want to allow multiple promotions, use 'array' rule
        ]);

        $tournament = Tournament::create([
            'name' => $validatedData['name'],
            'num_participants' => $validatedData['num_participants'],
            'has_group_phase' => $request->has_group_phase ? true : false,
        ]);

        // If promotion_id is an array, sync the associations with multiple promotions
        if (isset($validatedData['promotion_id'])) {
            $tournament->promotions()->sync($validatedData['promotion_id']);
        }

        return redirect()->route('tournament.show', ['tournament' => $tournament])
            ->with('success', 'Tournament created successfully');
    }

    public function show(Tournament $tournament)
    {
        return view('management.tournaments.show', compact('tournament'));
    }

    // ... (Other methods like edit, update, destroy, etc.)
}
