<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable =
    [
    'name',
    'created_by_id',
    'category_id',
    'description',
    'unit_price',
    'image',
    'height',
    'width',
    'weight',
    'size',
    'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function users(){
        return $this->belongsTo(User::class,'created_by_id');
    }
}
