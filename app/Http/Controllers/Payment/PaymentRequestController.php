<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\PaymentRequest;
use App\Http\Resources\CommonResource;

class PaymentRequestController extends Controller
{
   public function list_of_payment_request(){
       if(\Illuminate\Support\Facades\Auth::user()->type == "ASSOCIATION"){
       $ndata = PaymentRequest::whereDataHasDeleted("NO")->whereNull('rentee_id')->get();
       }else if(\Illuminate\Support\Facades\Auth::user()->type == "FLAT_OWNER"){
       $ndata = PaymentRequest::whereDataHasDeleted("NO")->whereFlatOwnerId(\Illuminate\Support\Facades\Auth::user()->id)->get();    
       }else if(\Illuminate\Support\Facades\Auth::user()->type == "RENTEE"){
       $ndata = PaymentRequest::whereDataHasDeleted("NO")->whereRenteeId(\Illuminate\Support\Facades\Auth::user()->id)->get();    
       }
       
        $data['items'] = CommonResource::collection($ndata);

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.payment.flat_owner.list_of_payment_request', $data);
        } 
   }
   
   public function approve_payment_request(Request $request) {
       $payment = PaymentRequest::find($request->payment_id);
       $payment->verification_status = $request->verification_status;
       $payment->save();
   }
}
