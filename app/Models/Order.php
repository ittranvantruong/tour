<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = ['tour_id', 'fullname', 'phone', 'email', 'birthday', 'amount_customer', 'payment_method'];
}
