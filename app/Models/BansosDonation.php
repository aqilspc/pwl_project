<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosCategory;
use App\Models\BansosContributor;
use App\Models\Photo;
use App\Models\BansosItem;
class BansosDonation extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo(BansosCategory::class);
    }

    public function contributor()
    {
    	return $this->belongsTo(BansosContributor::class);
    }

    public function photo()
    {
    	return $this->hasMany(Photo::class);
    }

    public function item()
    {
    	return $this->hasMany(BansosItem::class);
    }
}
