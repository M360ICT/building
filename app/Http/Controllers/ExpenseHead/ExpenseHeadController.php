<?php

namespace App\Http\Controllers\ExpenseHead;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseHeadResource;
use App\Models\ExpenseHead\ExpenseHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['expensehead'] = CommonResource::collection(ExpenseHead::where('status',1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expensehead']], 200);
        } else {

            return view('pages.expensehead.list_expense_head', $data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expensehead.create_expense_head');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        // $request->validate([
        //     'expense_head_id' => 'required',
        //     'expense_sub_head_id' => 'required'
        // ]);

        $expensehead = new ExpenseHead();
        $expensehead->title  = $request->title;
        if (isAPIRequest()) {
            $expensehead->created_by  = $request->created_by;
        }else{
            $expensehead->created_by  = Auth::user()->id;
        }
        $expensehead->save();
        

        $data = new CommonResource($expensehead);

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
        $data['head'] = ExpenseHead::where('expensehead_id', $id)->first();
        return view('pages.expensehead.edit_expense_head', $data);
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



        $item = ExpenseHead::find($id);
        $item->title = $request->title;
        if (isAPIRequest()) {
            $item->updated_by = $request->updated_by;
        }else{
            $item->updated_by = Auth::user()->id;
        }

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


            $expense_head = ExpenseHead::find($id);
            $expense_head->status = 0;
            $expense_head->save();


        return response()->json(['success' => true, 'message' => 'Successfully Deleted'], 200);
        

    }
}