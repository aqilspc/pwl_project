<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosDonation;
class Photo extends Model
{
    use HasFactory;

    public function donation()
    {
        return $this->belongsTo(BansosDonation::class);
    }
}
