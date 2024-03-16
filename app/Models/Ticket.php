<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'message',
        'user_id',
        'type',
        'sub_type',
        'closed_date',
        'start_date',
    ];
    protected $casts = [
        'closed_date' => 'datetime',
        'start_date' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeBySubType($query, $subType)
    {
        return $query->where('sub_type', $subType);
    }
}
