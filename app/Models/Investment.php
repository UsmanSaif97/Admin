<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $table = 'investments'; // Table name if not following Laravel's conventions

    protected $fillable = [
        'investor_id',
        'amount',
        'investment_date',
    ];

    public $timestamps = false; // Set to true if you have timestamps

    // Define a relationship to the Investor model
    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id');
    }
}
