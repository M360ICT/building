<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountTransactionsResource;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseResource;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\Expense\Expense;
use App\Models\ExpenseHead\ExpenseHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expense'] = CommonResource::collection(Expense::where('is_deleted','NO')
        ->join('expense_heads', 'expense_heads.expensehead_id','=', 'expenses.expense_head_id')
        ->join('expense_sub_heads', 'expense_sub_heads.expense_sub_head_id','=', 'expenses.expense_sub_head_id')
        ->join('accounts', 'accounts.id','=', 'expenses.expense_account')
        ->get());


        if (isAPIRequest()) {

            $expen = Expense::where('is_deleted', 'NO')
                ->join('expense_heads', 'expense_heads.expensehead_id', '=', 'expenses.expense_head_id')
                ->join('expense_sub_heads', 'expense_sub_heads.expense_sub_head_id', '=', 'expenses.expense_sub_head_id')
                ->join('accounts', 'accounts.id', '=', 'expenses.expense_account')
                ->get();
            unset($expen['expense_id']); 



            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $expen], 200);
        } else {

            return view('pages.expenses.list_expenses',$data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['head'] = ExpenseHead::where('status',1)->get();
        return view('pages.expenses.create_expenses',$data);
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
            'expense_head_id' => 'required',
            'expense_sub_head_id' => 'required'
        ]);

        $expense = new Expense();
        $expense->expense_head_id = $request->expense_head_id;
        $expense->expense_sub_head_id = $request->expense_sub_head_id;
        $expense->expense_account = $request->expense_account;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_date = $request->expense_date;
        $expense->created_by = $request->created_by;
        $expense->status = 1;
        $expense->save();


        $transaction = new AccountTransaction();
        $transaction->transaction_type = 'DEBIT';
        $transaction->transaction_account_id = $request->expense_account;
        $transaction->transaction_amount = $request->expense_amount;
        $transaction->transaction_date = date('Y-m-d');
        $transaction->transaction_for = 'EXPENSE';
        $transaction->save();
        $account_current_balance = get_acoount_current_balance_only_by_account_id($request->expense_account);
        $update_client_transection = AccountTransaction::find($transaction->id)->update([
            'transaction_last_balance' => $account_current_balance
        ]);


        $data = new CommonResource($expense);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}