<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        // Récupérer tous les workers avec leurs promotions
        $workers = Worker::with('promotion')->get();

        // Créer un tableau pour stocker le nombre de workers par promotion
        $promotionCounts = [];

        // Compter le nombre de workers par promotion
        foreach ($workers as $worker) {
            $promotion = $worker->promotion;
            if ($promotion) {
                if (!isset($promotionCounts[$promotion->name])) {
                    $promotionCounts[$promotion->name] = 0;
                }
                $promotionCounts[$promotion->name]++;
            }
        }

        // Trier les promotions par ordre décroissant en fonction du nombre de workers
        arsort($promotionCounts);

        // Extraire les labels et les valeurs pour le graphique
        $promotionLabels = array_keys($promotionCounts);
        $workerCounts = array_values($promotionCounts);

        // Renvoyer la vue du tableau de bord en passant les données nécessaires
        return view('dashboard', compact('promotionLabels', 'workerCounts'));
    }
}

