<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration\Building\Building;
use App\Http\Resources\CommonResource;
use App\Models\Configuration\Flat;
use App\Models\User;

class FlatController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = CommonResource::collection(Flat::whereStatus("ACTIVE")->whereDataHasDeleted("NO")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.flat.index', $data);
        }
    }

    public function list_of_flat_owners()
    {
        //        return get_flat_owner_current_balance_by_flat_owner_id(8);
        $owners = Flat::join('users', 'users.id', '=', 'flats.owner_id')
            ->join('buildings', 'flats.building_id', '=', 'buildings.id')
            ->select('flats.owner_id', 'users.id AS user_id', 'users.*', 'flats.id AS flat_id', 'flats.*', 'buildings.id AS building_id', 'buildings.*')
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
    public function create()
    {
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->where('type', 'FLAT_OWNER')->get());
        $data['buildings'] = CommonResource::collection(Building::whereBuildingStatus(1)->get());
        return view('pages.configuration.flat.create', $data);
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
            'flat_no' => 'required',
            'owner_id' => 'required',
            // 'building_id' => 'required'
        ]);


        $item = Flat::create($request->all());

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
        $data['items'] = CommonResource::collection(Flat::whereId($id)->whereStatus("ACTIVE")->get());

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
        $data['items'] = CommonResource::collection(Flat::whereId($id)->whereStatus("ACTIVE")->get());
        $data['users'] = CommonResource::collection(\App\User::whereStatus(1)->get());
        $data['buildings'] = CommonResource::collection(Building::whereBuildingStatus(1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.flat.edit', $data);
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
            'flat_no' => 'required',
            'owner_id' => 'required'
        ]);

        $item = Flat::findOrFail($id);

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
    public function destroy($id)
    {

        $item = Flat::find($id);
        $item->data_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    public function onlyFlatOwner()
    {
        //$data['user'] = User::whereStatus(1)->where('type', 'FLAT_OWNER')->get();

        $data['user'] = User::join('flats', 'users.id', '=', 'flats.owner_id')->distinct()
            ->select('flats.owner_id', 'users.id', 'users.name')
            ->get();
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}
