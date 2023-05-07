<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Configuration\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = CommonResource::collection(Employee::whereEmployeeStatus(1)->whereEmployeeHasDeleted("NO")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['employees']], 200);
        } else {

            return view('pages.configuration.employee.employee_list', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['all_roles'] = Role::all();
        return view('pages.configuration.employee.create_employee', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        // die;


        $employee = new Employee();
        $employee->employee_name = $request->employee_name;
        $employee->employee_email = $request->employee_email;
        $employee->employee_phone = $request->employee_phone;
        $employee->employee_role = $request->employee_role;
        $employee->employee_password = Hash::make($request->employee_password);
        $employee->save();

        $employee_role['role_id'] = $request->employee_role;
        $employee_role['user_id'] = $employee->id;

        $employee_save = DB::table('users_roles')->insert($employee_role);

        $permissions = DB::table('roles_permissions')
        ->where('role_id', $request->role)
            ->get();
        foreach ($permissions as $rowPermission) {
            $datasave['user_id'] = $employee->id;
            $datasave['permission_id'] = $rowPermission->permission_id;
            DB::table('users_permissions')->insert($datasave);
        }

        $data = new CommonResource($employee);

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

        $data['employee'] = CommonResource::collection(Employee::where('id',$id)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['employees']], 200);

        }else{
            return view('pages.configuration.employee.view_employee', $data);
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
        $data['employee'] = CommonResource::collection(Employee::whereId($id)->whereEmployeeStatus(1)->whereEmployeeHasDeleted("NO")->get());
        if (isAPIRequest()) {
            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['employee']], 200);
        } else {
            return view('pages.configuration.employee.edit_employee', $data);
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
        // $request->validate([
        //     'flat_no' => 'required',
        //     'owner_id' => 'required'
        // ]);

        $item = Employee::findOrFail($id);

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
        $item = Employee::find($id);
        $item->employee_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}
