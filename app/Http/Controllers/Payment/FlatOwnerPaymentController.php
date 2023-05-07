<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\FlatOwnerPayment;
use App\Http\Resources\CommonResource;
use App\Models\Configuration\Building\Building;
use App\Models\Payment\PaymentRequest;

class FlatOwnerPaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['items'] = CommonResource::collection(FlatOwnerPayment::whereStatus("ACTIVE")->whereDataHasDeleted("NO")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.payment.flat_owner.index', $data);
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
        $data['invoices'] = \App\Models\Invoice\Invoice::where('flat_owner_id','=', \Illuminate\Support\Facades\Auth::user()->id)->get();
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->get());
        return view('pages.payment.flat_owner.create',$data);
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
        $item->flat_owner_id = $request->hidden_flat_owner_id;
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
    public function show($id) {
        $data['items'] = CommonResource::collection(FlatOwnerPayment::whereId($id)->whereStatus("ACTIVE")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.billing_items.view', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['items'] = CommonResource::collection(FlatOwnerPayment::whereId($id)->whereStatus("ACTIVE")->get());
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->get());
        $data['buildings'] = CommonResource::collection(Building::whereBuildingStatus(1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.payment.flat_owner.edit', $data);
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

        $item = FlatOwnerPayment::findOrFail($id);
        
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

        $item = FlatOwnerPayment::find($id);

        $item->data_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

}
