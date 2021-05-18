<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'user_id',
        'event_id',
        'sector',
        'seat'
    ];

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
