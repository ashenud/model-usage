<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_name',
        'pro_code',
        'pro_price',
    ];
}
