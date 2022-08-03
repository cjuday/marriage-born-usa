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
use App\Models\Payments;

class webController extends Controller
{
    //admin
    public function loginform(){
        
        return view('admin.login');
    }
    //admin
    public function loginadmin(Request $request)
    {
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
      {
        return redirect(route('admin.dashboard'));
      }else{
        return redirect()->back()->withErrors(['approve' => 'Invalid password or email.']);
      }
    }
   // admin
   
    public function registeradmin(Request $request){
        
        
        $admin= admin::create([

     'name'=> $request-> input('name'),
     'email'=> $request-> input('email'),
     'password'=>Hash::make( $request-> input('password'))
     


    ]);
    
    return view('admin.loginadmin');

    }
    
    public function adminlogout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('admin.loginform');
}
 //dashboard view
 
 
 public function dashboard()
 {
     $c = User::count();
     $mc = DB::table('membership_payment')->where('status','Reviewed and Accepted')->count();
     $pc = DB::table('membership_payment')->where('status','Not Reviewed')->count();
     $pmc = DB::table('pay_details')->count();
     return view('admin.dashboard',['uc'=>$c, 'mc'=>$mc, 'pc'=>$pc, 'pmc'=>$pmc]);
 }
 
    
//admin view user


public function newjoins(){
    
    $user=User::orderBy('id','desc')->paginate(10);
      return view('admin.newjoins', ['user'=>$user]);
}
   
   
//admin delete user


   public function delete($id){
    
         $deleteUser = User::findOrFail($id)->delete();
         $deleteMore = userMoreInfo::findOrFail($id)->delete();
         $deletePreference = preference::findOrFail($id)->delete();
$user=DB::table('user_more_infos')->select('id','name','contact')->paginate(10);
      return view('admin.newjoins', ['user'=>$user]);

   }
   
   
   
   //admin view user profile
   
   public function viewuser($id){
    
$basic = DB::table('users')->where('id','like',$id)->select('*')->get();
         $more =DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
         $user =DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
         $preference = DB::table('preferences')->where('id','like',$id)->select('*')->get();
      return view('admin.viewuser', ['basic'=>$basic, 'more'=>$more, 'user'=>$user,  'preference'=>$preference]);
}

//admin view packages


public function upgradeview(){

$upgrade=DB::table('membership_offer')->select('*')->get();
$grade=DB::table('membership_offer')->select('*')->get();
$rade=DB::table('membership_offer')->select('*')->get();
  return view('admin.viewpackages',['upgrade'=>$upgrade, 'grade'=>$grade, 'rade'=>$rade]);


}


//admin view offer form page
public function viewofferForm(){
    $package=DB::table('membership_offer')->select('*')->get();
    return view('admin.offers',['package'=>$package]);
}
public function updateofferForm(){
    $package=DB::table('membership_offer')->select('*')->get();
    return view('admin.updatepackages',['package'=>$package]);
}

//admin update offer

public function updateOffers(Request $request){
    
    $request->validate([
        
        'offer_name'=>'required|string|max:300',
        'features'=>'required|string|max:300',
        'amount'=>'required',
        'duration'=>'required',
        
        ]);
      $offer_name = $request->input('offer_name');  
        
      $find = DB::table('membership_offer')->where('offer_name','like',$offer_name)->first();
      
   if (!$find) {
       $insert= DB::table('membership_offer')->insert([
    'offer_name' => $offer_name,
    'features' => $request->input('features'),
    'amount' => $request->input('amount'),
    'duration'=>$request->input('duration')
    
]);
    } else {
        
        
         $update=DB::table('membership_offer')->where('offer_name','like',$offer_name)->update([
             
             'offer_name' => $offer_name,
              'features' => $request->input('features'),
    'amount' => $request->input('amount'),
    'duration'=>$request->input('duration')

    
]);
       
    } 
    
    return redirect(route('admin.viewpackages'))->with('success','Package Created Successfully.');
    
}


//admin upgrade request

public function viewupgraderequest(){
    
    
       
   
    $request=DB::table('membership_payment')->where('status','Not Reviewed')->orderBy('id','desc')->select('*')->get();
    
    
    return view('admin.request',['request'=>$request]);
    
}

//view payment Details

public function paymentDetails($id){
   
  $basic = DB::table('membership_payment')->where('memid','like',$id)->select('*')->get();
    
    
    return view('admin.paymentdetails',['basic'=>$basic]);
    
}


//Accept
public function statusAccept($id){
    $x = DB::table('membership_payment')->where('memid',$id)->first();

    $time = time() + mem_time($x->offer_id);
    $timex = mem_time($x->offer_id);

    $u = DB::table('users')->where('id',$x->id)->first();
    $y = mem_lim($x->offer_id);

    $cr = time(); 

    if($u->mem_exp > $cr)
    {
      DB::table('users')->where('id',$x->id)->update([
        'mem_exp'=>$u->mem_exp + $timex,
        'pkg'=>$x->offer_id,
        'ints'=>$u->ints+$y,
        'em'=>$u->em+$y,
        'ph'=>$u->ph+$y,
        'cnt'=>$u->cnt+$y
      ]);
    }else{
      DB::table('users')->where('id',$x->id)->update([
        'mem_exp'=>$time,
        'pkg'=>$x->offer_id,
        'ints'=>$u->ints+$y,
        'em'=>$u->em+$y,
        'ph'=>$u->ph+$y,
        'cnt'=>$u->cnt+$y
      ]);
    }
    
    $accept=DB::table('membership_payment')->where('id','like',$id)->update([
        'status'=>'Reviewed and Accepted'
        ]);
    $message="Successfully Accepted.";    
        
        $request=DB::table('membership_payment')->select('*')->get();
    
    
    return view('admin.request',['request'=>$request]);
      
    
}

//Decline

public function statusDecline($id){
    
    $accept=DB::table('membership_payment')->where('id','like',$id)->update([
        'status'=>'Reviewed and Declined'
        ]);
        
        $request=DB::table('membership_payment')->select('*')->get();
    
    
    return view('admin.request',['request'=>$request]);  
    
}

//view members
public function viewmembers(){
    
    $status="Reviewed and Accepted";
     $request=DB::table('membership_payment')->where('status','like',$status)->select('*')->get();
    
    
    return view('admin.members',['request'=>$request]);
    
    
    
}

//Websetting
  
  public function logoform(){
    $x = DB::table('websetting')->where('id','1')->value('image');
    return view('admin.logo')->with('x',$x);
    
  }
  
  public function logo(Request $request){  
   
  $this->validate($request,[
    'image' => 'required|mimes:jpeg,jpg,png|max:2048']);
$image = $request->file('image');
$new_name = 'logo'. '.' . $image->getClientOriginalExtension();
$image->move(public_path("images"),$new_name);
    
$find=DB::table('websetting')->select('image')->first();
if(!$find){
   
$insert=DB::table('websetting')->insert([
'image' => $new_name
]);
return redirect()->back()->withSuccess('Successfully Updated!');
}//if

else{

$update=DB::table('websetting')->update([
'image' => $new_name
]);

return redirect()->back()->withSuccess('Successfully Updated!');
}//else
    
  }//logo ends
  
  
  //footer starts
  public function footerform(){
    
    return view('admin.footer');
  }
  
  public function footer(Request $request){
    
    $request->validate([
      
      'footer'=>'required|max:300',
      
    ]);
    
    
        
$find=DB::table('websetting')->select('footer')->first();
if(!$find){
   
$insert=DB::table('websetting')->insert([
'footer' => $request->input('footer'),
]);
return redirect()->back()->withSuccess('Successfully Updated!');
}//if

else{

$update=DB::table('websetting')->update([
'footer' => $request->input('footer'),
]);

return redirect()->back()->withSuccess('Successfully Updated!');
}//else
    
    
  }
  //footer ends
  
  //edit meta tags
  public function metaform(){
      
      return view('admin.meta');
  }
  
  public function meta(Request $request){
      
      $request->validate([
          
              'meta'=>'required|max:300',
              
                        ]);
                        
      $find=DB::table('websetting')->select('meta')->first();
      
      if(!$find){
          
          $insert=DB::table('websetting')->insert([
              
              'meta'=>$request->input('meta'),
              
              ]);
              
              return redirect()->back()->withSuccess('Successfully Updated!');
      }//if
      
      else{
          
          $update=DB::table('websetting')->update([
              
              
              'meta'=>$request->input('meta'),
              
              
              ]);
              
              return redirect()->back()->withSuccess('Successfully Updated!');
      }//else
      
  }
  //meta tag ends
  
    //edit title
  public function titleform(){
    $dt = DB::table('websetting')->where('id','1')->first();
      
      return view('admin.title')->with('x',$dt);
  }
  
  public function title(Request $request){
      
      $request->validate([
        'title'=>'required',
        'meta'=>'required',
        'footer'=>'required'
      ]);
                        
          
          DB::table('websetting')->update([
            'title'=>$request->input('title'),
            'meta'=>$request->input('meta'),
            'footer'=>$request->input('title')
          ]);
              
      return redirect()->back()->withSuccess('Successfully Updated!');
  }
  
   
    
    //not admin
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
   'street'=>$request->input('street'),
   'zip'=>$request->input('zip'),

 'registered_at'=>$id->created_at
]);

$more->save();

DB::table('preferences')->insert([
  'id'=>$id->id
]);


//creating token and email verification
$user->createToken('my_app_token')->plainTextToken;
\Mail::send(new userRegistration());
 $id=DB::table('users')->where('email','like',$email)->select('id')->first();
  $user=DB::table('user_more_infos')->where('id','like',$id->id)->select('*')->get();
  return redirect(route('user.login'))->with('success','Profile created successfully.');

   }

   //User login (not Admin)

   public function login(Request $request){

  $validatedData = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
{

$email=$request->input('email');
   $id=DB::table('users')->where('email','like',$email)->select('id')->first();
  $user=DB::table('user_more_infos')->where('id','like',$id->id)->select('*')->get();
      return redirect(route('user.userdash'))->with(['user'=>$user]);

    }
        else{
       
 return redirect()->back()->withErrors([
        'approve' => 'Invalid password or email.',
    ]);
  


        }

   }
     public function viewlog(){


    	return view("user.login");
    }
     public function viewreg(){


    	return view("user.userregister");
    }

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('user.login');
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

public function welcome(){
 return view('welcome');
 
}

public function paymethod(){
  $all=Payments::all();
  return view('admin.paymethod')->with('request',$all);
  
 }

 public function editpay($id){
  $all=Payments::find($id);
  return view('admin.editpay')->with('request',$all);
  
 }

 public function addpay(){
  return view('admin.addpay');
  
 }

 public function addpayments(Request $request)
 {
   $name = $request->name;
   $inst = $request->inst;
   $f1 = $request->field1;
   $f2 = $request->field2;
   $f3 = $request->field3;
   $f4 = $request->field4;
   $f5 = $request->field5;

   Payments::create([
     'name'=>$name,
     'instructions'=>$inst,
     'form_1'=>$f1,
     'form_2'=>$f2,
     'form_3'=>$f3,
     'form_4'=>$f4,
     'form_5'=>$f5
   ]);
   return back()->with('success','Payment Method Added Successfully.');
 }

 public function editpayments(Request $request)
 {
   $id = $request->id;
   $name = $request->name;
   $inst = $request->inst;
   $f1 = $request->field1;
   $f2 = $request->field2;
   $f3 = $request->field3;
   $f4 = $request->field4;
   $f5 = $request->field5;

   Payments::where('id',$id)->update([
     'name'=>$name,
     'instructions'=>$inst,
     'form_1'=>$f1,
     'form_2'=>$f2,
     'form_3'=>$f3,
     'form_4'=>$f4,
     'form_5'=>$f5
   ]);
   return back()->with('success','Payment Method Edited Successfully.');
 }

 public function deletepay($id)
 {
   Payments::find($id)->delete();
   return back()->with('success','Payment method deleted successfully');
 }

 public function editoff($id){
  $all=DB::table('membership_offer')->where('offer_id',$id)->first();
  return view('admin.editoff')->with('request',$all);
  
 }

 public function updateOff(Request $request){
    
  $request->validate([
      'offer_name'=>'required|string|max:300',
      'features'=>'required|string|max:300',
      'amount'=>'required',
      'duration'=>'required',
      'id'=>'required'
      ]);
      
      
       $update=DB::table('membership_offer')->where('offer_id',$request->id)->update([
        'offer_name' => $request->offer_name,
        'features' => $request->input('features'),
        'amount' => $request->input('amount'),
        'duration'=>$request->input('duration')
      ]);
  
  return redirect(route('admin.viewpackages'))->with('success','Package Updated Successfully.');
  
}


public function deloff($id)
{
  DB::table('membership_offer')->where('offer_id',$id)->delete();
  return back()->with('success','Package deleted successfully');
}

public function denied(){
  $status="Reviewed and Declined";
  $request=DB::table('membership_payment')->where('status','like',$status)->select('*')->get();
  return view('admin.denied',['request'=>$request]);
}

public function phistory(){
  $request=DB::table('membership_payment')->orderBy('id','desc')->select('*')->paginate(20);
  return view('admin.history',['request'=>$request]);
}

public function verify(){
  $request=DB::table('verification')->join('users','users.id','=','verification.user')->where('users.verified','!=','2')->orderBy('verification.id','desc')->select('*')->paginate(20);
  return view('admin.verify',['request'=>$request]);
}

public function acceptver($id)
 {
   DB::table('users')->where('id',$id)->update(['verified'=>2]);
   return back()->with('success','User verified successfully');
 }

 public function denyver($id)
 {
   DB::table('users')->where('id',$id)->update(['verified'=>0]);
   DB::table('verification')->where('user',$id)->delete();
   return back()->with('success','User verifications rejected successfully');
 }

}
