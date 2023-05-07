<?php

namespace App\Http\Controllers\MoneyReceipt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
}
