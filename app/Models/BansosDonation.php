<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosCategory;
use App\Models\BansosReceiver;
use App\Models\Photo;
use App\Models\BansosItem;
class BansosDonation extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo(BansosCategory::class,'bansos_category_id');
    }

    public function receiver()
    {
    	return $this->belongsTo(BansosReceiver::class,'bansos_receiver_id');
    }

    public function photo()
    {
    	return $this->hasMany(Photo::class,'bansos_donation_id');
    }

    public function item()
    {
    	return $this->hasMany(BansosItem::class,'bansos_donation_id');
    }
}
