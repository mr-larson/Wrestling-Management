<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Promotion;
use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Worker::query()->with('user', 'promotion');

        // Récupérer le filtre de promotion sélectionné
        $promotionFilter = $request->get('promotionFilter');

        // Vérifier si un filtre de promotion est appliqué
        if ($promotionFilter) {
            // Appliquer le filtre de promotion
            $query = $query->where('promotion_id', $promotionFilter);
        }
        
        // Création d'une variable pour stocker l'ordre de tri
        $orderBy = $request->get('orderBy', 'score');
        
        // On trie les résultats en fonction de l'ordre de tri choisi
        switch ($orderBy) {
            case 'created_at':
                $query = $query->orderBy('created_at');
                break;
            case 'created_at-desc':
                $query = $query->orderBy('created_at', 'desc');
                break;
            case 'first_name':
                $query = $query->orderBy('first_name');
                break;
            case 'first_name-desc':
                $query = $query->orderBy('first_name', 'desc');
                break;
            case 'last_name':
                $query = $query->orderBy('last_name');
                break;
            case 'last_name-desc':
                $query = $query->orderBy('last_name', 'desc');
                break;
            case 'promotion':
                $query = $query->orderBy('promotion_id');
                break;
            case 'promotion-desc':
                $query = $query->orderBy('promotion_id', 'desc');
                break;
            case 'score-desc':
                $query = $query->orderBy('wins', 'desc')
                               ->orderBy('draws', 'desc')
                               ->orderBy('losses',);
                break;
            default:
                $query = $query->orderByDesc('wins')
                               ->orderBy('draws')
                               ->orderBy('losses', 'desc');
                break;
            
        }
        // Récupérer les résultats paginés (appends permet de conserver les paramètres de la requête)
        $workers = $query->paginate(10)->appends($request->query());

        // Récupérer toutes les promotions
        $promotions = Promotion::all();

        // Renvoie la vue en lui passant les résultats de la requête
        return view('management.workers.index', compact('workers', 'orderBy', 'promotionFilter', 'promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Création d'un nouvel objet Worker
        $worker = new Worker();
        // Récupération de toutes les promotions
        $promotions = Promotion::all();
        // Renvoie la vue en lui passant le worker et les promotions
        return view('management.workers.create', compact('worker', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request): RedirectResponse
    {
        // Création d'un nouvel objet Worker
        $worker = new Worker();
        // Chargement des relations
        $worker->load('user', 'promotion');

        // Vérifier si un fichier a été uploadé
        if ($request->hasFile('image')) {
            // Récupérer le fichier uploadé
            $file = $request->file('image');

            // Récupérer le nom du fichier
            $filename = $file->getClientOriginalName();

            // Déplacer le fichier uploadé vers le dossier public/images
            $file->storeAs('images', $filename, 'public');

            // Mettre à jour le nom de l'image dans la base de données
            $worker->image = $filename;
        }

        // Remplir le worker avec les données du formulaire
        $worker->fill($request->all());
        // Sauvegarder le worker en base de données
        $worker->save();

        // Rediriger vers la page de la liste des workers avec un message de succès
        return redirect()->route('worker.index')->with('success', 'the worker has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker): View
    {
        return view('management.workers.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker): View
    {
        //
        $promotions = Promotion::all();
        return view('management.workers.edit', compact('worker', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker): RedirectResponse
    {
        // Chargement des relations
        $worker->load('user', 'promotion');
        // Vérifier si un fichier a été uploadé
        if ($request->hasFile('image')) {
            // Récupérer le fichier uploadé
            $file = $request->file('image');

            // Récupérer le nom du fichier
            $filename = $file->getClientOriginalName();

            // Déplacer le fichier uploadé vers le dossier public/images
            $file->storeAs('images', $filename, 'public');

            // Mettre à jour le nom de l'image dans la base de données
            $worker->image = $filename;
        }

        // Mettre à jour le worker avec les données du formulaire
        $worker->update($request->all());

        // Rediriger vers la page de la liste des workers avec un message de succès
        return redirect()->route('worker.index')->with('success', 'Worker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker): RedirectResponse
    {
        // Supprimer le worker de la base de données
        $worker->delete();

        // Rediriger vers la page de la liste des workers avec un message de succès
        return redirect()->route('worker.index')->with('success', 'Worker deleted successfully');
    }

    /**
     * Search for a worker.
     */
    public function search(Request $request): View|RedirectResponse
    {
        $promotions = Promotion::all();
        // Récupérer la requête
        $query = Worker::query()->with('user', 'promotion');
        // Récupérer le paramètre search
        $search = $request->get('search');
        // Récupérer le paramètre orderBy
        $orderBy = $request->get('orderBy', 'last_name');

        // Vérifier si la requête est une requête AJAX
        if ($search) {
            // Si la requête est une requête AJAX, on renvoie les résultats en JSON
            $query = $query->where('last_name', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%');
        }

        // Récupérer les résultats paginés (appends permet de conserver les paramètres de la requête)
        $workers = Worker::where('last_name', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('promotion_id', 'like', '%' . $search . '%')
            ->paginate(10)
            ->appends($request->except('page'));

        // Renvoie la vue en lui passant les résultats de la requête
        return view('management.workers.index', compact('workers', 'orderBy', 'search'));
    }

    public function updateScore(Request $request, Worker $worker)
    {
        // Récupérer le résultat de la requête
        $result = $request->get('result');

        // Vérifier si le résultat est valide
        try {
            // Mettre à jour le score du worker
            $worker->updateScore($result);
            // Rediriger vers la page précédente avec un message de succès
            return redirect()->back()->with('success', 'Score updated successfully.');
        } catch (\Exception $e) {
            // catch permet de récupérer l'erreur et de l'afficher, on ajoute l'argument $e qui correspond à l'erreur
            return redirect()->back()->with('error', 'An error occurred while updating the score: ' . $e->getMessage());
        }
    }

    public function resetScore(Worker $worker)
    {
        // Vérifier si le résultat est valide
        try {
            // Mettre à jour le score du worker
            $worker->resetScore();
            // Rediriger vers la page précédente avec un message de succès
            return redirect()->back()->with('success', 'Score reset successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while resetting the score: ' . $e->getMessage());
        }
    }
}
