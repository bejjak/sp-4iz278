<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sport extends Model
{
    use HasFactory;

    protected $table = 'sport';
    protected $primaryKey = 'sport_id';

    protected $fillable = [
        'sport_name',
        'img'
    ];

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class);
    }

    public function favoritedBy(): BelongsToMany {
        return $this->belongsToMany(User::class, 'favorite_sport');
    }
}
