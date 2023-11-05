<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum WorkerCategory: string
{
    use WithDisplayName;

    case heavyweight = 'Heavyweight';
    case light_heavyweight = 'Light Heavyweight';
    case featherweight = 'Featherweight';
    case cruiserweight = 'Cruiserweight';
}
