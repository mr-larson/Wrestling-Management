<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionsRequest;
use App\Http\Requests\UpdatePromotionsRequest;
use App\Models\Promotions;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        /**
        $query = Promotions::all();
        $orderBy = $request->get('orderBy', 'name');
        switch ($orderBy) {
            case 'created_at':
                $query->orderBy('created_at');
                break;
            case 'created_at-desc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
            default:
                $query->orderBy('name');
            }
        $promotions = $query->paginate(10)->appends($request->query());

        return view('management.promotions.index', compact('promotions', 'orderBy')); 
        */
        $promotions = Promotions::all();

        return view('management.promotions.index', compact('promotions')); 
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
    public function store(StorePromotionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotions $promotions)
    {
        //
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
