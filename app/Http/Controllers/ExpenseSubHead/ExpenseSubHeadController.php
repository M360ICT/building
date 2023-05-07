<?php

namespace App\Http\Controllers\ExpenseSubHead;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseSubHeadResource;
use App\Models\ExpenseSubhead\ExpenseSubHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseSubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['expenseSubhead'] = CommonResource::collection(ExpenseSubHead::where('status', 1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expenseSubhead']], 200);
        } else {

            return view('pages.expensesubhead.list_expense_sub_head', $data);
        }





        // $data['head'] = ExpenseHead::where('status',1)->get();
        // return view('pages.expensehead.list_expense_head',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expensesubhead.create_expense_sub_head');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = [
        //     'title' => 'required|string|max:255',
        //     'created_by' => 'required|integer',
        // ];

        $expensesubhead = new ExpenseSubHead();
        $expensesubhead->title  = $request->title;
        $expensesubhead->expense_head_id  = $request->expense_head_id;
        if (isAPIRequest()) {
            $expensesubhead->created_by  = $request->created_by;
        } else {
            $expensesubhead->created_by  = Auth::user()->id;
        }
        $expensesubhead->save();


        $data = new CommonResource($expensesubhead);

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
        $data['head'] = ExpenseSubHead::where('expense_sub_head_id', $id)->first();
        return view('pages.expensesubhead.edit_expense_sub_head', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $item = ExpenseSubHead::find($id);
        $item->title = $request->title;
        $item->updated_by = $request->updated_by;
        $item->expense_head_id = $request->expense_head_id;
        if (isAPIRequest()) {
            $item->updated_by = $request->updated_by;
        } else {
            $item->updated_by = Auth::user()->id;
        }

        $item->save();


        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);





        // $request->validate([
        //     'title' => 'required',
        //     'updated_by' => 'required'
        // ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense_head = ExpenseSubHead::find($id);
        $expense_head->status = 0;
        $expense_head->save();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted'], 200);
    }
}