<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;

/**
 * @mixin IdeHelperPromotion
 */
class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'promotions';

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
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

        $path = $value->store('images/promotions', 'public');

        $this->attributes['image'] = $path;
    }


    public function getImageAttribute($value)
    {
        return $value ? str_replace('/storage/', '', Storage::url($value)) : null;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function getRankedWorkers()
    {
        $workers = $this->workers()->get();

        $workers = $workers->sortByDesc(function ($worker) {
            return $worker->wins * 3 + $worker->draws;
        });

        return $workers;
    }

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }


}
