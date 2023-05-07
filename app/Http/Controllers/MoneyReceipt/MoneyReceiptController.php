<?php

namespace App\Http\Controllers\MoneyReceipt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MoneyReceipt\MoneyReceipt;
use App\Models\FlatOwnerLedger\FlatOwnerLedger;
use App\Models\FlatOwnerTransaction\FlatOwnerTransaction;
use App\Models\AccountTransaction\AccountTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice\InvoicePosSale;
use App\Http\Resources\CommonResource;
use App\Models\MoneyRecieptCheque;
use App\Models\RenteeTransaction\RenteeTransaction;
use Illuminate\Support\Facades\DB;

class MoneyReceiptController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_type = Auth::user()->type;
        $user_id = Auth::user()->id;
        if ($user_type == "FLAT_OWNER") {
            $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
                ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
                ->where('money_receipt.money_receipt_flat_owner_id', '=', $user_id)
                ->get();
        } else if ($user_type == "RENTEE") {
            $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
                ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
                ->where('money_receipt.money_receipt_rentee_id', '=', $user_id)
                ->get();
        } else if ($user_type == "ASSOCIATION") {
            $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
                ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
                ->whereNull('money_receipt.money_receipt_rentee_id')
                ->get();
        }
        $data['items'] = CommonResource::collection($list);

        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.money_receipt.list_money_receipt', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user_type == "FLAT_OWNER") {
            $data['voucherNo'] = MoneyReceipt::generate_vouchar_no();
            //        print_r($data['voucherNo']);
            //        die;
            return view('pages.money_receipt.create_flat_owner_money_receipt', $data);
        } else {
            $data['voucherNo'] = MoneyReceipt::generate_vouchar_no();
            //        print_r($data['voucherNo']);
            //        die;
            return view('pages.money_receipt.create_money_receipt', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate = ([
            'money_receipt_invoice_no' => 'required',
            // 'money_receipt_account_id' => 'required',
            'money_receipt_amount' => 'required',
            'money_receipt_date' => 'required'
        ]);




        if ($request->created_by) {
            $created_by =  $request->created_by;
        } else {
            $created_by = Auth::user()->id;
        }

        $moneyReceiptAmount = intval($request->money_receipt_amount) - intval($request->money_receipt_discount);

        if ($request->payment_method == 'bank') {
            # code...

            if ($request->type == "RENTEE") {
                $transaction = new RenteeTransaction;
                $transaction->transaction_type = 'CREDIT';
                $transaction->transaction_amount = $moneyReceiptAmount;
                $transaction->transaction_rentee_id = $request->hidden_flat_owner_id;
                $transaction->transaction_invoice_id = $request->invoice_id;
                $transaction->transaction_note = 'MONEY_RECEIPT';
                $transaction->transaction_date = date('Y-m-d');
                $transaction->save();

                $rentee_current_balance = get_rentee_current_balance_by_rentee_id($request->hidden_flat_owner_id);






                RenteeTransaction::find($transaction->id)->update([
                    'transaction_last_balance' => $rentee_current_balance
                ]);

                $flat_owner = \App\Models\Rentee\Rentee::where('user_id', '=', $request->hidden_flat_owner_id)
                    ->join('flats', 'flats.id', '=', 'rentee.flat_id')
                    ->get();

                //        print_r($flat_owner[0]->owner_id);die;

                $accTransaction = new \App\Models\FlatOwnerAccountTransactions;
                $accTransaction->transaction_type = "CREDIT";
                //        $accTransaction->transaction_account_id = $request->money_receipt_account_id;
                $accTransaction->flat_owner_id = $flat_owner[0]->owner_id;
                $accTransaction->rentee_id = $request->hidden_flat_owner_id;
                $accTransaction->transaction_amount = $moneyReceiptAmount;
                $accTransaction->transaction_date = $request->money_receipt_date;
                $accTransaction->save();



                $account_tansaction_id = $accTransaction->id;

                //        print_r($accTransaction);

                \App\Models\FlatOwnerAccountTransactions::find($account_tansaction_id)->update([
                    'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_receipt_account_id)
                ]);

                $ledger = new \App\Models\RenteeLedger\RenteeLedger();
                $ledger->rentee_id = $request->hidden_flat_owner_id;
                $ledger->ledger_transaction_id = $transaction->id;
                $ledger->ledger_invoice_id = $request->invoice_id;
                $ledger->ledger_type = 'SALE';
                $ledger->ledger_status = true;
                $ledger->ledger_last_balance = get_rentee_current_balance_by_rentee_id($request->hidden_flat_owner_id);
                $ledger->ledger_date = date("Y-m-d");
                $ledger->ledger_create_date = date("Y-m-d");
                $ledger->ledger_dr = $request->grand_total;
                $ledger->ledger_prepared_by = $created_by;

                $ledger->save();
            } else {

                $transaction = new FlatOwnerTransaction;
                $transaction->transaction_type = 'CREDIT';
                $transaction->transaction_amount = $moneyReceiptAmount;
                $transaction->transaction_flat_owner_id = $request->hidden_flat_owner_id;
                $transaction->transaction_invoice_id = $request->invoice_id;
                //        $transaction->transaction_money_receipt_id = $request->transaction_money_receipt_id;
                $transaction->transaction_note = 'INVOICE_SELL';
                $transaction->transaction_date = date('Y-m-d');
                $transaction->save();

                $flat_owner_current_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);



                FlatOwnerTransaction::find($transaction->id)->update([
                    'transaction_last_balance' => $flat_owner_current_balance
                ]);

                $accTransaction = new AccountTransaction;
                $accTransaction->transaction_type = "CREDIT";
                $accTransaction->transaction_account_id = $request->money_receipt_account_id;
                $accTransaction->transaction_flat_owner_id = $request->hidden_flat_owner_id;
                $accTransaction->transaction_amount = $moneyReceiptAmount;
                $accTransaction->transaction_date = $request->money_receipt_date;
                $accTransaction->transaction_create_date = date("Y-m-d");
                $accTransaction->save();



                $account_tansaction_id = $accTransaction->id;

                //        print_r($account_tansaction_id);

                AccountTransaction::find($account_tansaction_id)->update([
                    'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_receipt_account_id)
                ]);
            }
        }



        $moneyReceipt = new MoneyReceipt;
        $moneyReceipt->money_receipt_voucher_no = $request->money_receipt_voucher_no;
        $moneyReceipt->money_receipt_invoice_no = $request->money_receipt_invoice_no;
        if ($request->type == "RENTEE") {
            $flat_owner = \App\Models\Rentee\Rentee::where('rentee.user_id', '=', $request->hidden_flat_owner_id)
                ->join('flats', 'flats.id', '=', 'rentee.flat_id')
                ->get();
            $moneyReceipt->money_receipt_flat_owner_id = $flat_owner[0]->owner_id;
            $moneyReceipt->money_receipt_rentee_id = $request->hidden_flat_owner_id;
            $moneyReceipt->money_receipt_payment_to = "RENTEE";
        } else {
            $moneyReceipt->money_receipt_flat_owner_id = $request->hidden_flat_owner_id;
            $moneyReceipt->money_receipt_payment_to = "FLAT_OWNER";
        }
        $moneyReceipt->money_receipt_total_amount = $moneyReceiptAmount;
        $moneyReceipt->money_receipt_total_discount = $request->money_receipt_discount;
        $moneyReceipt->money_receipt_payment_type = "FLAT_OWNER_PAYMENT";
        $moneyReceipt->money_receipt_payment_date = $request->money_receipt_date;
        $moneyReceipt->money_receipt_note = $request->money_receipt_note;
        $moneyReceipt->money_receipt_payment_status = 1;
        if ($request->payment_method == 'bank') {
            $moneyReceipt->money_receipt_flat_owner_transaction_id = $transaction->id;
            $moneyReceipt->money_receipt_account_transaction_id = $account_tansaction_id;
        }
        if ($request->payment_method == 'cheque') {
            $moneyReceipt->money_receipt_payment_status = 'PENDING';
        }

        $moneyReceipt->money_receipt_created_by = $created_by;
        $moneyReceipt->save();

        if ($request->payment_method == 'cheque') {

            $cheque = new MoneyRecieptCheque();
            $cheque->money_reciept_id = $moneyReceipt->id;
            $cheque->invoice_id = $request->invoice_id;
            $cheque->cheque_no = $request->cheque_number;
            $cheque->withdraw_date = $request->withdraw_date;
            $cheque->flat_owner_id = $request->hidden_flat_owner_id;
            $cheque->rentee_id = $request->hidden_flat_owner_id;

            if (isAPIRequest()) {
                $user_type = $request->user_type;
            } else {
                $user_type = Auth::user()->type;
            }



            if ($user_type == 'ASSOCIATION') {
                $cheque->specific_type = 'FLAT_OWNER';
            } else {
                $cheque->specific_type = 'RENTEE';
            }

            $cheque->account_id = $request->money_receipt_account_id;
            $cheque->save();
        }


        if ($request->payment_method == 'bank') {

            $ledger = new FlatOwnerLedger();
            $ledger->flat_owner_id = $request->hidden_flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = $request->invoice_id;
            $ledger->ledger_type = 'MONEY_RECEIPT';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_cr = $moneyReceiptAmount;
            $ledger->ledger_prepared_by = $created_by;

            $ledger->save();

            $checkhasrequest = \App\Models\Payment\PaymentRequest::whereInvoiceId($request->invoice_id)->get();
            if ($checkhasrequest) {
                \App\Models\Payment\PaymentRequest::whereInvoiceId($request->invoice_id)->update(['verification_status' => 'Approved']);
            }
        }
        $data = new CommonResource($moneyReceipt);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $invoiceData['MoneyReceiptData'] = MoneyReceipt::whereMoneyReceiptId($id)->get()[0];
        $invoiceData['invoiceData'] = InvoicePosSale::whereInvoiceNo($invoiceData['MoneyReceiptData']->money_receipt_invoice_no)->get()[0];

        //      echo "<pre>";  print_r($invoiceData); die;

        return view('pages.money_receipt.view_money_receipt', $invoiceData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoiceData['invoiceData'] = InvoicePosSale::whereInvoiceNo($id)
            ->join('clients', 'invoice_pos_sales.client_id', '=', 'clients.client_id')
            ->get()[0];

        $invoiceData['moneyReceiptData'] = MoneyReceipt::whereMoneyReceiptInvoiceNo($id)->get()[0];

        //        print_r($invoiceData['moneyReceiptData']); 

        return view('pages.money_receipt.edit_money_receipt', $invoiceData);
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


        $data = [
            'money_receipt_invoice_no' => 'required',
            'money_receipt_account_id' => 'required',
            'money_receipt_amount' => 'required',
            'money_receipt_date' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);


        if (!$validator->fails()) {

            $moneyReceipt = MoneyReceipt::where("money_receipt_id", $request->money_receipt_id)->get();

            $sale = \App\Models\Invoice\InvoicePosSale::where('invoice_no', '=', $moneyReceipt[0]->money_receipt_invoice_no)->get();
            if ($request->money_receipt_amount > $request->money_receipt_old_amount) {
                $difference = $request->money_receipt_amount - $request->money_receipt_old_amount;
                $total_paying = $sale[0]->total_paid - $difference;
            } else if ($request->money_receipt_old_amount < $request->money_receipt_amount) {
                $difference = $request->money_receipt_amount - $request->money_receipt_old_amount;
                $total_paying = $sale[0]->total_paid + $difference;
            }

            //                           print_r($total_paying);die;
            $update_pos_sale = \App\Models\Invoice\InvoicePosSale::where('invoice_no', '=', $moneyReceipt[0]->money_receipt_invoice_no)->update([
                'total_paid' => $total_paying
            ]);

            $is_api_request = $request->route()->getPrefix() === 'api';
            if ($is_api_request) {
                $moneyReceiptAmount = intval($request->money_receipt_amount) - intval($request->money_receipt_discount);



                $clientTransaction = [
                    'client_transaction_type' => 'CREDIT',
                    'client_transaction_client_id' => $request->money_receipt_client_id,
                    'client_transaction_account_id' => $request->money_receipt_account_id,
                    'client_transaction_amount' => $request->money_receipt_amount,
                    'client_transaction_date' => $request->money_receipt_date,
                    'client_transaction_create_date' => date("Y-m-d")
                ];

                $clientTransactionData = ClientTransaction::where('client_transaction_id', $request->money_receipt_client_transaction_id)->update($clientTransaction);

                //                        $client_tansaction_id = $clientTransactionData->client_transaction_id;

                $update_client_transection = ClientTransaction::find($request->money_receipt_client_transaction_id)->update([
                    'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->money_receipt_client_id)
                ]);

                $accountTransaction = [
                    'transaction_type' => "CREDIT",
                    'transaction_account_id' => $request->money_receipt_account_id,
                    'transaction_client_id' => $request->money_receipt_client_id,
                    'transaction_amount' => $moneyReceiptAmount,
                    'transaction_date' => $request->money_receipt_date,
                    'transaction_create_date' => date("Y-m-d")
                ];

                $accountTransactionData = AccountTransaction::where('transaction_id', $request->money_receipt_account_transaction_id)->update($accountTransaction);

                //            $account_tansaction_id = $accountTransactionData->transaction_id;

                $update_account_transection = AccountTransaction::find($request->money_receipt_account_transaction_id)->update([
                    'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_receipt_account_id)
                ]);

                $moneyReciept = [
                    'money_receipt_voucher_no' => $request->money_receipt_voucher_no,
                    'money_receipt_invoice_no' => $request->money_receipt_invoice_no,
                    'money_receipt_client_id' => $request->money_receipt_client_id,
                    'money_receipt_payment_to' => "CLIENT",
                    'money_receipt_total_amount' => $moneyReceiptAmount,
                    'money_receipt_total_discount' => $request->money_receipt_discount,
                    'money_receipt_payment_type' => "CLIENT_PAYMENT",
                    'money_receipt_payment_date' => $request->money_receipt_date,
                    'money_receipt_note' => $request->money_receipt_note,
                    'money_receipt_payment_status' => 1,
                    'money_receipt_client_transaction_id' => $request->money_receipt_client_transaction_id,
                    'money_receipt_account_transaction_id' => $request->money_receipt_account_transaction_id,
                    'money_receipt_created_by' => \Illuminate\Support\Facades\Auth::user()->id
                ];

                $moneyRecieptData = MoneyReceipt::where('money_receipt_id', $request->money_receipt_id)->update($moneyReciept);

                $clientLedger = [
                    'client_id' => $request->money_receipt_client_id,
                    'client_transaction_id' => $request->money_receipt_client_transaction_id,
                    'client_ledger_type' => 'CLIENT_PAYMENT_UPDATE',
                    'client_ledger_status' => true,
                    'client_ledger_money_receipt_id' => $request->money_receipt_id,
                    'client_ledger_last_balance' => get_client_current_balance_by_client_id($request->money_receipt_client_id),
                    'client_ledger_date' => $request->money_receipt_date,
                    'client_ledger_create_date' => date("Y-m-d"),
                    'client_ledger_prepared_by' => Auth::user()->id,
                    'client_ledger_cr' => $request->money_receipt_amount
                ];

                $clientLedgerData = \App\Models\ClientLedger\ClientLedger::create($clientLedger);

                return new \App\Http\Resources\MoneyReceipt\MoneyReceiptResource($moneyRecieptData);
                //             $data = ['status' => 'okay', 'data' => $moneyRecieptData->money_receipt_id];
                //            return $data;

            } else {

                $moneyReceiptAmount = intval($request->money_receipt_amount) - intval($request->money_receipt_discount);
                //echo $moneyReceiptAmount;
                $clientTransaction = [
                    'client_transaction_type' => 'CREDIT',
                    'client_transaction_client_id' => $request->money_receipt_client_id,
                    'client_transaction_account_id' => $request->money_receipt_account_id,
                    'client_transaction_amount' => $request->money_receipt_amount,
                    'client_transaction_date' => $request->money_receipt_date,
                    'client_transaction_create_date' => date("Y-m-d")
                ];

                $clientTransactionData = ClientTransaction::where('client_transaction_id', $request->money_receipt_client_transaction_id)->update($clientTransaction);

                //            $client_tansaction_id = $clientTransactionData->client_transaction_id;

                $update_client_transection = ClientTransaction::find($request->money_receipt_client_transaction_id)->update([
                    'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->money_receipt_client_id)
                ]);

                $accountTransaction = [
                    'transaction_type' => "CREDIT",
                    'transaction_account_id' => $request->money_receipt_account_id,
                    'transaction_client_id' => $request->money_receipt_client_id,
                    'transaction_amount' => $moneyReceiptAmount,
                    'transaction_date' => $request->money_receipt_date,
                    'transaction_create_date' => date("Y-m-d")
                ];

                $accountTransactionData = AccountTransaction::where('transaction_id', $request->money_receipt_account_transaction_id)->update($accountTransaction);

                //            $account_tansaction_id = $accountTransactionData->transaction_id;

                $update_account_transection = AccountTransaction::find($request->money_receipt_account_transaction_id)->update([
                    'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_receipt_account_id)
                ]);

                $moneyReciept = [
                    'money_receipt_voucher_no' => $request->money_receipt_voucher_no,
                    'money_receipt_invoice_no' => $request->money_receipt_invoice_no,
                    'money_receipt_client_id' => $request->money_receipt_client_id,
                    'money_receipt_payment_to' => "CLIENT",
                    'money_receipt_total_amount' => $moneyReceiptAmount,
                    'money_receipt_total_discount' => $request->money_receipt_discount,
                    'money_receipt_payment_type' => "CLIENT_PAYMENT",
                    'money_receipt_payment_date' => $request->money_receipt_date,
                    'money_receipt_note' => $request->money_receipt_note,
                    'money_receipt_payment_status' => 1,
                    'money_receipt_client_transaction_id' => $request->money_receipt_client_transaction_id,
                    'money_receipt_account_transaction_id' => $request->money_receipt_account_transaction_id,
                    'money_receipt_created_by' => \Illuminate\Support\Facades\Auth::user()->id
                ];

                $moneyRecieptData = MoneyReceipt::where('money_receipt_id', $request->money_receipt_id)->update($moneyReciept);

                $clientLedger = [
                    'client_id' => $request->money_receipt_client_id,
                    'client_transaction_id' => $request->money_receipt_client_transaction_id,
                    'client_ledger_type' => 'CLIENT_PAYMENT_UPDATE',
                    'client_ledger_status' => true,
                    'client_ledger_money_receipt_id' => $request->money_receipt_id,
                    'client_ledger_last_balance' => get_client_current_balance_by_client_id($request->money_receipt_client_id),
                    'client_ledger_date' => $request->money_receipt_date,
                    'client_ledger_create_date' => date("Y-m-d"),
                    'client_ledger_prepared_by' => Auth::user()->id,
                    'client_ledger_cr' => $request->money_receipt_amount
                ];

                $clientLedgerData = \App\Models\ClientLedger\ClientLedger::create($clientLedger);

                $data = ['status' => 'okay', 'moneyReceiptId' => $request->money_receipt_id];
                return $data;
            }
        } else {
            return ['errors' => $validator->errors()->first()];
        }

        //            $request->validate([
        //            'money_receipt_invoice_no' => 'required',
        //            'money_receipt_account_id' => 'required',
        //            'money_receipt_amount' => 'required',
        //            'money_receipt_date' => 'required',
        //        ]);
        //
        //        $moneyReceiptAmount = intval($request->money_receipt_amount) - intval($request->money_receipt_discount);
        //            
        //            $moneyReciept = MoneyReciept::find($id);




        //            $moneyReciept->money_receipt_voucher_no = $request->money_receipt_voucher_no;
        //            $moneyReciept->money_receipt_invoice_no = $request->money_receipt_invoice_no;
        //            $moneyReciept->money_receipt_client_id = $request->money_receipt_client_id;
        //            $moneyReciept->money_receipt_payment_to = "CLIENT";
        //            $moneyReciept->money_receipt_total_amount = $request->money_receipt_amount;
        //            $moneyReciept->money_receipt_total_discount = $request->money_receipt_discount;
        //            $moneyReciept->money_receipt_payment_type = "CLIENT_PAYMENT";
        //            $moneyReciept->money_receipt_payment_date = $request->money_receipt_date;
        //            $moneyReciept->money_receipt_note = $request->money_receipt_note;
        //            $moneyReciept->money_receipt_payment_status = 1;
        //            $moneyReciept->money_receipt_created_by = \Illuminate\Support\Facades\Auth::user()->id;

        //            ClientTransaction::whereClientTransactionId($request->money_receipt_client_transaction_id)->update([
        //            
        //            "client_transaction_type" =>"CREDIT",
        //            "client_transaction_client_id"=>$request->money_receipt_client_id,
        //            "client_transaction_amount"=>$request->money_receipt_amount,
        //            "client_transaction_date"=>$request->money_receipt_date,
        ////            "client_transaction_update_date"=>date("Y-m-d")
        //        ]);

        //             $client_transaction = ClientTransaction::find($request->money_receipt_client_transaction_id);
        //      
        //            $client_transaction->client_transaction_type = 'CREDIT';
        //      
        //        
        //        $client_transaction->client_transaction_client_id = $request->money_receipt_client_id;
        //        $client_transaction->client_transaction_amount = $request->money_receipt_amount;
        //        $client_transaction->client_transaction_date = $request->money_receipt_date;
        //        $client_transaction->client_transaction_create_date = date("Y-m-d");
        //        $client_transaction->save();



        //        $client_tansaction_id = $client_transaction->client_transaction_id ;



        //        $update_client_transection = ClientTransaction::find($request->money_receipt_client_transaction_id)->update([
        //            'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->money_receipt_client_id)
        //        ]);
        //        
        //        AccountTrasection::find($request->money_receipt_account_transaction_id)->update([
        //            
        //            "transaction_type" =>"CREDIT",
        //            "transaction_account_id"=>$request->money_receipt_account_id,
        //            "transaction_client_id"=>$request->money_receipt_client_id,
        //            "client_transaction_amount"=>$moneyReceiptAmount,
        //            "client_transaction_date"=>$request->money_receipt_date,
        ////            "client_transaction_update_date"=>date("Y-m-d")
        //        ]);



        //        $accountTransaction = AccountTrasection::find($request->money_receipt_account_transaction_id);
        //        
        //        $accountTransaction->transaction_type = "CREDIT";
        //        $accountTransaction->transaction_account_id = $request->money_receipt_account_id;
        //        $accountTransaction->transaction_client_id = $request->money_receipt_client_id;
        //        $accountTransaction->transaction_amount = $request->money_receipt_amount;
        //        $accountTransaction->transaction_date = $request->money_receipt_date;
        //        $accountTransaction->transaction_create_date = date("Y-m-d");
        //        
        //        $accountTransaction->save();
        //        
        //        $account_tansaction_id = $accountTransaction->transaction_id  ;

        // print_r($account_tansaction_id);

        //         $update_account_transection = AccountTrasection::find($request->money_receipt_account_transaction_id)->update([
        //            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_receipt_account_id)
        //        ]);

        //          MoneyReciept::whereMoneyRecieptId($id)->update([
        //            'money_receipt_voucher_no' => $request->money_receipt_voucher_no,
        //            'money_receipt_invoice_no' => $request->money_receipt_invoice_no,
        //            'money_receipt_client_id' => $request->money_receipt_client_id,
        //            'money_receipt_payment_to' =>  "CLIENT",
        //            'money_receipt_total_amount' => $moneyReceiptAmount,
        //            'money_receipt_total_discount' => $request->money_receipt_discount,
        //            'money_receipt_payment_type' => "CLIENT_PAYMENT",
        //            'money_receipt_payment_date' => $request->money_receipt_date,
        //            'money_receipt_note' => $request->money_receipt_note,
        //            'money_receipt_updated_by' => \Illuminate\Support\Facades\Auth::user()->id,
        //            'money_receipt_client_transaction_id' => $request->money_receipt_client_transaction_id,
        //            'money_receipt_account_transaction_id' => $request->money_receipt_account_transaction_id,
        //            
        //        ]);

        //        $moneyReciept->money_receipt_client_transaction_id = $client_tansaction_id;
        //        $moneyReciept->money_receipt_account_transaction_id = $account_tansaction_id;
        //        $moneyReciept->save();

        //        $client_ledger = new ClientLedger();
        //        $client_ledger->client_id = $request->money_receipt_client_id;
        //        $client_ledger->client_transaction_id = $request->money_receipt_client_transaction_id;
        //        $client_ledger->client_ledger_type = 'CLIENT_PAYMENT_UPDATE';
        //        $client_ledger->client_ledger_status = true;
        //        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($request->money_receipt_client_id);
        //        $client_ledger->client_ledger_date = $request->money_receipt_date;
        //        $client_ledger->client_ledger_create_date = date("Y-m-d");
        //        $client_ledger->client_ledger_prepared_by = Auth::user()->id;
        //          
        //        $client_ledger->client_ledger_cr = $request->money_receipt_amount;
        //        $client_ledger->save();


        //       $data = ['status'=>'okay','moneyReceiptId'=>$id];
        //       return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moneyReceipt = MoneyReceipt::where("money_receipt_id", $id)->get();
        //      $data = $moneyReceipt;


        $sale = \App\Models\Invoice\InvoicePosSale::where('invoice_no', '=', $moneyReceipt[0]->money_receipt_invoice_no)->get();

        $total_paying = $sale[0]->total_paid - $moneyReceipt[0]->money_receipt_total_amount;
        //                           print_r($total_paying);die;
        $update_pos_sale = \App\Models\Invoice\InvoicePosSale::where('invoice_no', '=', $moneyReceipt[0]->money_receipt_invoice_no)->update([
            'total_paid' => $total_paying
        ]);


        ClientTransaction::where("client_transaction_id", $moneyReceipt[0]->money_receipt_client_transaction_id)->update([
            "client_transaction_has_deleted" => "YES"
        ]);

        AccountTransaction::where("transaction_id", $moneyReceipt[0]->money_receipt_account_transaction_id)->update([
            "transaction_has_deleted" => "YES"
        ]);


        MoneyReceipt::where("money_receipt_id", $id)->update([
            "money_receipt_has_deleted" => "YES"
        ]);

        $data = ['status' => 'okay'];
        return $data;
    }

    public function getMoneyRecieptUserWise($creator_id)
    {
        // $user_type = $creator_id;
        $user_id = $creator_id;

        // $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
        //     //->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
        //     ->whereNull('money_receipt.money_receipt_rentee_id')
        //     ->get();

        // $data['items'] = CommonResource::collection($list);

        // return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        // die;


        // if ($user_type == "FLAT_OWNER") {
        //     $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
        //         ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
        //         ->where('money_receipt.money_receipt_flat_owner_id', '=', $user_id)
        //         ->get();
        // } else if ($user_type == "RENTEE") {
        //     $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
        //         ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')->distinct()
        //         ->where('money_receipt.money_receipt_rentee_id', '=', $user_id)
        //         ->get();
        // } else if ($user_type == "ASSOCIATION") {
        //     $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
        //         // ->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
        //         ->whereNull('money_receipt.money_receipt_rentee_id')
        //         ->get();
        // }
        //$list = null;

        //final
        // $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
        //     //->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
        //     ->where('money_receipt_created_by', '=', $user_id)
        //     ->get();



        // $list = DB::select('CALL money_reciept_list_get_association(.' . $user_id . ')');
        // $data['items'] = CommonResource::collection($list);


        $list = MoneyReceipt::whereMoneyReceiptHasDeleted('NO')
            //->join('flats', 'money_receipt.money_receipt_flat_owner_id', '=', 'flats.owner_id')
            ->where('money_receipt_created_by', '=', $user_id)
            ->get();
        $data['items'] = CommonResource::collection($list);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
    }
}
