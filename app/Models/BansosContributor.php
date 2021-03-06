<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosItem;
use App\Models\User;
class BansosContributor extends Model
{
    use HasFactory;

    public function item()
    {
    	return $this->hasMany(BansosItem::class,'bansos_item_id');
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
