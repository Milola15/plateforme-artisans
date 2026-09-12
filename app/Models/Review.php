<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'artisan_id', 'booking_id', 'note', 'commentaire'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}