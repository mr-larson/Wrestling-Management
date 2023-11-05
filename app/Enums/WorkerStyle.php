<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum WorkerStyle: string
{
    use WithDisplayName;
    case cruiser = 'Cruiser';
    case giant = 'Giant';
    case brawler = 'Brawler';
    case fighter = 'Fighter';
    case technician = 'Technician';
}
