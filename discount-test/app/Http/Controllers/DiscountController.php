<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class DiscountController extends Controller
{
    public function getDiscount(Request $request) {
        return 'test';
    }
}