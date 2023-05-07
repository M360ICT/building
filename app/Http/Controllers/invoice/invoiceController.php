<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Accounts;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\FlatOwnerLedger\FlatOwnerLedger;
use App\Models\FlatOwnerTransaction\FlatOwnerTransaction;
use App\Models\RenteeTransaction\RenteeTransaction;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\InvoiceBilling;
use App\Http\Resources\CommonResource;
use App\Models\ClientTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Configuration\Building\Building;
use App\Models\RenteeLedger\RenteeLedger;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //        $data['invoice'] = Invoice::where('invoice_has_deleted','NO')->join('staff','staff.staff_id','=', 'invoice_pos_sales.staff_id')->join('clients', 'clients.client_id','=', 'invoice_pos_sales.client_id')->latest('invoice_pos_sales.sale_id')->get();


        // echo '<pre>';
        // print_r($data['invoice']);die;
        //   return view('pages.invoice.list_invoice',$data);
        if ($request->user_type) {
            $user_type = $request->user_type;
            $user_id = $request->flat_owner_id;
        } else {
            $user_type = Auth::user()->type;
            $user_id = Auth::user()->id;
        }

        if ($user_type == "FLAT_OWNER") {
            $data['items'] = CommonResource::collection(Invoice::whereInvoiceHasDeleted('NO')->whereFlatOwnerId($user_id)->get());
        } else if ($user_type == "RENTEE") {
            $data['items'] = CommonResource::collection(Invoice::whereInvoiceHasDeleted('NO')->whereRenteeId($user_id)->get());
        } else if ($user_type == "ASSOCIATION") {
            $data['items'] = CommonResource::collection(Invoice::whereInvoiceHasDeleted('NO')->whereInvoiceType('FLAT_OWNER')->get());
        }


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {

            return view('pages.invoice.list_invoice', $data);
        }
    }

    public function today_invoices()
    {
        $today = date("Y-m-d");
        $data['invoice'] = Invoice::join('staff', 'staff.staff_id', '=', 'invoice_pos_sales.staff_id')->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->where('invoice_pos_sales.sales_date', $today)->latest('invoice_pos_sales.sale_id')->get();

        return view('pages.invoice.today_list_invoice', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['items']], 200);
        } else {
            if (Auth::user()->type == "ASSOCIATION") {
                $data['billing_items'] = \App\Models\Configuration\BillingItem::whereDataHasDeleted('NO')->whereItemsFor('FLAT_OWNERS')->get();
                $data['buildings'] = Building::whereBuildingStatus(1)->get();
            } else if (Auth::user()->type == "FLAT_OWNER") {
                $data['billing_items'] = \App\Models\Configuration\BillingItem::whereDataHasDeleted('NO')->whereItemsFor('RENTEE')->whereFlatOwnerId(Auth::user()->id)->get();
                $data['buildings'] = Building::whereBuildingStatus(1)->get();
            }
        }

        return view('pages.invoice.create_invoice', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        //       die;

        $request->validate([
            //'flat_owner_id' => 'required',
            'building_id' => 'required',
            // 'invoice_no' => 'required'
        ]);

        if ($request->created_by) {
            $created_by =  $request->created_by;
        } else {
            $created_by = Auth::user()->id;
        }

        $invoice = new Invoice();
        if ($request->invoice_type == "FLAT_OWNER") {
            $flat_owner = \App\Models\Rentee\Rentee::where('rentee.user_id', '=', $request->hidden_flat_owner_id)
                ->join('flats', 'flats.id', '=', 'rentee.flat_id')
                ->get();

            // echo '<pre>';
            // print_r($flat_owner);
            // die;
            $invoice->rentee_id = $request->hidden_flat_owner_id;
            $invoice->flat_owner_id = $flat_owner[0]->owner_id;
            $invoice->invoice_type = "FLAT_OWNER";
        } else {
            $invoice->flat_owner_id = $request->hidden_flat_owner_id;
            $invoice->invoice_type = "ASSOCIATION";
        }
        $invoice->building_id = $request->building_id;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->invoice_subtotal = $request->invoice_subtotal;
        $invoice->invoice_vat_rate = $request->vat_rate;
        $invoice->invoice_vat_rate = $request->vat_amount;
        $invoice->invoice_overall_discount = $request->overall_discount;
        $invoice->invoice_grand_total = $request->grand_total;
        $invoice->created_at = date('Y-m-d');
        $invoice->invoice_created_by = $created_by;
        $invoice->save();

        $invoice_id = $invoice->id;

        foreach ($request->billing_rows as $rowBilling) {

            $billing_item = 'billing_item_id_' . $rowBilling;
            $billing_description  = 'billing_description_' . $rowBilling;
            $billing_month  = 'billing_month_' . $rowBilling;
            $billing_charge  = 'billing_charge_' . $rowBilling;
            $billing_extras  = 'billing_extras_' . $rowBilling;
            $billing_quantity  = 'billing_quantity_' . $rowBilling;
            $billing_unit_total  = 'billing_total_' . $rowBilling;


            $invoice_billing = new InvoiceBilling();
            $invoice_billing->invoice_id = $invoice_id;
            $invoice_billing->billing_item_id = $request->$billing_item;
            $invoice_billing->billing_description = $request->$billing_description;
            $invoice_billing->billing_month = $request->$billing_month;
            $invoice_billing->billing_charge = $request->$billing_charge;
            $invoice_billing->billing_extras = $request->$billing_extras;
            $invoice_billing->billing_quantity = $request->$billing_quantity;
            $invoice_billing->billing_unit_total = $request->$billing_unit_total;
            $invoice_billing->created_at = date('Y-m-d');
            $invoice_billing->save();
        }

        if ($request->invoice_type == "FLAT_OWNER") {
            $transaction = new RenteeTransaction;
            $transaction->transaction_type = 'DEBIT';
            $transaction->transaction_amount = $request->grand_total;
            $transaction->transaction_rentee_id = $request->hidden_flat_owner_id;
            $transaction->transaction_invoice_id = $invoice_id;
            $transaction->transaction_note = 'INVOICE_SELL';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $rentee_current_balance = get_rentee_current_balance_by_rentee_id($request->hidden_flat_owner_id);



            RenteeTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $rentee_current_balance
            ]);

            $ledger = new \App\Models\RenteeLedger\RenteeLedger();
            $ledger->rentee_id = $request->hidden_flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = $invoice_id;
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
            $transaction->transaction_type = 'DEBIT';
            $transaction->transaction_amount = $request->grand_total;
            $transaction->transaction_flat_owner_id = $request->hidden_flat_owner_id;
            $transaction->transaction_invoice_id = $invoice_id;
            $transaction->transaction_note = 'INVOICE_SELL';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $flat_owner_current_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);



            FlatOwnerTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $flat_owner_current_balance
            ]);

            $ledger = new FlatOwnerLedger();
            $ledger->flat_owner_id = $request->flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = $invoice_id;
            $ledger->ledger_type = 'SALE';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_dr = $request->grand_total;
            $ledger->ledger_prepared_by = $created_by;

            $ledger->save();
        }



        $data = new CommonResource($invoice);

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
        $data['pos'] = Invoice::where('invoices.id', $id)
            ->join('invoice_billing_items', 'invoice_billing_items.invoice_id', '=', 'invoices.id')
            ->join('billing_items', 'billing_items.id', '=', 'invoice_billing_items.billing_item_id')
            ->join('users', 'users.id', '=', 'invoices.flat_owner_id')
            ->join('buildings', 'buildings.id', '=', 'invoices.building_id')
            ->get();


        $data['pos_sale'] = Invoice::where('id', $id)->first();


        // $data['client'] = Invoice::where('sale_id', $id)->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->first();


        // echo '<pre>';
        // print_r($data['pos']);
        // die;

        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['pos']], 200);
        } else {

            return view('pages.invoice.show_invoice', $data);
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
        $data['billing_items'] = \App\Models\Configuration\BillingItem::whereDataHasDeleted('NO')->get();

        return view('pages.invoice.edit_invoice', $data);
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
            //'flat_owner_id' => 'required',
            'building_id' => 'required',
            // 'invoice_no' => 'required'
        ]);

        if ($request->created_by) {
            $created_by =  $request->created_by;
        } else {
            $created_by = Auth::user()->id;
        }

        $invoice = Invoice::find($id);
        if ($request->invoice_type == "FLAT_OWNER") {
            $invoice->rentee_id = $request->hidden_flat_owner_id;
            $invoice->invoice_type = "FLAT_OWNER";
        } else {
            $invoice->flat_owner_id = $request->hidden_flat_owner_id;
            $invoice->invoice_type = "ASSOCIATION";
        }
        $invoice->building_id = $request->building_id;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->invoice_subtotal = $request->invoice_subtotal;
        $invoice->invoice_vat_rate = $request->vat_rate;
        $invoice->invoice_vat_rate = $request->vat_amount;
        $invoice->invoice_overall_discount = $request->overall_discount;
        $invoice->invoice_grand_total = $request->grand_total;
        $invoice->created_at = date('Y-m-d');
        $invoice->invoice_created_by = $created_by;
        $invoice->update();

        $invoice_id = $invoice->id;

        foreach ($request->billing_rows as $rowBilling) {

            $billing_item = 'billing_item_id_' . $rowBilling;
            $billing_description  = 'billing_description_' . $rowBilling;
            $billing_month  = 'billing_month_' . $rowBilling;
            $billing_charge  = 'billing_charge_' . $rowBilling;
            $billing_extras  = 'billing_extras_' . $rowBilling;
            $billing_quantity  = 'billing_quantity_' . $rowBilling;
            $billing_unit_total  = 'billing_total_' . $rowBilling;
            $item_id  = 'id_' . $rowBilling;


            $invoice_billing =  InvoiceBilling::whereId($request->item_id)->update([
                'billing_item_id' => $request->$billing_item,
                'billing_description' => $request->$billing_description,
                'billing_month' => $request->$billing_month,
                'billing_charge' => $request->$billing_charge,
                'billing_extras' => $request->$billing_extras,
                'billing_quantity' => $request->$billing_quantity,
                'billing_unit_total' => $request->$billing_unit_total,
                'created_at' => date('Y-m-d ')

            ]);
        }

        if ($request->invoice_type == "FLAT_OWNER") {
            $transaction = new RenteeTransaction;
            $transaction->transaction_type = 'DEBIT';
            $transaction->transaction_amount = $request->grand_total;
            $transaction->transaction_rentee_id = $request->hidden_flat_owner_id;
            $transaction->transaction_invoice_id = $invoice_id;
            $transaction->transaction_note = 'INVOICE_SELL';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $rentee_current_balance = get_rentee_current_balance_by_rentee_id($request->hidden_flat_owner_id);



            RenteeTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $rentee_current_balance
            ]);

            $ledger = new RenteeLedger();
            $ledger->rentee_id = $request->hidden_flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = $invoice_id;
            $ledger->ledger_type = 'Invoice Updated';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_rentee_current_balance_by_rentee_id($request->hidden_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_dr = $request->grand_total;
            $ledger->ledger_prepared_by = $created_by;

            $ledger->save();
        } else {

            $transaction = new FlatOwnerTransaction;
            $transaction->transaction_type = 'DEBIT';
            $transaction->transaction_amount = $request->grand_total;
            $transaction->transaction_flat_owner_id = $request->hidden_flat_owner_id;
            $transaction->transaction_invoice_id = $invoice_id;
            $transaction->transaction_note = 'INVOICE_SELL_UPDATED';
            $transaction->transaction_date = date('Y-m-d');
            $transaction->save();

            $flat_owner_current_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);



            FlatOwnerTransaction::find($transaction->id)->update([
                'transaction_last_balance' => $flat_owner_current_balance
            ]);

            $ledger = new FlatOwnerLedger();
            $ledger->flat_owner_id = $request->flat_owner_id;
            $ledger->ledger_transaction_id = $transaction->id;
            $ledger->ledger_invoice_id = $invoice_id;
            $ledger->ledger_type = 'INVOICE_SELL_UPDATED';
            $ledger->ledger_status = true;
            $ledger->ledger_last_balance = get_flat_owner_current_balance_by_flat_owner_id($request->hidden_flat_owner_id);
            $ledger->ledger_date = date("Y-m-d");
            $ledger->ledger_create_date = date("Y-m-d");
            $ledger->ledger_dr = $request->grand_total;
            $ledger->ledger_prepared_by = $created_by;

            $ledger->save();
        }



        $data = new CommonResource($invoice);

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
        $invoice = Invoice::find($id);
        $invoice->invoice_has_deleted = "YES";
        $invoice->save();

        $item = Invoice::find($id);

        $item->invoice_has_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);


        // $client = ClientTransaction::where('client_transaction_invoice_id', $id)->update([
        //     'client_transaction_has_deleted' => "YES"
        // ]);

        // $account = AccountTransaction::where('sale_id', $id)->update([
        //     'transaction_has_deleted' => "YES"
        // ]);
    }


    public function getDeliveryVehicle($id)
    {
        $man = DeliveryMan::where('delivery_men_id', $id)->get();
        $vehicle = DeliveryVehicle::where('delivery_vehicles_id', $man[0]->delivery_men_vehicle)->get();
        return $vehicle[0]->delivery_vehicles_name;
    }

    public function paymentType($account_type)
    {

        $fromuser = Accounts::whereAccountHasDeleted('NO')->where('account_type', '=', $account_type)->get();

        $output = '';
        $output .= '<option selected disabled>' . 'select account' . '</option>';

        foreach ($fromuser as $row) {
            $output .= '<option value="' . $row->id  . '" selected>' . $row->account_name . '</option>';
        }
        return $output;
    }

    public function getInvoicesUserWise($created_by)
    {
        $data['invoice'] = Invoice::where('invoice_has_deleted', 'NO')
            ->where('flat_owner_id', $created_by)
            // ->join('buildings', 'buildings.id', '=', 'invoices.building_id')
            ->get();
        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['invoice']], 200);
    }




    // public function invoiceReturn($sale_id)
    // {

    // }
}
