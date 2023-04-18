<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionsRequest;
use App\Http\Requests\UpdatePromotionsRequest;
use App\Models\Promotions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionsController extends Controller
{
    public function index(Request $request): View
    {
    $query = Promotions::query();

    $orderBy = $request->get('orderBy', 'name');

    switch ($orderBy) {
        case 'created_at':
            $query = $query->orderBy('created_at');
            break;
        case 'created_at-desc':
            $query = $query->orderBy('created_at', 'desc');
            break;
        case 'name-desc':
            $query = $query->orderBy('name', 'desc');
            break;
        default:
            $query = $query->orderBy('name');
    }

    $promotions = $query->paginate(10)->appends($request->query());

    return view('management.promotions.index', compact('promotions', 'orderBy'));
    }
    
    public function create(): View
    {
        $promotion = new Promotions();
        return view('management.promotions.create', compact('promotion'));
    }

    public function store(StorePromotionsRequest $request): RedirectResponse
    {
            // Vérifier si un fichier a été uploadé
        if ($request->hasFile('image')) {
            // Récupérer le nom du fichier
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            // Déplacer le fichier dans le dossier de stockage
            $request->image->storeAs('public/images/promotions', $fileName);
            // Enregistrer le nom du fichier dans la base de données
            $request->merge(['image' => $fileName]);
        }

        // Créer la promotion
        $promotion = Promotions::create($request->validated());

        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully');
    }

    public function show(Promotions $promotions): View
    {
        return view('management.promotions.show', compact('promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotions $promotions): View
    {
        return view('management.promotions.edit', compact('promotions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionsRequest $request, Promotions $promotions): RedirectResponse
    {
        $promotions->name = $request->input('name');
        $promotions->description = $request->input('description');
        $promotions->image = $request->input('image');
        $promotions->save();

        return redirect()->route('management.promotions.index')->with('success', '$promotions->name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotions $promotions): RedirectResponse
    {
        $promotions->delete();

        return redirect()->route('management.promotions.index')->with('success', '$promotions->name deleted successfully');
    }
}
