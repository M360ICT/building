<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Configuration\PayrollExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PayrollExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['item'] = CommonResource::collection(PayrollExpense::wherePayrollExpenseHasDeleted("NO")->get());

        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['item']], 200);
        } else {

            return view('pages.configuration.payroll_expenses.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.configuration.payroll_expenses.create');
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
            'payroll_expense_name' => 'required|unique:payroll_expenses',
        ]);

        $item = new PayrollExpense();

        $item->payroll_expense_name = $request->payroll_expense_name;
        $item->payroll_expense_slug = Str::slug($request->payroll_expense_name);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['items'] = CommonResource::collection(PayrollExpense::whereId($id)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.configuration.payroll_expenses.edit', $data);
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
            'payroll_expense_name' => 'required',
        ]);

        $item = PayrollExpense::find($id);

        $item->payroll_expense_name = $request->payroll_expense_name;
        $item->payroll_expense_slug = $request->payroll_expense_slug;
        $item->save();

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
        $item = PayrollExpense::find($id);

        $item->payroll_expense_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}
