<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Promotions extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'promotions';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function setImageAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['image'] = $value;
            return;
        }

        $path = $value->store('public/images/promotions');

        $this->attributes['image'] = Storage::url($path);
    }
}
