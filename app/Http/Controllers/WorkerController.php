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
        
        $orderBy = $request->get('orderBy', 'score');

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
                               ->orderBy('losses', 'desc');
                break;
            default:
                $query = $query->orderByDesc('wins')
                               ->orderBy('draws')
                               ->orderBy('losses');
                break;
            
        }

        $workers = $query->paginate(10)->appends($request->query());

        return view('management.workers.index', compact('workers', 'orderBy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $worker = new Worker();
        $promotions = Promotion::all();
        return view('management.workers.create', compact('worker', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request): RedirectResponse
    {
        $worker = new Worker();
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

        $worker->fill($request->all());
        $worker->save();

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
        $promotions = Promotion::all();
        return view('management.workers.edit', compact('worker', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker): RedirectResponse
    {
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

        $worker->update($request->all());

        return redirect()->route('worker.index')->with('success', 'Worker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker): RedirectResponse
    {
        $worker->delete();

        return redirect()->route('worker.index')->with('success', 'Worker deleted successfully');
    }

    /**
     * Search for a worker.
     */
    public function search(Request $request): View|RedirectResponse
    {
        $query = Worker::query()->with('user', 'promotion');

        $search = $request->get('search');
        $orderBy = $request->get('orderBy', 'last_name');

        if ($search) {
            $query = $query->where('last_name', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%');
        }

        $workers = Worker::where('last_name', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('promotion_id', 'like', '%' . $search . '%')
            ->paginate(10)
            ->appends($request->except('page'));

        return view('management.workers.index', compact('workers', 'orderBy', 'search'));
    }

    public function updateScore(Request $request, Worker $worker)
    {
        $result = $request->get('result');

        try {
            $worker->updateScore($result);
            return redirect()->back()->with('success', 'Score updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the score: ' . $e->getMessage());
        }
    }

    public function resetScore(Worker $worker)
    {
        try {
            $worker->resetScore();
            return redirect()->back()->with('success', 'Score reset successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while resetting the score: ' . $e->getMessage());
        }
    }
}
