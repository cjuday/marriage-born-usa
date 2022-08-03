<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\User;
use App\Models\userMoreInfo;
use App\Models\preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
class adminController extends Controller
{
    public function index(){
        
        $id=Auth::id();
           $admin=DB::table('admins')->where('id','like',$id)->select('name')->get();

      return view('admin.dashboard', ['admin'=>$admin]);
        
    }    



public function login(Request $request)
{
  if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
  {
    $email=$request->input('email');
    $user=DB::table('admins')->where('email','like',$email)->select('name')->get();
    return view('admin.dashboard', ['user'=>$user]);
  }else{
    return redirect()->back()->withErrors(['approve' => 'Invalid password or email.']);
  }
}


   public function deleteUser($id){
    
         $deleteUser = User::findOrFail($id)->delete();
         $deleteMore = userMoreInfo::findOrFail($id)->delete();
         $deletePreference = preference::findOrFail($id)->delete();


   }



}
