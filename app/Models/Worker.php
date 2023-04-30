<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperWorker
 */
class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'workers';

    protected $fillable = [
        'last_name',
        'first_name',
        'note',
        'image',
        'user_id',
        'promotion_id',
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($worker) {
            $worker->last_name = strtoupper($worker->last_name);
        });

        static::updating(function ($worker) {
            $worker->last_name = strtoupper($worker->last_name);
        });
    }
    
    public function setImageAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['image'] = $value;
            return;
        }

        $path = $value->store('images/workers', 'public');

        $this->attributes['image'] = $path;
    }

    public function getImageAttribute($value)
    {
        return $value ? str_replace('/storage/', '', Storage::url($value)) : null;
    }

    public function updateScore($result)
    {
        switch ($result) {
            case 'win':
                $this->wins++;
                break;
            case 'draw':
                $this->draws++;
                break;
            case 'loss':
                $this->losses++;
                break;
            default:
                throw new \Exception('Invalid result');
        }

        $this->save();
    }

    public function resetScore()
    {
        $this->wins = 0;
        $this->draws = 0;
        $this->losses = 0;

        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
