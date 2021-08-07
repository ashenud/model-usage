<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Models\SalesOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SalesOrderController extends Controller
{
    
    public function get() {

        $user= Auth::user();
        $sales_orders = SalesOrder::where('rep_id',$user->u_id)->get();
        $sales_orders->transform(function($order){
            return [
                'so_id'=>$order->so_id,
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

    public function hasOne(Request $request) {

        // * Validate main request data
        $validator = Validator::make($request->all(), [
            'rep_id' => 'required|exists:users,u_id',
        ]);

        // * Throw an exception if required parameters not supplied
        if ($validator->fails())
            throw new ApiException($validator->errors()->first(), 1);
        
        $user = User::find($request->rep_id);
        $sales_order = $user->hasOneSalesOrder;

        return response()->json([
            'result'=> true,
            'sales_orders'=>$sales_order,
        ]);

    }

    public function belongsTo(Request $request) {

        // * Validate main request data
        $validator = Validator::make($request->all(), [
            'so_id' => 'required|exists:sales_orders,so_id',
        ]);

        // * Throw an exception if required parameters not supplied
        if ($validator->fails())
            throw new ApiException($validator->errors()->first(), 1);
        
        $sales_order = SalesOrder::find($request->so_id);
        $user = $sales_order->belongedUser;

        return response()->json([
            'result'=>true,
            'user'=>$user,
        ]);

    }

    public function hasMany(Request $request) {

        // * Validate main request data
        $validator = Validator::make($request->all(), [
            'rep_id' => 'required|exists:users,u_id',
            'cus_id' => 'required|exists:customers,cus_id',
        ]);

        // * Throw an exception if required parameters not supplied
        if ($validator->fails())
            throw new ApiException($validator->errors()->first(), 1);
        
        
        $user = User::find($request->rep_id);
        $sales_orders = $user->hasManySalesOrders->where('cus_id', $request->cus_id);
        $sales_orders->transform(function($order){
            return [
                'so_id'=>$order->so_id,
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

    public function hasOneThrough(Request $request) {

        // * Validate main request data
        $validator = Validator::make($request->all(), [
            'rep_id' => 'required|exists:users,u_id',
            'cus_id' => 'required|exists:customers,cus_id',
        ]);

        // * Throw an exception if required parameters not supplied
        if ($validator->fails())
            throw new ApiException($validator->errors()->first(), 1);
        
        
        $user = User::find($request->rep_id);
        $sales_orders = $user->hasManySalesOrders->where('cus_id', $request->cus_id);
        $sales_orders->transform(function($order){
            return [
                'so_id'=>$order->so_id,
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
