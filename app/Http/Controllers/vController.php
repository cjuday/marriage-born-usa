<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use App\Models\userMoreInfo;
use App\Models\preference;

use Illuminate\Http\Request;

class vController extends Controller
{
    public function index(Request $request){

 $search= $request->get('search');
      $entries = User::select('name', 'email')->where('name','like','%'.$search.'%')->orwhere('email','like','%'.$search.'%')->get();
       return view('dashboard', [ 'entries' => $entries])
       ->with('i',(request()->input('page',1)-1)*5);

 }
}
