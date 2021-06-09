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
        return $this->belongsTo(BansosDonation::class,'bansos_donation_id');
    }

    public function contributor()
    {
        return $this->belongsTo(BansosContributor::class,'bansos_contributor_id');
    }
}
