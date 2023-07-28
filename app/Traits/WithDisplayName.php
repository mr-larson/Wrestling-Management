<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait WithDisplayName
{
    public function displayName() {
        return Str::ucfirst(Str::replace('_', ' ', $this->name));
    }
}
