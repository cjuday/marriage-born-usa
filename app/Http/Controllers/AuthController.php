<?php
namespace App\Http\Controllers;


use App\Mail\userRegistration;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin;
use App\Models\userMoreInfo;
use App\Models\preference;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use DB;
use DateTime;
use Carbon\Carbon;

class AuthController extends Controller
{

  //register user (not Admin)
   public function register(Request $request){

  
$request->validate([
    'name'=>'required|max:40',
    'email'=>'required',
    'password' => 'required|min:6',
    'dob'=>'required',
    'sex'=>'required',
    'edu_degree'=>'required',
  'edu_subject'=> 'required',
   'contact'=>'required',
 'religion'=>'required',
 'marital_status'=>'required',
   'occupation'=>'required',
   'Country'=> 'required',
   'City'=>'required',
   'Area'=>'required',
]);

  
  $user= User::create([

     'name'=> $request-> input('name'),
     'email'=> $request-> input('email'),
     'password'=>Hash::make( $request-> input('password'))
     


    ]);
$email=$request-> input('email');
  //Calculating Age
$dob = $request->input('dob');

 $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $age = $dobObject->diff($nowObject);
$id=DB::table('users')->where('email','like',$email)->select('id','created_at')->first();
 $more = new userMoreInfo([

    'id' => $id->id,
    'name'=>$request->input('name'),
  
 'dob'=>$request->input('dob'),
 'age'=>$age->format("%y"),
 'sex'=>$request->input('sex'),
'edu_degree'=>$request->input('edu_degree'),
  'edu_subject'=> $request->input('edu_subject'),
   'contact'=> $request->input('contact'),
 'religion'=>$request->input('religion'),
 'marital_status'=>$request->input('marital_status'),
   'occupation'=> $request->input('occupation'),
   'Country'=> $request->input('Country'),
   'City'=> $request->input('City'),
   'Area'=> $request->input('Area'),

 'registered_at'=>$id->created_at
]);
$more->save();
//creating token and email verification
$user->createToken('my_app_token')->plainTextToken;
\Mail::send(new userRegistration());
return response()->json($user,201);
 

   }

   //User login (not Admin)

   public function login(Request $request){
       
        

  if(!Auth::attempt($request->only('email','password'))){

       return response([

          'message'=>'Invalid Credentials' 

       ], Response::HTTP_UNAUTHORIZED);

  }

   $user=Auth::user();
//producing jwt token & cookie
$token =$user->createToken('token')->plainTextToken;
$cookie= cookie('jwt', $token, 60*24);

   return response([

     'message'=> $token

   ])->withCookie($cookie);

             

   }
//show basic info of a user
   public function user(){


    	return Auth::user();
    }
//show personal info of a user
       public function userMoreInfo(){

       $id=Auth::id();
      return userMoreInfo::find($id);
    }
//show preferences of a user
       public function userpreference(){


        $id=Auth::id();
      return preference::find($id);
    }

//Insert personal information of an user into user_more_infos table
     public function addinfo(Request $request){
//Calculating Age
$dob = $request->input('dob');

 $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $age = $dobObject->diff($nowObject);

 $id=Auth::id();
 $name=DB::table('users')->where('id','like',$id)->select('name')->first();  
$registered_at=DB::table('users')->where('id','like',$id)->select('created_at')->first();
      $more = new userMoreInfo([

    'id' => Auth::id(),
    'name'=>$name->name,
   'image'=> $request->input('image'),
 'dob'=>$request->input('dob'),
 'age'=>$age->format("%y"),
 'sex'=>$request->input('sex'),
'edu_degree'=>$request->input('edu_degree'),
  'edu_subject'=> $request->input('edu_subject'),
   'contact'=> $request->input('contact'),
 'religion'=>$request->input('religion'),
 'marital_status'=>$request->input('marital_status'),
   'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'occupation'=> $request->input('occupation'),
   'Country'=> $request->input('Country'),
   'City'=> $request->input('City'),
   'Area'=> $request->input('Area'),
 'hobby'=>$request->input('hobby'),
 'Bio' =>$request->input('Bio'),
 'registered_at'=>$registered_at->created_at
]);
$more->save();

return "Data Inserted Successfully";



    }

//user_more_infos table update
         public function updateinfo(Request $request){


  $id=Auth::id();

  //calcuating Age
  $dob = $request->input('dob');

 $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $age = $dobObject->diff($nowObject);

 $userinfo=DB::table('user_more_infos')->where('id','like',$id)->update([

    'id'=>$id,
   'image'=> $request->input('image'),
 'dob'=>$request->input('dob'),
 'age'=>$age->format("%y"),
  'sex'=>$request->input('sex'),
'edu_degree'=>$request->input('edu_degree'),
  'edu_subject'=> $request->input('edu_subject'),
   'contact'=> $request->input('contact'),
 'religion'=>$request->input('religion'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'occupation'=> $request->input('occupation'),
   'Country'=> $request->input('Country'),
   'City'=> $request->input('City'),
   'Area'=> $request->input('Area'),
 'hobby'=>$request->input('hobby'),
 'Bio' =>$request->input('Bio')
]);






    }

//inserting user prefernce of partner into preference table
public function preference(Request $request){

 $id=Auth::id();
 $preference=new preference([

    'id'=>$id,
   'occupation'=> $request->input('occupation'),
   'edu_degree'=>$request->input('edu_degree'),
 'age_from'=>$request->input('age_from'),
 'age_to'=>$request->input('age_to'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'City'=> $request->input('City'),
]);

 $preference->save();

}
//updating user prefernce of partner into preference table
public function updatepreference(Request $request){

 $id=Auth::id();
 $updatepreference=DB::table('preferences')->where('id','like',$id)->update([

    'id'=>$id,
   'occupation'=> $request->input('occupation'),
 'age_from'=>$request->input('age_from'),
 'age_to'=>$request->input('age_to'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'City'=> $request->input('City'),
]);

 

}



//user verification by email via personal_access_token created in registration function

    public function verifyUser(Request $request, $token)
    {
        $token_info = \DB::table('personal_access_tokens')->select("*")
            ->where('token', $token)->first();
        User::where('id', $token_info->tokenable_id)->update([
           'email_verified_at' => Carbon::now()
        ]);
        \DB::table('personal_access_tokens')->where('token', $token_info->token)->delete();
    }
//match by occupation
public function matchoccupation()
{
    $id = Auth::id();
    $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();
    $find = DB::table('preferences')
            ->where('id','like',$id)
           
            ->select('occupation')
            ->first();
            
    $occupation = DB::table('user_more_infos')
            ->where('occupation','like',$find->occupation)
            ->whereNotIn('id', [$id])
            ->whereNotIn('sex',[$sex->sex])
            ->select('id')
            ->get();
      

         return $occupation;
        
   
}
//match by education
public function matchedu()
{
    $id = Auth::id();
    $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();

    $find = DB::table('preferences')
            ->where('id','like',$id)
            
            ->select('edu_degree')
            ->first();
            
    $edu_degree = DB::table('user_more_infos')
            ->where('edu_degree','like',$find->edu_degree)
            ->whereNotIn('id', [$id])
            ->whereNotIn('sex',[$sex->sex])
            ->select('id')
            ->get();
  
          return $edu_degree;

        
    
}

//match by location (city)

public function matchlocation()
{
    $id = Auth::id();
     
    $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();

    $find = DB::table('preferences')
            ->where('id','like',$id)
            
            ->select('City')
            ->first();
            
    $location = DB::table('user_more_infos')
            ->where('City','like',$find->City)
            ->whereNotIn('id', [$id])
            ->whereNotIn('sex',[$sex->sex])
            ->select('id')
            ->get();
            
    return $location;
}
//match by profession, education and location
public function match(){

$id = Auth::id();
    $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();

    $findoccupation = DB::table('preferences')
            ->where('id','like',$id)
            
            ->select('occupation')
            ->first();

    $findedu = DB::table('preferences')
            ->where('id','like',$id)
            
            ->select('edu_degree')
            ->first();

    $findlocation = DB::table('preferences')
            ->where('id','like',$id)
            
            ->select('City')
            ->first();
    $match = DB::table('user_more_infos')
            ->where('occupation','like',$findoccupation->occupation)
            ->whereIn('edu_degree',[$findedu->edu_degree])
            ->whereNotIn('sex',[$sex->sex])
            ->whereIn('City',[$findlocation->City])
            ->whereNotIn('id', [$id])
            ->select('id')
            ->get();
      

         return $match;
        


}


//people who registered in last 7 days

public function justjoined(){

$id=Auth::id();

 $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();
   $match = DB::table('user_more_infos')
            ->where('registered_at','>=',Carbon::now()->subdays(7))
            ->whereNotIn('sex',[$sex->sex])
            ->select('name')
            ->get();


return "Just joined:" . $match ;


}
public function viewprofile(){


   $id=Auth::id();
    

      
      return "Basic Information:"."\n".Auth::user()."\n"."Personal Information:" ."\n".userMoreInfo::find($id)."\n". "Preference:"."\n".preference::find($id) ;
   


       
     
    
}


public function adminReg(Request $request){

$admin= admin::create([

     'name'=> $request-> input('name'),
     'email'=> $request-> input('email'),
     'password'=>Hash::make( $request-> input('password'))
     


    ]);


  

}


public function payment(Request $request){
    
    $request-> validate([
        
        'offer_id'=>'required',
        'cname'=>'required',
        'ccnum'=>'required|max:16',
        'expmonth'=>'required',
        'expyear'=>'required',
        'cvv'=>'required',
        
        ]);
       
       $id=Auth::id();
       $name=DB::table('users')->where('id','like',$id)->select('name')->first();
       $payment=DB::table('membership_payment')->insert([
         'name'=> $name->name,     
        'offer_id'=>$request->input('offer_id'),
        'cname'=>$request->input('cname'),
        'ccnum'=>$request->input('ccnum'),
        'expmonth'=>$request->input('expmonth'),
        'id'=>$id,
        'expyear'=>$request->input('expyear'),
        'cvv'=>$request->input('cvv'),
               
               ]);}

 

}
