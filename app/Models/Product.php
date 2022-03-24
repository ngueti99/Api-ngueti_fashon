<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
    public function Brand(){
        $this->belongsTo(Brand::class);
    }
}
