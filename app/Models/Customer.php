<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CustomersController;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =
    [
    'name',
    'email',
    'mobile_num',
    'image',
    'address',
    'status'
    ];
}
