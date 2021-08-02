<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesOrderController extends Controller
{
    
    public function get() {

        $user= Auth::user();
        $sales_orders = SalesOrder::where('rep_id',$user->u_id)->get();
        $sales_orders->transform(function($order){
            return [
                'so_id'=>$order->rsn_id,
                'so_no'=>$order->so_no,
                'date'=>$order->date
            ];
        });

        return response()->json([
            'result'=>!$sales_orders->isEmpty(),
            'sales_orders'=>$sales_orders,
            'count'=>$sales_orders->count()
        ]);

    }

}
