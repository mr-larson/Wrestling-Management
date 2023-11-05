<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum WorkerStatus: string
{
    use WithDisplayName;
    case active = 'Active';
    case local = 'Local';
    case legend = 'Legend';
    case inactive = 'Inactive';
    case retired = 'Retired';
}
