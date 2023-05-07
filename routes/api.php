<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Expense Head */
Route::resource('expense-head', ExpenseHead\ExpenseHeadController::class);

Route::resource('expense-sub-head', ExpenseSubHead\ExpenseSubHeadController::class);

Route::resource('account-transfer', Accounts\AccountTransferController::class);
Route::get('account/balance-statement', 'Accounts\AccountsController@balance_statement');
Route::post('account/save-opening-balance', 'AccountTransactions\AccountTransactionsController@save_opening_balance');
Route::get('search-account', function (Request $request) {
    return search_account($request->q);
});

Route::get('search-account-full-data', function (Request $request) {
    return search_account_full_data($request->q);
});



/* Money Receipt */
Route::resource('money-receipt', MoneyReceipt\MoneyReceiptController::class);
/* Money Receipt */


Route::resource('delivery-men', DeliveryMan\DeliveryManController::class);

/* expense */
Route::resource('expenses', Expenses\ExpensesController::class);

Route::resource('delivery-men', DeliveryMan\DeliveryManController::class);
Route::resource('company-info', CompanyInfo\CompanyInfoController::class);


Route::get('get-invoice-full-information', function (Request $request) {
    return get_invoice_full_information($request->q);
});

Route::resource('billing-items', Configuration\BillingItemsController::class);

Route::resource('invoice', invoice\invoiceController::class);




/* 2-27-23 Building Management */

Route::resource('building', Configuration\Building\BuildingController::class);

Route::resource('flat', Configuration\FlatController::class);


Route::get(
    'search-flat-owner-wise-invoice',
    function (Request $request) {
        return search_flat_owner_wise_invoice($request->q);
    }
);

Route::get('get-invoice-full-information', function (Request $request) {
    return get_invoice_full_information($request->q);
});

Route::get(
    'flat-owner-name-search',
    function (Request $request) {
        return searchFlatOwner($request->q);
    }
);

Route::get(
    'rentee-name-search',
    function (Request $request) {
        return searchRentee($request->q);
    }
);


Route::get('flat-owners', 'Configuration\FlatController@list_of_flat_owners');

Route::resource('accounts', Accounts\AccountsController::class);

Route::resource('rentee', Rentee\RenteeController::class);

Route::resource('flat-owner-payment', Payment\FlatOwnerPaymentController::class);
Route::post('payment/approve-payment-request', 'Payment\PaymentRequestController@approve_payment_request');

Route::resource('rentee-payment', Payment\RenteePaymentController::class);

Route::get('list-of-payment-request', 'Payment\PaymentRequestController@list_of_payment_request');


Route::resource('employee', Configuration\EmployeeController::class);

Route::resource('payroll-expense-items', Configuration\PayrollExpenseController::class);

Route::resource('payroll', Payroll\PayrollController::class);


Route::post('test-sms', 'Payroll\PayrollController@testSms');


Route::post('registration', 'Admin\UserRegistrationController@userRegisterController');

Route::post('new-login', 'Admin\UserRegistrationController@userLoginController');


/* accounts */

Route::resource('accounts', Accounts\AccountsController::class);


/* account transfer*/
Route::resource(
    'account-transfer',
    Accounts\AccountTransferController::class
);


/* balance Statement */
Route::get('account/balance-statement', 'Accounts\AccountsController@balance_statement');

/* non invoice amount */

Route::get('account/non-invoice-income', 'Accounts\AccountsController@non_invoice_income');


/* roles */
Route::resource('roles', Admin\RoleController::class);

/* permissions */
Route::resource('permissions', Admin\PermissionController::class);

/* users */

Route::resource('users', Admin\UserController::class);



/* building wise info */
Route::get('building-wise-info/{id}', 'Configuration\Building\BuildingController@buildingWise');


Route::resource('cheque-management', MoneyReceipt\ChecqueController::class);


//
Route::get('get-account-type-wise/{method}', 'Accounts\AccountsController@getAccountTypeInfo');


//user wise invoice

Route::get('invoice-user-wise/{created_by}', 'invoice\invoiceController@getInvoicesUserWise');


Route::get('only-flat-owners', 'Configuration\FlatController@onlyFlatOwner');

Route::resource('money-receipt', MoneyReceipt\MoneyReceiptController::class);

//Route::get('money-receipt/money-rec-creator-wise/{creator_id}/{user_type_get}', 'MoneyReceipt\MoneyReceiptController@getMoneyRecieptUserWise');

Route::get('money-receipt/money-rec-creator-wise/{creator_id}', 'MoneyReceipt\MoneyReceiptController@getMoneyRecieptUserWise');
