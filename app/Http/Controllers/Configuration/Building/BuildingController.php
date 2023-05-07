<?php

namespace App\Http\Controllers\Configuration\Building;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Building\Building as BuildingBuilding;
use App\Models\Configuration\Building\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_api_request = Request()->route()->getPrefix() === 'api';


        if ($is_api_request) {

            $building = Building::where('building_status', true)->get()
            
            
            ;

            return response()->json([

                'success' => true,
                'data'    => $building

            ]);

        } else {

            $data['building'] = Building::where('building_status',true)->get();
    
           return view('pages.configuration.building.list_building', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.configuration.building.create_building');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $is_api_request = Request()->route()->getPrefix() === 'api';


        if ($is_api_request) {
            $data = $request->all();

            $rules = [
                'building_name' => 'required|unique:buildings',
                'building_created_by' => 'required',
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0]
                    ];

                    return response()->json($a);
                    // die;
                }
            }


            $building = new Building();
            $building->building_name = $data['building_name'];
            $building->building_created_by = $data['building_created_by'];
            $building->save();


            $data = new CommonResource($building);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }else{

            $building = new Building();
            $building->building_name = $request->building_name;
            $building->building_created_by = Auth::user()->id;
            $building->save();
        }

          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['buiding'] = Building::where('building_status', true)->where('id', $id)->first();
        return view('pages.configuration.building.edit_building', $data);
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

        $is_api_request = Request()->route()->getPrefix() === 'api';

        if ($is_api_request) {
            $data = $request->all();

            $rules = [
                'building_name' => 'required|unique:buildings',
                'building_created_by' => 'required',
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0]
                    ];

                    return response()->json($a);
                    // die;
                }
            }


            $building = Building::find($id);
            $building->building_name = $request->building_name;
            $building->building_created_by = $request->building_created_by;
            $building->update();

            $data = new CommonResource($building);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }else{
            Building::where('building_status', true)->where('id', $request->id)->update([
                'building_name' => $request->building_name,
                'building_updated_by' => Auth::user()->id,
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_api_request = Request()->route()->getPrefix() === 'api';

        if ($is_api_request) {


            Building::where('building_status', true)->where('id', $id)->update([
                'building_status' => 0,
            ]);

            return response()->json([

                'success' => true,
                'msg'     => 'Building Deleted Successfull'

            ]);
        }else{

            Building::where('building_status', true)->where('id', $id)->update([
                'building_status' => 0,
            ]);


        }


    }
    

    public function buildingWise($id)
    {
        $data = new CommonResource(DB::table('flats')->where('building_id', $id)
        ->join('users', 'users.id', '=', 'flats.owner_id')
        ->get());




        return $data;
    }
}
