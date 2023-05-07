<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\RenteePayment;
use App\Http\Resources\CommonResource;
use App\Models\Payment\PaymentRequest;

class RenteePaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['items'] = CommonResource::collection(RenteePayment::whereStatus("ACTIVE")->whereDataHasDeleted("NO")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.payment.rentee.index', $data);
        }
    }
    
    public function list_of_flat_owners() {
//        return get_flat_owner_current_balance_by_flat_owner_id(8);
        $owners = FlatOwnerPayment::join('users','users.id','=','flats.owner_id')
                ->join('buildings','flats.building_id','=','buildings.id')
                ->select('flats.owner_id','users.id AS user_id','users.*','flats.id AS flat_id','flats.*','buildings.id AS building_id','buildings.*')
                ->get();
//        echo "<pre>";print_r($owners);die;
             $data['items'] = CommonResource::collection($owners);
             
            

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {
// echo 1;die;
            return view('pages.configuration.flat.flat_owners', $data);
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['invoices'] = \App\Models\Invoice\Invoice::where('rentee_id','=', \Illuminate\Support\Facades\Auth::user()->id)->get();
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->get());
        return view('pages.payment.rentee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'hidden_flat_owner_id' => 'required',
            'amount' => 'required'
        ]);

        $item = new PaymentRequest;
        $item->amount = $request->amount;
        $item->status = "Pending";
        $item->invoice_id = $request->invoice_id;
        $item->rentee_id = $request->hidden_flat_owner_id;
        $flat_owner = \App\Models\Rentee\Rentee::where('rentee.user_id','=',$request->hidden_flat_owner_id)
                ->join('flats','flats.id','=','rentee.flat_id')
                ->get();
        $item->flat_owner_id = $flat_owner[0]->owner_id;
        $item->date = date('Y-m-d');
        
        $item->save();

        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['items'] = CommonResource::collection(RenteePayment::whereId($id)->whereStatus("ACTIVE")->get());
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->get());
        $data['buildings'] = CommonResource::collection(Building::whereBuildingStatus(1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.payment.rentee.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'flat_no' => 'required',
            'owner_id' => 'required'
        ]);

        $item = RenteePayment::findOrFail($id);
        
        $item->update($request->all());
       
        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $item = RenteePayment::find($id);

        $item->data_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

}
