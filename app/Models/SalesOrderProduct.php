<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_order_products';

    protected $primaryKey = 'sop_id';

    protected $fillable = [
        'so_id',
        'pro_id',
        'pro_price',
    ];
}
