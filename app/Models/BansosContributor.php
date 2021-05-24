<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosDonation;
use App\Models\User;
class BansosContributor extends Model
{
    use HasFactory;

    public function donation()
    {
    	return $this->belongsTo(BansosDonation::class);
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
