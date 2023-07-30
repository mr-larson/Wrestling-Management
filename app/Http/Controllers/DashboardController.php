<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $promotions = Promotion::withCount('workers')->get();

        $promotionNames = $promotions->pluck('name');
        $workerCounts = $promotions->pluck('workers_count');

        return view('dashboard', compact('promotionNames', 'workerCounts'));
    }
}
