<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'cus_id';

    protected $fillable = [
        'cus_name',
        'cus_code',
    ];
}
