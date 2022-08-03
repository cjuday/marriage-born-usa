<?php

namespace App\Http\Controllers;
use App\Models\Payments;

use Illuminate\Http\Request;

class PayControl extends Controller
{
    public function methods()
    {
        $pay = Payments::all();

        return view('user.upgrade')->with('pay',$pay);
    }
}
