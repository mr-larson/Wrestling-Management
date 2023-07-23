<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tournaments';

    protected $fillable = [
        'name',
        'num_participants',
        'has_group_phase',
        'promotion_id',
    ];

    protected $casts = [
        'has_group_phase' => 'boolean',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}

