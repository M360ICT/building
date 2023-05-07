<?php

namespace App\Http\Controllers\MoneyReceipt;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Accounts\Accounts;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\FlatOwnerLedger\FlatOwnerLedger;
use App\Models\FlatOwnerTransaction\FlatOwnerTransaction;
use App\Models\MoneyReceipt\MoneyReceipt;
use App\Models\MoneyRecieptCheque;
use App\Models\RenteeTransaction\RenteeTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
      $data['accounts'] = Accounts::whereAccountHasDeleted('NO')->get();

      if (Auth::user()->type == 'ASSOCIATION') {
            $data['cheque'] = MoneyRecieptCheque::whereDataHasDeleted('NO')->where('specific_type','=','FLAT_OWNER')->get();
            return view('pages.chequemanagement.index_flat', $data);
      }else{
            $data['cheque'] = MoneyRecieptCheque::whereDataHasDeleted('NO')->where('specific_type', '=', 'RENTEE')->get();
            return view('pages.chequemanagement.index_rentee', $data);
      }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        

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



    public function assoRentee($moneyReceiptId, $account_id)
    {

      $moneyReceipt =  MoneyReceipt::where('id',$moneyReceiptId)->first();





        $moneyReceiptAmount = intval($moneyReceipt->money_receipt_total_amount) - intval($moneyReceipt->money_receipt_total_discount);
        # code...







   
            $transaction = new FlatOwnerTransaction();
            $transaction->transaction_type = 'CREDIT';
            $transaction->transaction_amount = $moneyReceipt->money_receipt_total_amount;
            $transaction->transaction_flat_owner_id = $moneyReceipt->money_receipt_flat_owner_id;
            $transaction->transaction_invoice_id = get_inv_id($moneyReceipt->money_receipt_invoice_no);
            $transaction->transaction_note = 'DEPOSITED';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $flat_owner_current_balance = get_flat_owner_current_balance_by_flat_owner_id($moneyReceipt->money_receipt_flat_owner_id);



            FlatOwnerTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $flat_owner_current_balance
            ]);



            $transaction = new RenteeTransaction;
            $transaction->transaction_type = 'CREDIT';
            $transaction->transaction_amount = $moneyReceipt->money_receipt_total_amount;
            $transaction->transaction_rentee_id = $moneyReceipt->money_receipt_flat_owner_id;
            $transaction->transaction_invoice_id = get_inv_id($moneyReceipt->money_receipt_invoice_no);
            $transaction->transaction_note = 'DEPOSITED';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $rentee_current_balance = get_rentee_current_balance_by_rentee_id($moneyReceipt->money_receipt_flat_owner_id);
            RenteeTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $rentee_current_balance
            ]);




            $flat_owner = \App\Models\Rentee\Rentee::where('user_id', '=', $moneyReceipt->money_receipt_flat_owner_id)
                ->join('flats', 'flats.id', '=', 'rentee.flat_id')
                ->get();

            //        print_r($flat_owner[0]->owner_id);die;

            $accTransaction = new \App\Models\FlatOwnerAccountTransactions;
            $accTransaction->transaction_type = "CREDIT";
            //        $accTransaction->transaction_account_id = $request->money_receipt_account_id;
            $accTransaction->flat_owner_id = $flat_owner[0]->owner_id;
            $accTransaction->rentee_id = $moneyReceipt->money_receipt_total_amount;
            $accTransaction->transaction_amount = $moneyReceiptAmount;
            $accTransaction->transaction_date = $moneyReceipt->money_receipt_payment_date;
            $accTransaction->save();



            $account_tansaction_id = $accTransaction->id;

            //        print_r($accTransaction);

            \App\Models\FlatOwnerAccountTransactions::find($account_tansaction_id)->update([
                'transaction_last_balance' => get_acoount_current_balance_by_account_id($account_id)
            ]);

            $ledger = new \App\Models\RenteeLedger\RenteeLedger();
            $ledger->rentee_id = $moneyReceipt->money_receipt_flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = get_inv_id($moneyReceipt->money_receipt_invoice_no);
            $ledger->ledger_type = 'DEPOSIT';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_rentee_current_balance_by_rentee_id($moneyReceipt->money_receipt_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_dr = $moneyReceipt->money_receipt_total_amount;
            $ledger->ledger_prepared_by = Auth::user();

            $ledger->save();

            MoneyReceipt::where('id', $moneyReceiptId)->update([
                'money_receipt_payment_status' => 'SUCCESS'
            ]);






        MoneyRecieptCheque::where('money_reciept_id', $moneyReceiptId)->update([
            'money_reciept_status' => 'SUCCESS'
        ]);


        
    
        $data = new CommonResource($transaction);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    public function extraFunctAssoFlat($moneyReceiptId, $account_id)
    {

        $moneyReceipt =  MoneyReceipt::where('id', $moneyReceiptId)->first();





        $moneyReceiptAmount = intval($moneyReceipt->money_receipt_total_amount) - intval($moneyReceipt->money_receipt_total_discount);
  
            $transaction = new FlatOwnerTransaction();
            $transaction->transaction_type = 'CREDIT';
            $transaction->transaction_amount = $moneyReceipt->money_receipt_total_amount;
            $transaction->transaction_flat_owner_id = $moneyReceipt->money_receipt_flat_owner_id;
            $transaction->transaction_invoice_id = get_inv_id($moneyReceipt->money_receipt_invoice_no);
            $transaction->transaction_note = 'WITHDRAW';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $flat_owner_current_balance = get_flat_owner_current_balance_by_flat_owner_id($moneyReceipt->money_receipt_flat_owner_id);



            FlatOwnerTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $flat_owner_current_balance
            ]);

            $accTransaction = new AccountTransaction();
            $accTransaction->transaction_type = "CREDIT";
            $accTransaction->transaction_account_id = $account_id;
            $accTransaction->transaction_flat_owner_id = $moneyReceipt->money_receipt_flat_owner_id;
            $accTransaction->transaction_amount = $moneyReceipt->money_receipt_total_amount;
            $accTransaction->transaction_date = $moneyReceipt->money_receipt_payment_date;
            $accTransaction->transaction_create_date = date("Y-m-d");
            $accTransaction->save();



            $account_tansaction_id = $accTransaction->id;

            //        print_r($account_tansaction_id);

            AccountTransaction::find($account_tansaction_id)->update([
                'transaction_last_balance' => get_acoount_current_balance_by_account_id($account_id)
            ]);




            $ledger = new FlatOwnerLedger();
            $ledger->flat_owner_id = $moneyReceipt->money_receipt_flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = get_inv_id($moneyReceipt->money_receipt_invoice_no);
            $ledger->ledger_type = 'MONEY_RECEIPT WITHDRAWAL';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_flat_owner_current_balance_by_flat_owner_id($moneyReceipt->money_receipt_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_cr = $moneyReceipt->money_receipt_total_amount;
            $ledger->ledger_prepared_by = Auth::user()->id;
            $ledger->save();


            MoneyReceipt::where('id', $moneyReceiptId)->update([
                'money_receipt_payment_status' => 'SUCCESS'
            ]);


            MoneyRecieptCheque::where('money_reciept_id', $moneyReceiptId)->update([
            'money_reciept_status' => 'SUCCESS'
            ]);
        







        $data = new CommonResource($transaction);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}
