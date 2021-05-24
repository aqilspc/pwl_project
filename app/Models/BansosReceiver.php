<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BansosItem;
class BansosReceiver extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(BansosItem::class);
    }
}
