<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function product(){
        $this->belongsTo(Product::class);
    }
    public function user(){
        $this->belongsTo(User::class);
    }
}
