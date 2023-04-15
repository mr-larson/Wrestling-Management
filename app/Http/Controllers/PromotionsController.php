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
        $promotion = new Promotions();
        $promotion->fill($request->validated());
        $promotion->save();

        return redirect()->route('management.promotions.index')->with('success', 'Promotion created successfully');;
    }

    public function show(Promotions $promotions): View
    {
        return view('management.promotions.show', compact('promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotions $promotions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionsRequest $request, Promotions $promotions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotions $promotions)
    {
        //
    }
}
