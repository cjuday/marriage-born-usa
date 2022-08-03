<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use DB;

class admin extends Controller
{
    
     public function adminlog(Request $reuest){


     	$request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
  $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $admin=Auth::admin();
//producing jwt token & cookie
$tok =$admin->createToken('token')->plainTextToken;
$cookie= cookie('jwt', $tok, 60*24);

   return response([

     'message'=>$tok

   ])->withCookie($cookie);

        }

   return response([

          'message'=>'Invalid Credentials' 

       ], Response::HTTP_UNAUTHORIZED);



      

             

   

     }

}
