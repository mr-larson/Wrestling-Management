<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum WorkerGender: string
{
    use WithDisplayName;

    case man = 'Man';
    case woman = 'Woman';

}
