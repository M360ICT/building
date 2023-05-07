<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use Illuminate\Http\Request;
use App\Models\Configuration\BillingItem;
use App\Http\Resources\Configuration\BillingItemResource;

class BillingItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->flat_owner_id) {
            $items = BillingItem::whereDataHasDeleted("NO")->whereFlatOwnerId($request->flat_owner_id)->get();
        } else {
            $flat_owner = \Illuminate\Support\Facades\Auth::user()->id;
            if (\Illuminate\Support\Facades\Auth::user()->type == "FLAT_OWNER") {
                $items = BillingItem::whereDataHasDeleted("NO")->whereItemsFor('RENTEE')->whereFlatOwnerId($flat_owner)->get();
            } else {
                $items = BillingItem::whereDataHasDeleted("NO")->whereItemsFor('FLAT_OWNERS')->get();
            }
        }



        $data['items'] = BillingItemResource::collection($items);

        if (isAPIRequest()) {

            if ($request->flat_owner_id) {
                $items = BillingItem::whereDataHasDeleted("NO")->whereFlatOwnerId($request->flat_owner_id)->get();
            } else {
                if ($request->type == "FLAT_OWNER") {
                    $items = BillingItem::whereDataHasDeleted("NO")->whereItemsFor('RENTEE')->whereFlatOwnerId($flat_owner)->get();
                } else {
                    $items = BillingItem::whereDataHasDeleted("NO")->whereItemsFor('FLAT_OWNERS')->get();
                }
            }



            $data['items'] = BillingItemResource::collection($items);


            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.billing_items.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.configuration.billing_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'billing_item_name' => 'required',
            //            'billing_item_charge' => 'required'
        ]);

        if ($request->user_type && $request->flat_owner_id) {
            $uuserType = $request->user_type;
            $userId = $request->flat_owner_id;
        } else {
            if (isAPIRequest()) {
                $uuserType = $request->user_type;
                $userId = $request->flat_owner_id;
            } else {
                $uuserType = \Illuminate\Support\Facades\Auth::user()->type;
                $userId = \Illuminate\Support\Facades\Auth::user()->id;
            }
        }

        $item = new BillingItem;

        if ($request->item_for && $request->flat_owner_id) {
            $item->items_for = $request->item_for;
            $item->flat_owner_id = $request->flat_owner_id;
        } else {
            if ($uuserType == "FLAT_OWNER") {
                $item->items_for = "RENTEE";
                $item->flat_owner_id = $userId;
            } else {
                $item->items_for = "FLAT_OWNERS";
            }
        }

        $item->billing_item_name = $request->billing_item_name;
        $item->flat_owner_id = $request->flat_owner_id;
        $item->billing_item_charge = $request->billing_item_charge;
        $item->billing_item_show_in_invoice = $request->billing_item_show_in_invoice;
        $item->status = 1;

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
    public function show($id)
    {
        $data['items'] = BillingItemResource::collection(BillingItem::whereId($id)->whereStatus(1)->get());

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
    public function edit($id)
    {
        $data['items'] = BillingItemResource::collection(BillingItem::whereId($id)->whereStatus(1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.billing_items.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'billing_item_name' => 'required',
            'billing_item_charge' => 'required'
        ]);

        $item = BillingItem::find($id);

        $item->billing_item_name = $request->billing_item_name;
        $item->billing_item_charge = $request->billing_item_charge;
        $item->billing_item_show_in_invoice = $request->billing_item_show_in_invoice;
        $item->status = 1;

        $item->save();

        $data = new BillingItemResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = BillingItem::find($id);

        $item->data_has_deleted = "YES";
        $item->save();
        $data = new BillingItemResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}
