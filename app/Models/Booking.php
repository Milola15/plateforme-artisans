<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'artisan_id', 'service_id', 'adresse', 'date_souhaitee', 'description', 'statut'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}