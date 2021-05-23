<?php

namespace App\Models;

use Decimal\Decimal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    protected $primaryKey = 'event_id';

    protected $fillable = [
        'event_name',
        'start_date',
        'end_date',
        'img',
        'price',
        'competition',
        'capacity',
        'description',
        'sport_id',
        'place_id'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function sport(): BelongsTo {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    public function place(): BelongsTo {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function formatPrice($price): string {
        return number_format($price, 2, ',', ' ');
    }

    public function formatDate($date): string {
        return $date->format('j. n. Y');
    }
}
