<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Check_in',
        'Check_out',
        'Id_room',
        'Id_client',
        'Details',
        'Price',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
