<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Mail\InvoiceOrderMailable;

class OrderController extends Controller
{
    public function index(Request $request){
        $todaydate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != Null ,function($q) use($request){
                          return $q-> whereDate('created_at',$request->date);

                      },function ($q) use($todaydate){
                        return $q -> whereDate('created_at',$todaydate);

                      })
                        ->when($request->status != Null ,function($q) use($request){
                            return $q-> where('status_message',$request->status);
  
                        })
                        ->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
    public function Show($orderid){
        $order = Order::where('id',$orderid)->first();
        if($order){
            return view('admin.orders.view',compact('order'));

        }else{
            return redirect()->back()->with('message','No Order Found');
        }
       
    }
    public function updateOrderStatus(int $orderid, Request $request){
        $order = Order::where('id',$orderid)->first();
        if($order){
            $order->update(
                [
                    'status_message' => $request->order_status

                ]
                );
                return redirect('admin/orders/'.$orderid)->with('message',' Order Status Updated');

        }else{
            return redirect('admin/orders/'.$orderid)->with('message','No Order Found');
        }

    }
    public function viewinvoice(int $orderid){
        $order = Order::findorFail($orderid);
        return view('admin.invoice.viewinvoice',compact('order'));

    }
    public function generateinvoice(int $orderid){
        $order = Order::findorFail($orderid);
        $data=['order'=>$order];
        $pdf = Pdf::loadView('admin.invoice.viewinvoice', $data);
        $todaydate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todaydate.'.pdf');

    }
    public function mailInvoice(int $orderid){
        $order = Order::findorFail($orderid);
        try {
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect()->back()->with('message','Invoice Mail has been sent to'.$order->email);
        } catch (\Exception $e) {
            return redirect()->back()->with('message','something went wrong !');
        }
      
    }
}
