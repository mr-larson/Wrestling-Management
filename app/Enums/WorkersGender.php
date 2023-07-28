<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum WorkersGender: string
{
    use WithDisplayName;

    case man = 'Man';
    case woman = 'Woman';

}