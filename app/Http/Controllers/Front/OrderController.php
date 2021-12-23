<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Throwable;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        DB::beginTransaction();

        try{
            $order = Order::create($request->validated());

            //Notification Code


            foreach(User::where('role','like','Administrator')->get() as $user){
                $user->notify(new NewOrderNotification($order));
            }

            DB::commit();
        }catch(Throws $e){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'error' => $e,
            ]);
        }


        if($order)
        {
            return response()->json([
                'status' => true,
            ]);
        }

    }
}
