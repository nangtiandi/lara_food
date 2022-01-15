<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function food(){
        return $this->belongsTo(Food::class,'food_id');
    }
    public function table(){
        return $this->belongsTo(Table::class,'table_id');
    }
}
