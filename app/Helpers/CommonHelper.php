<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Agents\Agent;
use App\Models\Configuration\HeadModel;
use App\Models\Configuration\Subhead;
use App\Models\Deligates\Deligate;
use App\Models\Sponsors\Sponsors;
use App\Models\Invoice\Invoice;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\AgentTransection\AgentTransection;
use App\Models\DeligateTransaction\DeligateTransaction;
use App\Models\MoneyReciept\MoneyReciept;
use App\Models\SponsorTransaction\SponsorTransaction;
use Illuminate\Support\Carbon;
use App\Models\Expense\Expense;
use App\Models\Accounts\Accounts;
use App\Models\Branch\Branch;
use App\Models\Client\Client as ClientClient;
use App\Models\Configuration\Employee;
use App\Models\FlatOwnerTransaction\FlatOwnerTransaction;
use App\Models\DeliveryMan\DeliveryMan;
use App\Models\Employee\EmployeeTransaction;
use App\Models\ExpenseHead\ExpenseHead;
use App\Models\ExpenseSubhead\ExpenseSubHead;
use App\Models\Invoice\InvoicePosSale;
use App\Models\InvoiceReturnProduct\InvoiceReturnProduct;
use App\Models\PosSaleProducts\PosSaleProduct;
use App\Models\PosTransferProduct\PosTransferProduct;
use App\Models\Product\Purchase;
use App\Models\Product\PurchaseItems;
use App\Models\Product\PurchaseReturnItems;
use App\Models\Staff\Staff;
use App\Models\Supplier\Supplier;
use App\Models\SupplierTransaction\SupplierTransaction;
use App\Models\Transfer\WarehouseToBranch;
use App\Models\Transfer\WarehouseToBranchItems;
use App\Models\Warehouse\Warehouse;
use App\Models\Configuration\Flat;
use App\Http\Resources\CommonResource;




if (!function_exists('search_agent')) {

    function search_agent($q)
    {
        $agents = ExpenseHead::where('title', 'like', "%{$q}%")->get();

        $agent_array = array();
        foreach ($agents as $agent) {
            $label = $agent['title'] . '(' . $agent['expensehead_id'] . ')';
            $value = intval($agent['expensehead_id']);
            $agent_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $agent_array);
        echo json_encode($result);
        exit;
    }
}

if (!function_exists('search_supplier')) {

    function search_supplier($q)
    {
        $supplier = Supplier::where('supplier_name', 'like', "%{$q}%")->get();

        $supplier_array = array();
        foreach ($supplier as $supplier) {
            $label = $supplier['supplier_name'] . '(' . $supplier['supplier_id'] . ')';
            $value = intval($supplier['supplier_id']);
            $supplier_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $supplier_array);
        echo json_encode($result);
        exit;
    }
}

if (!function_exists('get_user_by_user_id')) {

    function get_user_by_user_id($id)
    {
        $user = \App\User::where('id', '=', $id)->get();
        return $user;
    }
}


if (!function_exists('get_user_name_by_user_id')) {

    function get_user_name_by_user_id($id)
    {
        $user = \App\User::where('id', '=', $id)->first();
        if (isset($user)) {
            return $user->name;
        }
    }
}

if (!function_exists('get_invoice_by_invoice_id')) {

    function get_invoice_by_invoice_id($id)
    {
        $item = Invoice::where('id', '=', $id)->get();
        if (isset($item)) {
            return $item[0];
        }
    }
}



if (!function_exists('search_supplier_info')) {

    function search_supplier_info($q)
    {


        $supplier = Supplier::where('supplier_name', 'like', "%{$q}%")->get();

        // echo '<pre>';
        // print_r($clients);die;

        // join('purchase_items','purchase_items.purchase_id','=','purchases
        // .purchase_id' )->join('products', 'products.product_id','!=', 'purchase_items.purchase_product_id')->


        $supplier_array = array();
        foreach ($supplier as $supplier) {
            $label = $supplier['supplier_name'] . '(' . $supplier['supplier_id'] . ')';
            $value = intval($supplier['supplier_id']);
            $supplier_id = $supplier['supplier_id'];
            $supplier_detail = $supplier['supplier_name'];
            $supplier_array[] = array(
                "label" => $label, "value" => $value,
                'supplier_current_bal' => get_supplier_current_balance_by_supplier_id($supplier_id),
                'supplier_name' => $supplier_detail,

            );
        }
        $result = array('status' => 'ok', 'content' => $supplier_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_account_trans')) {

    function search_account_trans($q)
    {
        //  $clients = Accounts::where('accounts.account_name','like',"%{$q}%")->join('account_transactions', 'account_transactions.transaction_account_id','=', 'accounts.account_id')->get();
        $clients = Accounts::where('accounts.account_name', 'like', "%{$q}%")->get();

        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['account_name'] . '(' . $client['id'] . ')';
            $value = intval($client['id']);
            $remain = intval(get_acoount_current_balance_only_by_account_id($client['id']));
            $client_array[] = array("label" => $label, "value" => $value, "remain" => $remain);
        }

        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_employee')) {

    function search_employee($q)
    {

        $employee = Employee::where('employee_name', 'like', "%{$q}%")->get();


        $employee_array = array();
        foreach ($employee as $employee) {
            $label = $employee['employee_name'] . '(' . $employee['id'] . ')';
            $value = intval($employee['id']);
            $employee_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $employee_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('searchDeliveryMan')) {

    function searchDeliveryMan($q)
    {
        //  $clients = Accounts::where('accounts.account_name','like',"%{$q}%")->join('account_transactions', 'account_transactions.transaction_account_id','=', 'accounts.account_id')->get();
        $clients = DeliveryMan::where('accounts.account_name', 'like', "%{$q}%")->get();

        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['account_name'] . '(' . $client['account_id'] . ')';
            $value = intval($client['account_id']);
            $remain = intval(get_acoount_current_balance_by_account_id($client['account_id']));
            $client_array[] = array("label" => $label, "value" => $value, "remain" => $remain);
        }

        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('searchProduct')) {

    function searchProduct($q)
    {


        $clients = Purchase::where('purchase_warehouse_id', $q)
            ->join('purchase_items', 'purchase_items.purchase_id', '=', 'purchases.purchase_id')
            ->join('products', 'products.product_id', '=', 'purchase_items.purchase_product_id')

            ->get();

        // echo '<pre>';
        // print_r($clients);die;

        // join('purchase_items','purchase_items.purchase_id','=','purchases
        // .purchase_id' )->join('products', 'products.product_id','!=', 'purchase_items.purchase_product_id')->


        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['product_name'] . '(' . $client['product_id'] . ')';
            $value = intval($client['purchase_items_id']);
            $item_id = $client['product_id'];
            $items_detail = $client['product_name'];
            $items_quantity = $client['purchase_product_quantity'];
            $items_price = $client['product_retail_price'];
            $client_array[] = array(
                "label" => $label, "value" => $value,
                'items_detail' => $items_detail,
                'items_quantity' => getWarehouseCurrentStocks($item_id),
                'items_price' => $items_price,
                'items_id' => $item_id,
            );
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}



/* Purchase Sell */

if (!function_exists('search_purchased_product')) {

    function search_purchased_product($q)
    {
        //  $clients = Accounts::where('accounts.account_name','like',"%{$q}%")->join('account_transactions', 'account_transactions.transaction_account_id','=', 'accounts.account_id')->get();
        // $clients = Purchase::where('purchase_warehouse_id', $q)->join('purchase_items', 'purchase_items.purchase_id','=', 'purchases.purchase_id')->join('products', 'products.product_id','=', 'purchase_items.purchase_product_id')->get();


        $transferd = WarehouseToBranch::where('branch_id', $q)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->get();

        // echo '<pre>';
        // print_r($transferd);die;

        $transferd_array = array();
        foreach ($transferd as $transferd) {
            $label = $transferd['product_name'] . '(' . $transferd['transfer_product_id'] . ')';
            $value = intval($transferd['transfer_product_id']);
            $item_id = $transferd['product_id'];
            $items_detail = $transferd['product_name'];
            $items_quantity = getBrnachCurrentStocks(
                $transferd['warehouse_to_branch_transfer_number'],
                $transferd['product_id'],
                $q
            );
            $items_price = $transferd['product_retail_price'];
            $transferd_array[] = array(
                "label" => $label, "value" => $value,

                'items_detail' => $items_detail,
                'items_quantity' => $items_quantity,
                'items_price' => $items_price,
                'items_id' => $item_id,
            );
        }

        $result = array('status' => 'ok', 'content' => $transferd_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_product')) {

    function search_product($q)
    {
        //  $clients = Accounts::where('accounts.account_name','like',"%{$q}%")->join('account_transactions', 'account_transactions.transaction_account_id','=', 'accounts.account_id')->get();
        $products = App\Models\Product\Product::all();


        $product_array = array();
        foreach ($products as $row) {
            $label = $row['product_name'] . ' [' . $row['product_entry_id'] . ']';
            $value = intval($row['product_id']);
            $product_array[] = array("label" => $label, "value" => $value);
        }

        $result = array('status' => 'ok', 'content' => $product_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_flat_owner_wise_invoice')) {

    function search_flat_owner_wise_invoice($q)
    {

        $invoices  = Invoice::where('flat_owner_id', $q)->get();
        //         echo '<pre>';
        //         print_r($q);die;

        $result_array = array();
        foreach ($invoices as $row) {
            $label = $row['invoice_no'];
            $value = intval($row['id']);
            $result_array[] = array("label" => $label, "value" => $value);
        }
        //        $result = array('status' => 'ok', 'content' => $result_array);
        //        echo json_encode($result);
        //        exit;

        $data = CommonResource::collection($result_array);

        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}

if (!function_exists('search_rentee_wise_invoice')) {

    function search_rentee_wise_invoice($q)
    {

        $invoices  = Invoice::where('rentee_id', $q)->get();
        //         echo '<pre>';
        //         print_r($q);die;

        $result_array = array();
        foreach ($invoices as $row) {
            $label = $row['invoice_no'];
            $value = intval($row['id']);
            $result_array[] = array("label" => $label, "value" => $value);
        }
        //        $result = array('status' => 'ok', 'content' => $result_array);
        //        echo json_encode($result);
        //        exit;

        $data = CommonResource::collection($result_array);

        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}




if (!function_exists('searchStaff')) {

    function searchStaff($q)
    {
        $staff = Staff::where('staff_name', 'like', "%{$q}%")->get();

        $staff_array = array();
        foreach ($staff as $staff) {
            $label = $staff['staff_name'] . '(' . $staff['staff_id'] . ')';
            $value = intval($staff['staff_id']);
            $staff_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $staff_array);
        echo json_encode($result);
        exit;
    }
}
if (!function_exists('searchFlatOwner')) {

    function searchFlatOwner($q)
    {
        if (request()->user_type == "FLAT_OWNER") {
            $flatOwner = \App\Models\Rentee\Rentee::where('user_id', request()->rentee_id)
                ->join('users', 'users.id', '=', 'rentee.user_id')
                ->where('users.name', 'like', "%{$q}%")
                ->get();
            //          $flatOwner = App\User::where('name','like',"%{$q}%")
            //                ->join('flats','users.id','=','flats.owner_id')
            //                ->select('flats.owner_id','users.id','users.name')
            //                ->get();  
        } else {
            if (request()->rentee_id) {
            } else {
                if (Auth::user()->type == "ASSOCIATION") {
                    $flatOwner = App\User::where('name', 'like', "%{$q}%")
                        ->join('flats', 'users.id', '=', 'flats.owner_id')
                        ->select('flats.owner_id', 'users.id', 'users.name')->distinct()
                        ->get();
                } else if (Auth::user()->type == "FLAT_OWNER") {
                    $flatOwner = \App\Models\Rentee\Rentee::join('users', 'users.id', '=', 'rentee.user_id')
                        ->where('users.name', 'like', "%{$q}%")
                        ->get();
                }
            }
        }

        $owner_array = array();
        foreach ($flatOwner as $flat) {
            $label = $flat['name'];
            $value = intval($flat['id']);

            $owner_array[] = array("label" => $label, "value" => $value);
        }
        $data = CommonResource::collection($owner_array);

        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}

if (!function_exists('searchRentee')) {

    function searchRentee($q)
    {

        $rentee = \App\Models\Rentee\Rentee::join('users', 'users.id', '=', 'rentee.user_id')
            ->where('users.name', 'like', "%{$q}%")
            ->get();


        $data_array = array();
        foreach ($rentee as $row) {
            $label = $row['name'];
            $value = intval($row['id']);

            $data_array[] = array("label" => $label, "value" => $value);
        }
        $data = CommonResource::collection($data_array);

        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data], 200);
    }
}


if (!function_exists('searchMoneyReceiptClient')) {

    function searchMoneyReceiptClient($q)
    {
        $client = ClientClient::where('client_name', 'like', "%{$q}%")->get();

        $client_array = array();
        foreach ($client as $client) {
            $clientBalance = get_client_current_balance_by_client_id($client['client_id']);
            $label = $client['client_name'] . '(' . $client['client_id'] . ')' . ' Due :' . $clientBalance;
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('getClientName')) {

    function getClientName($client_id)
    {
        $client = ClientClient::where('client_id', $client_id)->get();
        return $client[0]->client_name;
    }
}





if (!function_exists('getBranchName')) {

    function getBranchName($branch_id)
    {
        $branch = Branch::where('branch_id', $branch_id)->get();
        return $branch[0]->branch_name;
    }
}


if (!function_exists('getStaffName')) {

    function getStaffName($staff_id)
    {
        $staff = Staff::where('staff_id', $staff_id)->get();
        return $staff[0]->staff_name;
    }
}



if (!function_exists('searchClient')) {

    function searchClient($q)
    {
        $client = ClientClient::where('client_name', 'like', "%{$q}%")->get();

        $client_array = array();
        foreach ($client as $client) {
            $label = $client['client_name'] . '(' . $client['client_id'] . ')';
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}





if (!function_exists('search_account')) {

    function search_account($q)
    {
        $account = Accounts::where('account_name', 'like', "%{$q}%")->orWhere('account_number', 'like', "%{$q}%")->orWhere('account_bank_name', 'like', "%{$q}%")->get();

        $sponser_array = array();
        foreach ($account as $acc) {
            // print_r($acc);
            $label = $acc['account_name'] . ' [' . $acc['account_number'] . ']';
            $value = intval($acc['id']);
            $acc_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $acc_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_client_full_information')) {

    function search_client_full_information($q)
    {
        $clients = Client::where('client_name', 'like', "%{$q}%")->orWhere('client_entry_id', 'like', "%{$q}%")->orWhere('client_phone', 'like', "%{$q}%")->get();

        $client_array = array();

        foreach ($clients as $client) {
            $label = $client['client_name'] . '(' . $client['client_entry_id'] . ')';
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value, "client_name" => $client['client_name'], "client_phone" => $client['client_phone'], "client_address" => $client['client_address']);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_account_full_data')) {

    function search_account_full_data($q)
    {
        $accounts = Accounts::where('account_name', 'like', "%{$q}%")->orWhere('account_number', 'like', "%{$q}%")->orWhere('account_bank_name', 'like', "%{$q}%")->get();

        $account_array = array();

        foreach ($accounts as $acc) {
            $label = $acc['account_name'] . '(' . $acc['account_number'] . ')';
            $value = intval($acc['account_id']);
            $account_array[] = array("label" => $label, "value" => $value, "account_name" => $acc['account_name'], "account_bank_name" => $acc['account_bank_name'], "account_balance" => get_acoount_current_balance_by_account_id($acc['account_id'])['balance']);
        }
        $result = array('status' => 'ok', 'content' => $account_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('get_account_information_by_id')) {

    function get_account_information_by_id($id)
    {
        $account = Accounts::where('id', $id)->get();
        return $account;
    }
}


if (!function_exists('get_account_method_information_by_id')) {

    function get_account_method_information_by_id($id)
    {
        $account = Accounts::where('id', $id)->first();
        return $account->account_name;
    }
}


if (!function_exists('get_invoice_full_information')) {

    function get_invoice_full_information($q)
    {
        $invoice = CommonResource::collection(Invoice::where('id', $q)->get());
        //        print_r($invoice);die;
        //        $result = array('status' => 'ok', 'content' => $invoice);
        //        $data = new CommonResource($invoice);
        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $invoice], 200);
    }
}

if (!function_exists('get_flat_owner_current_balance_by_flat_owner_id')) {

    function get_flat_owner_current_balance_by_flat_owner_id($id)
    {
        $credit = FlatOwnerTransaction::whereTransactionFlatOwnerId($id)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = FlatOwnerTransaction::whereTransactionFlatOwnerId($id)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);

        return $currentBalance;
    }
}

if (!function_exists('get_rentee_current_balance_by_rentee_id')) {

    function get_rentee_current_balance_by_rentee_id($id)
    {
        $credit = App\Models\RenteeTransaction\RenteeTransaction::whereTransactionRenteeId($id)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = App\Models\RenteeTransaction\RenteeTransaction::whereTransactionRenteeId($id)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);

        return $currentBalance;
    }
}

if (!function_exists('get_current_user_balance')) {

    function get_current_user_balance()
    {
        $user_type = Auth::user()->type;
        $user_id = Auth::user()->id;
        if ($user_type == "RENTEE") {
            $credit = App\Models\RenteeTransaction\RenteeTransaction::whereTransactionRenteeId($user_id)->whereTransactionType('CREDIT')->sum('transaction_amount');
            $debit = App\Models\RenteeTransaction\RenteeTransaction::whereTransactionRenteeId($user_id)->whereTransactionType('DEBIT')->sum('transaction_amount');

            $currentBalance = intval($credit) - intval($debit);

            return $currentBalance;
        } else if ($user_type == "FLAT_OWNER") {
            $credit = FlatOwnerTransaction::whereTransactionFlatOwnerId($user_id)->whereTransactionType('CREDIT')->sum('transaction_amount');
            $debit = FlatOwnerTransaction::whereTransactionFlatOwnerId($user_id)->whereTransactionType('DEBIT')->sum('transaction_amount');

            $currentBalance = intval($credit) - intval($debit);

            return $currentBalance;
        } else {
            return "Not Applicable";
        }
    }
}


if (!function_exists('get_employee_current_balance_by_employee_id')) {

    function get_employee_current_balance_by_employee_id($id)
    {
        $credit = EmployeeTransaction::whereTransactionEmployeeId($id)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = EmployeeTransaction::whereTransactionEmployeeId($id)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);

        return $currentBalance;
    }
}


if (!function_exists('get_acoount_current_balance_by_account_id')) {

    function get_acoount_current_balance_by_account_id($accountID)
    {
        $credit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);
        return $currentBalance;
    }
}


if (!function_exists('get_acoount_current_balance_only_by_account_id')) {

    function get_acoount_current_balance_only_by_account_id($accountID)
    {
        $credit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('CREDIT')->sum('transaction_amount');
        $debit = AccountTransaction::whereTransactionAccountId($accountID)->whereTransactionType('DEBIT')->sum('transaction_amount');

        $currentBalance = intval($credit) - intval($debit);
        return $currentBalance;
    }
}

if (!function_exists('get_moeny_recipt_existance')) {

    function get_moeny_recipt_existance($invoice_no)
    {

        return   $result = MoneyReciept::whereMoneyRecieptHasDeleted('NO')->where('money_reciept_invoice_no', $invoice_no)->count();
    }
}


if (!function_exists('get_inv_id')) {

    function get_inv_id($invoice_no)
    {

        $result = Invoice::where('invoice_no', $invoice_no)->first();

        if (isset($result)) {
            return $result->id;
        }
    }
}

if (!function_exists('get_today_total_sale')) {

    function get_today_total_sale()
    {
        $today = date('Y-m-d');
        $today_sale = Invoice::whereInvoiceHasDeleted('NO')->whereInvoiceDate($today)->sum('invoice_net_total');

        $previous_day = date('Y-m-d', strtotime("-1 days"));
        $previous_day_sale = Invoice::whereInvoiceHasDeleted('NO')->whereInvoiceDate($previous_day)->sum('invoice_net_total');


        $amount_difference = intval($today_sale) - intval($previous_day_sale);

        if (intval($previous_day_sale) == 0) {
            $previous_day_sale = 1;
        }

        $statistics = ($amount_difference / $previous_day_sale) * 100;

        return array('today_sale' => $today_sale, 'previous_day_sale' => $previous_day_sale, 'statistics' => number_format($statistics, 2));
    }
}


/* find head subhead */
// if (!function_exists('get_sub_head')) {

//     function get_sub_head($subhead)
//     {
//         $subhead = Subhead::where('subhead_id', $subhead)->get();

//        return $subhead[0]->sub_head_name;

//     }
// }


if (!function_exists('get_head_id')) {

    function get_head_id($subhead_id)
    {
        $head = Subhead::where('subhead_id', $subhead_id)->get();

        return $head[0]->head_id;
    }
}


if (!function_exists('get_head_name')) {



    function get_head_name($subhead_id)
    {
        $head_id = Subhead::where('subhead_id', $subhead_id)->get();
        $head = HeadModel::where('head_id', $head_id)->get();
        return $head[0]->head_name;
    }
}

if (!function_exists('get_sub_head_name')) {

    function get_sub_head_name($subhead_id)
    {

        $head = Subhead::where('subhead_id', $subhead_id)->get();
        return $head[0]->sub_head_name;
    }
}



if (!function_exists('corresponding_account_ID')) {

    function corresponding_account_ID($invoice, $client)
    {
        $invoice =  Invoice::where('invoice_id', $invoice)->where('invoice_client_id', $client)->get();
        $client_id_get = $invoice[0]->invoice_client_id;


        $trans =  AccountTrasection::where('transaction_client_id', $client_id_get)->get();

        return $trans[0]->transaction_account_id;
    }
}

if (!function_exists('get_today_sales')) {

    function get_today_sales()
    {
        $invoiceTotalSales = Invoice::where('invoice_sales_date', Carbon::today()->toDateString())->sum('invoice_net_total');
        $invoiceTotalSalesAmount = 0;
        if ($invoiceTotalSales != "") {
            $invoiceTotalSalesAmount = $invoiceTotalSales;
        }
        return $invoiceTotalSalesAmount;
    }
}

if (!function_exists('get_today_expense')) {

    function get_today_expense()
    {
        $expense = Expense::where('expense_date', Carbon::today()->toDateString())->sum('expense_amount');
        if ($expense != "") {
            return $expense;
        } else {
            return 0;
        }
    }
}

if (!function_exists('get_today_collection')) {

    function get_today_collection()
    {
        $moneyReceipt = MoneyReciept::where('money_reciept_payment_date', Carbon::today()->toDateString())->sum('money_reciept_total_amount');
        if ($moneyReceipt != "") {
            return $moneyReceipt;
        } else {
            return 0;
        }
    }
}

if (!function_exists('get_today_profit')) {

    function get_today_profit()
    {
        $invoiceTotalSalesProfit = Invoice::where('invoice_sales_date', Carbon::today()->toDateString())->sum('invoice_total_profit');
        $invoiceTotalSalesProfitAmount = 0;
        if ($invoiceTotalSalesProfit != "") {
            $invoiceTotalSalesProfitAmount = $invoiceTotalSalesProfit;
        }


        $expense = Expense::where('expense_date', Carbon::today()->toDateString())->sum('expense_amount');
        $expenseAmount = 0;
        if ($expense != "") {
            $expenseAmount = $expense;
        }

        $knitProfit = $invoiceTotalSalesProfitAmount - $expenseAmount;
        return $knitProfit;
    }
}

if (!function_exists('get_today_sales_profit')) {

    function get_today_sales_profit()
    {
        $invoiceTotalSalesProfit = Invoice::where('invoice_sales_date', Carbon::today()->toDateString())->sum('invoice_total_profit');
        $invoiceTotalSalesProfitAmount = 0;
        if ($invoiceTotalSalesProfit != "") {
            $invoiceTotalSalesProfitAmount = $invoiceTotalSalesProfit;
        }

        return $invoiceTotalSalesProfitAmount;
    }
}

if (!function_exists('get_invoice_payment')) {

    function get_invoice_payment($invoiceNo)
    {
        $moneyReceipt = MoneyReciept::whereMoneyRecieptInvoiceNo($invoiceNo)->sum('money_reciept_total_amount');
        if ($moneyReceipt != "") {
            return $moneyReceipt;
        } else {
            return 0;
        }
    }
}


if (!function_exists('getPaymentType')) {

    function getPaymentType($account)
    {
        $moneyReceipt = Accounts::where('id', $account)->get();
        if (isset($moneyReceipt[0])) {
            return $moneyReceipt[0]->account_type;
        } else {
            return 'DUE';
        }
    }
}

/* get expense head*/
if (!function_exists('getExpenseHead')) {

    function getExpenseHead($expense_head_id)
    {
        $expesne = ExpenseHead::where('expensehead_id', $expense_head_id)->get();
        if (isset($expesne[0])) {
            return $expesne[0]->title;
        }
    }
}
/* get expense subhead*/
if (!function_exists('getExpenseSubHead')) {

    function getExpenseSubHead($expense_sub_head_id)
    {
        $expesne = ExpenseSubHead::where('expense_sub_head_id', $expense_sub_head_id)->get();
        if (isset($expesne[0])) {
            return $expesne[0]->title;
        }
    }
}




if (!function_exists('getWareHouseNameHelp')) {

    function getWareHouseNameHelp($warehouse_id)
    {
        $warehouse = Warehouse::where('warehouse_id', $warehouse_id)->get();

        if (isset($warehouse[0])) {
            return $warehouse[0]->warehouse_name;
        }
    }
}



if (!function_exists('getCurrentStocks')) {

    function getCurrentStocks($product_id)
    {
        $sold_product = PosSaleProduct::where('product_id', $product_id)->sum('quantity');
        $purchased_product = PurchaseItems::where('purchase_product_id', $product_id)->sum('purchase_product_quantity');
        $transferd_product = PosTransferProduct::where('product_id', $product_id)->sum('quantity');
        $purchase_return = PurchaseReturnItems::where('purchase_product_id', $product_id)->sum('purchase_product_return_quantity');
        //$available_quantity = ($purchased_product - $sold_product)-$transferd_product;
        $available_quantity = (($purchased_product - $purchase_return) - $sold_product) - $transferd_product;
        return $available_quantity;
    }
}



if (!function_exists('getWarehouseCurrentStocks')) {

    function getWarehouseCurrentStocks($product_id)
    {
        $purchased_product = PurchaseItems::where('purchase_product_id', $product_id)->sum('purchase_product_quantity');
        $warehouse_to_branch = WarehouseToBranchItems::where('transfer_product_id', $product_id)->sum('transfer_product_amount');


        // $recieve_product = PosTransferProduct::where('product_id',$product_id)->where('to_warehouse',$warehouse_id)->sum('quantity');
        // $transfer_product = PosTransferProduct::where('product_id',$product_id)->where('from_warehouse', $warehouse_id)->sum('quantity');

        $transfer_product = PosTransferProduct::where('product_id', $product_id)->sum('quantity');



        $purchase_return = PurchaseReturnItems::where('purchase_product_id', $product_id)->sum('purchase_product_return_quantity');

        $total_transfer_and_return =  ($warehouse_to_branch + $transfer_product + $purchase_return);
        $final_stock = ($purchased_product + $transfer_product) - $total_transfer_and_return;
        return $final_stock;
    }
}


if (!function_exists('getBrnachCurrentStocks')) {

    function getBrnachCurrentStocks($transferid, $product_id, $branch_id)
    {



        $sold_product = PosSaleProduct::where('product_id', $product_id)->where('has_deleted', 'NO')->sum('quantity');
        $purchased_product = WarehouseToBranchItems::where('transfer_product_id', $product_id)->sum('transfer_product_amount');
        $sale_return = InvoiceReturnProduct::where('return_product_id', $product_id)->sum('return_product_quantity');

        return ($purchased_product - $sold_product) + $sale_return;
    }
}



if (!function_exists('getInvoiceCurrentStock')) {

    function getInvoiceCurrentStock($product_id, $sale_id)
    {



        $sold_product = PosSaleProduct::where('product_id', $product_id)->where('has_deleted', 'NO')->sum('quantity');
        $sale_return = InvoiceReturnProduct::where('return_product_id', $product_id)->sum('return_product_quantity');

        return ($sold_product - $sale_return);
    }
}

/* return account */


if (!function_exists('updateAccountTransactionLastBalance')) {

    function updateAccountTransactionLastBalance($transactionID, $accID)
    {
        $update_client_transection = AccountTransaction::where('id', $transactionID)->update([
            'transaction_last_balance' => get_acoount_current_balance_only_by_account_id($accID)
        ]);
        return $update_client_transection;
    }
}


if (!function_exists('isAPIRequest')) {

    function isAPIRequest()
    {
        $is_api_request = request()->route()->getPrefix() === 'api';
        if ($is_api_request) {
            return true;
        } else {
            return false;
        }
    }
}
