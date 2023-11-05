<?php

namespace App\Models;

use App\Enums\WorkerCategory;
use App\Enums\WorkerGender;
use App\Enums\WorkerStatus;
use App\Enums\WorkerStyle;
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
        'lastname',
        'firstname',
        'nickname',
        'gender',
        'age',
        'style',
        'status',
        'category',
        'height',
        'weight',
        'image',
        'overall',
        'popularity',
        'endurance',
        'promo_skill',
        'wins',
        'draws',
        'losses',
        'note',
        'user_id',
        'promotion_id',
        'created_by',
        'updated_by',
        'deleted_by',
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
        'gender' => WorkerGender::class,
        'style' => WorkerStyle::class,
        'status' => WorkerStatus::class,
        'category' => WorkerCategory::class,
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($worker) {
            $worker->lastname = strtoupper($worker->lastname);
        });

        static::updating(function ($worker) {
            $worker->lastname = strtoupper($worker->lastname);
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

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }
}
