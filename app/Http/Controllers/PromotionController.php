<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Promotion::query()->with('user');

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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $promotion = new Promotion();
        return view('management.promotions.create', compact('promotion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionRequest $request): RedirectResponse
    {
        $promotion = new Promotion();

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
        $promotion->create($request->all());

        return redirect()->route('promotion.index')->with('success', 'Promotion created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion): View
    {
        $promotion->load('user', 'workers');
        $rankedWorkers = $promotion->getRankedWorkers();
        return view('management.promotions.show', compact('promotion', 'rankedWorkers'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion): View
    {
        return view('management.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion): RedirectResponse
    {
        // Vérifier si un fichier a été uploadé
        if ($request->hasFile('image')) {
            // Récupérer le nom du fichier
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            // Déplacer le fichier dans le dossier de stockage
            $request->image->storeAs('public/images/promotions', $fileName);
            // Enregistrer le nom du fichier dans la base de données
            $request->merge(['image' => $fileName]);
            // Supprimer l'ancienne image
            Storage::delete('public/' . $promotion->image);
        }

        // Mettre à jour la promotion
        $promotion->update($request->all());

        return redirect()->route('promotion.index')->with('success', 'Promotion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion): RedirectResponse
    {
        $promotion->delete();

        return redirect()->route('promotion.index')->with('success', 'Promotion deleted successfully');
    }

    /**
     * Search for a promotion.
     */
    public function search(Request $request): View|RedirectResponse
    {
        $search = $request->input('search');
        $orderBy = $request->input('orderBy', 'name');

        if (empty($search)) {
            return redirect()->route('promotion.index', ['orderBy' => $orderBy]);
        }

        $promotions = Promotion::where('name', 'like', "%{$search}%")
            ->orWhere('user_id', 'like', "%{$search}%")
            ->orderBy($orderBy)
            ->paginate(10)
            ->appends($request->except('page'));

        return view('management.promotions.index', compact('promotions', 'orderBy'));
    }

}



