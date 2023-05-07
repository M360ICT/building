<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\Configuration\Employee;
use App\Models\Configuration\PayrollExpense;
use App\Models\Employee\EmployeeLadeger;
use App\Models\Employee\EmployeeTransaction;
use App\Models\Payroll\Payroll;
use Illuminate\Http\Request;        
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['item'] = CommonResource::collection(Payroll::wherePayrollHasDeleted('NO')->get());

        if (isAPIRequest()) {
            $data['item'] = CommonResource::collection(Payroll::wherePayrollHasDeleted('NO')->join('employees', 'employees.id', '=', 'payrolls.payroll_employee_id')->get());

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['item']], 200);
        } else {

            return view('pages.payroll.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['items'] = PayrollExpense::all();
        return view('pages.payroll.create',$data);
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
        //     'flat_owner_id' => 'required',
        //     // 'invoice_no' => 'required'
        // ]);

        if ($request->created_by) {
            $created_by =  $request->created_by;
        } else {
            $created_by = Auth::id();
        }

        $payroll = new Payroll();
        $payroll->payroll_employee_id = $request->payroll_employee_id;
        $payroll->payroll_account_method = $request->payroll_account_method;
        $payroll->payroll_account_id     = $request->payroll_account_id;

        $payroll->salary       = $request->salary;
        $payroll->deduction       = $request->deduction;
        $payroll->deduction_reason       = $request->deduction_reason;
        $payroll->mobile_bill       = $request->mobile_bill;
        $payroll->food_bill       = $request->food_bill;
        $payroll->bonus       = $request->bonus;
        $payroll->commision       = $request->commision;
        $payroll->festifal_bonus       = $request->festifal_bonus;
        $payroll->TA       = $request->TA;


        $without_deduction = $request->salary + $request->mobile_bill + $request->mobile_bill + $request->food_bill + $request->bonus + $request->commision + $request->TA;
        $deduction = $request->deduction;
        $subtotal = $without_deduction - $deduction;



        $payroll->payroll_date       = $request->payroll_date;
        $payroll->payroll_note       = $request->payroll_note;
        $payroll->payroll_subtotal       = $subtotal;

        $payroll->save();




        $transaction = new EmployeeTransaction();
        $transaction->transaction_type = 'DEBIT';
        $transaction->transaction_account_id = $payroll->id;
        $transaction->transaction_amount = $subtotal;
        $transaction->transaction_employee_id = $request->payroll_employee_id;
        $transaction->transaction_note = 'Payroll';
        $transaction->transaction_date = date('Y-m-d');
        $transaction->save();

        $employee_current_balance = get_employee_current_balance_by_employee_id($request->payroll_employee_id);



         EmployeeTransaction::find($transaction->id)->update([
            'transaction_last_balance' => $employee_current_balance
        ]);




        $transaction = new AccountTransaction();
        $transaction->transaction_type = 'DEBIT';
        $transaction->transaction_account_id = $request->payroll_account_id;
        $transaction->transaction_amount = $subtotal;
        $transaction->transaction_employee_id = $request->payroll_employee_id;
        $transaction->transaction_date = date('Y-m-d');
        $transaction->transaction_for ='PAYROLL';
        $transaction->save();
        $account_current_balance = get_acoount_current_balance_only_by_account_id($request->payroll_account_id);
        $update_client_transection = AccountTransaction::find($transaction->id)->update([
            'transaction_last_balance' => $account_current_balance
        ]);


  

        $ledger = new EmployeeLadeger();
        $ledger->employee_id = $request->payroll_employee_id;
        $ledger->employee_transaction_id = $transaction->id;
        $ledger->employee_ledger_type = 'Payroll';
        $ledger->employee_ledger_status = true;
        $ledger->employee_ledger_last_balance = get_employee_current_balance_by_employee_id($request->payroll_employee_id);
        $ledger->employee_ledger_date = date("Y-m-d");
        $ledger->employee_ledger_create_date  = date("Y-m-d");
        $ledger->employee_ledger_cr = $subtotal;
        $ledger->employee_ledger_prepared_by = $created_by;

        $ledger->save();


        $data = new CommonResource($payroll);
        

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

        $data['data'] = Payroll::where('id',$id)->first();
        return view('pages.payroll.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['data'] = Payroll::where('id', $id)->first();
        $data['pr'] = EmployeeTransaction::where('transaction_account_id', $data['data']->id)->first();
        $data['items'] = PayrollExpense::all();

        // echo '<pre>';

        // print_r($data['pr']);die;
        return view('pages.payroll.edit', $data);
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


        if ($request->created_by) {
            $created_by =  $request->created_by;
        } else {
            $created_by = Auth::id();
        }



        $item = Payroll::find($id);
        $item->payroll_employee_id = $request->payroll_employee_id;
        $item->payroll_account_method = $request->payroll_account_method;
        $item->payroll_account_id     = $request->payroll_account_id;
        $item->salary       = $request->salary;
        $item->deduction       = $request->deduction;
        $item->deduction_reason       = $request->deduction_reason;
        $item->mobile_bill       = $request->mobile_bill;
        $item->food_bill       = $request->food_bill;
        $item->bonus       = $request->bonus;
        $item->commision       = $request->commision;
        $item->festifal_bonus       = $request->festifal_bonus;
        $item->TA       = $request->TA;
        $without_deduction = $request->salary + $request->mobile_bill + $request->mobile_bill + $request->food_bill + $request->bonus + $request->commision + $request->TA;
        $deduction = $request->deduction;
        $subtotal = $without_deduction - $deduction;
        $item->payroll_date       = $request->payroll_date;
        $item->payroll_note       = $request->payroll_note;
        $item->payroll_subtotal       = $subtotal;
        $item->save();



        $transaction = EmployeeTransaction::where('transaction_account_id',$request->payroll_transaction_id )->update([
            'transaction_type' => 'DEBIT',
            'transaction_amount' => $subtotal,
            'transaction_employee_id' => $request->payroll_employee_id,
            'transaction_note' => 'Payroll Update',
            'transaction_date' => date('Y-m-d'),
        ]);


        
        $employee_current_balance = get_employee_current_balance_by_employee_id($request->payroll_employee_id);



        EmployeeTransaction::where('transaction_account_id',$request->payroll_transaction_id)->update([
            'transaction_last_balance' => $employee_current_balance
        ]);

        $transaction = new AccountTransaction();
        $transaction->transaction_type = 'DEBIT';
        $transaction->transaction_account_id = $request->payroll_account_id;
        $transaction->transaction_amount = $subtotal;
        $transaction->transaction_employee_id = $request->payroll_employee_id;
        $transaction->transaction_date = date('Y-m-d');
        $transaction->transaction_for = 'PAYROLL';
        $transaction->save();
        $account_current_balance = get_acoount_current_balance_only_by_account_id($request->payroll_account_id);
        $update_client_transection = AccountTransaction::find($transaction->id)->update([
            'transaction_last_balance' => $account_current_balance
        ]);


        $ledger = new EmployeeLadeger();
        $ledger->employee_id = $request->payroll_employee_id;
        $ledger->employee_transaction_id = $request->payroll_transaction_id;
        $ledger->employee_ledger_type = 'Payroll Updated';
        $ledger->employee_ledger_status = true;
        $ledger->employee_ledger_last_balance = get_employee_current_balance_by_employee_id($request->payroll_employee_id);
        $ledger->employee_ledger_date = date("Y-m-d");
        $ledger->employee_ledger_create_date  = date("Y-m-d");
        $ledger->employee_ledger_cr = $subtotal;
        $ledger->employee_ledger_prepared_by = $created_by;
        $ledger->save();



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
        $item = Payroll::find($id);
        $item->payroll_has_deleted = 'YES';
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }



    public function getAccountCurrentBalance($accountID)
    {
        $credit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);
        //if ($currentBalance < 0)
        //{
        //   $status = "Due";
        //}else if($currentBalance > 0){
        // $status = "Advance";   
        //}else if($currentBalance == 0){
        //   $status = "Balance";    
        //}


        //return $currentBalance;
        //];
        return $currentBalance;
        ////    return 1;
        //
    }



    public function testSms(Request $request)
    {
        //http: //36.255.69.155/api/v2/SendSMS


        $otpget = rand(100000, 999999);


        $employee = DB::table('testsms')->insert([
            'otp' => $otpget,
            'otp_number' => $request->otp_number,
            'otp_full_msg' => 'Your Otp For Quiz360 is'.' '. $otpget,

        ]);

        return response()->json([
            'employee' => $employee
        ]);
        // $employee->employee_name = $request->employee_name;
        // $employee->employee_email = $request->employee_email;
        // $employee->employee_phone = $request->employee_phone;
        // $employee->employee_role = $request->employee_role;
        // $employee->employee_password = Hash::make($request->employee_password);
        // $employee->save();
        // return $request->all();
        
    }

}
