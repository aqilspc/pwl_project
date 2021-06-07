<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosContributor;
use App\Models\BansosReceiver;
class BansosItem extends Model
{
    use HasFactory;

    public function donation()
    {
        return $this->belongsTo(BansosDonation::class);
    }

    public function contributor()
    {
        return $this->hasMany(BansosContributor::class);
    }
}
