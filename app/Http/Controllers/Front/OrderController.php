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
use Illuminate\Support\Facades\Mail;
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
            foreach(User::get() as $user){
                $user->notify(new NewOrderNotification($order));
            }

            $mail_data = [
                'recipient' => 'ahmer631998@gmail.com',
                'fromEmail' => $order->email,
                'fromName' => $order ->name,
                'subject' => "New Order",
                'body' => $order->descripyion,
                'order' => $order,
                'service' => $order->service->name,
                'greeting' => 'Hello,',
                'actionText' => 'View Order',
                'actionUrl' => route('orders.edit',$order->id),
            ];

            Mail::send('order-email-template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

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
        else{
            return response()->json([
                'status' => false,
                'msg' => 'error',
            ]);
        }

    }
}
