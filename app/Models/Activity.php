<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'creator_id',
        'reference'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithinDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public function scopeReference($query, $reference)
    {
        return $query->where('reference', $reference);
    }


    public function scopeFilterByRefAndUserid($query, $reference, $user_id = null)
    {
        return $query->where('reference', $reference)
            ->when($user_id ?? false, function ($query) use($user_id){
            $query->where('user_id', $user_id);
        });
    }

}
