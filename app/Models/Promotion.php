<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


/*property string $name
 *property string $description
 *property string $image
 *property int $user_id
 *property \Illuminate\Support\Carbon $created_at
 *property \Illuminate\Support\Carbon $updated_at
 *property \Illuminate\Support\Carbon $deleted_at
 */

class Promo
{
    public function __construct(
        public string $name,
        public string $description,
        public string $image,
        public int $user_id,
        public \Illuminate\Support\Carbon $created_at,
        public \Illuminate\Support\Carbon $updated_at,
        public \Illuminate\Support\Carbon $deleted_at,
    ) {
    }
}
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

        $path = $value->store('public/images/promotions');

        $this->attributes['image'] = Storage::url($path);
    }

    public function getImageAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
