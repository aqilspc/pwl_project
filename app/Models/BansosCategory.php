<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosDonation;
class BansosCategory extends Model
{
    use HasFactory;

    public function donation()
    {
        return $this->hasMany(BansosDonation::class);
    }
}
