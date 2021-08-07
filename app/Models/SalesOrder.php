<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_orders';

    protected $primaryKey = 'so_id';

    protected $fillable = [
        'so_no',
        'rep_id',
        'cus_id',
        'date',
    ];

    public function belongedUser() {
        return $this->belongsTo(User::class, 'rep_id');
    }

}
