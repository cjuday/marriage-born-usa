<?php

namespace App\Http\Controllers;

use App\Mail\Interest;
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

class homeController extends Controller
{
    
    
    public function search(Request $request){
         
         $search= $request->get('search');
         
         $id=Auth::id();

 $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();
       
      $user =DB::table('user_more_infos')->where('occupation', 'like', '%'.$search.'%')->whereNotIn('sex',[$sex->sex])->select('*')->get();
      $userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
  
  return view('user.search',[ 'user' => $user, 'userMoreInfo' => $userMoreInfo]);

 }
        
    
    
    public function index(){
$id= Auth::id();
 $user=DB::table('user_more_infos')->where('id',$id)->select('*')->get();
      return view('user.userdash', ['user'=>$user]);

    }

    public function userprofile(){

$search=Auth::id();
    	 $userMoreInfo = userMoreInfo::select('*')->where('id', 'like', '%'.$search.'%')->get();

    	 $preference = preference::select('*')->where('id', 'like', '%'.$search.'%')->get();
       return view('user.userprofile', [ 'userMoreInfo' => $userMoreInfo, 'preference' => $preference]);
    	
    }

 
   

    public function editprofile(){

        $id=Auth::id();
      $userMoreInfo= DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

    	return view('user.editprofile', ['userMoreInfo' => $userMoreInfo]);
    }

        public function add(){

       $id= Auth::id();
        $preference=DB::table('preferences')->where('id','like',$id)->select('*')->first();
 $userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
      return view('user.editpreference', ['userMoreInfo'=>$userMoreInfo, 'preference'=>$preference]);
    }
    
    public function adpref(){
        
         $id=Auth::id();
      $userMoreInfo= DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

    	return view('user.addpreference', ['userMoreInfo' => $userMoreInfo]);
    }

    public function addpreference(Request $request){

       
$request->validate([
 
   
  
    'edu_degree'=>'required',
 'age_from'=>'required',
 'age_to'=>'required',
 'marital_status'=>'required',
 'spouses'=>'required',
 'offspring'=>'required',
   'occupation'=>'required',
   
   'city'=>'required',
   
]);


 $id=Auth::id();
 $preference=$update=DB::table('preferences')->where('id','like',$id)->updateorInsert([

    'id'=>$id,
   'occupation'=> $request->input('occupation'),
   'edu_degree'=>$request->input('edu_degree'),
 'age_from'=>$request->input('age_from'),
 'age_to'=>$request->input('age_to'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'city'=> $request->input('city'),
]);


$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return view('user.userdash',['user'=>$user]);

    }

    public function update(Request $request){


$request->validate([
 
    'dob'=>'required',
  
    'edu_degree'=>'required',
  'edu_subject'=> 'required',
   'contact'=>'required',
 'religion'=>'required',
 'marital_status'=>'required',
 'spouses'=>'required',
 'offspring'=>'required',
   'occupation'=>'required',
   'Country'=> 'required',
   'City'=>'required',
   'Area'=>'required',
]);

         $id=Auth::id();

  //calcuating Age
  $dob = $request->input('dob');

 $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $age = $dobObject->diff($nowObject);


     
  //Image upload starts

  //image upload ends     

 $userinfo=DB::table('user_more_infos')->where('id','like',$id)->update([

    

 'dob'=>$request->input('dob'),
 'age'=>$age->format("%y"),
  
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

  $id= Auth::id();
 $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return view('user.userdash',['user'=>$user]);


    }
 public function editbasic(){

        $id=Auth::id();
      $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
     

      return view('user.editbasic', ['user' => $user]);
    }


public function basic(Request $request){

$id=Auth::id();
$update=DB::table('users')->where('id','like',$id)->update([

'name'=>$request->input('name'),
'email'=>$request->input('email')

]);
$more=DB::table('user_more_infos')->where('id','like',$id)->update([

'name'=>$request->input('name')

]);
$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Basic Details Updated Successfully.');


}

    public function editedu(){

        $id=Auth::id();
      $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
     

      return view('user.editedu', ['user' => $user]);
    }


     public function edu(Request $request){

$request->validate([
 
    
  
    'edu_degree'=>'required',
  'edu_subject'=> 'required'
  
  ]);


$id=Auth::id();
$update=DB::table('user_more_infos')->where('id','like',$id)->update([

'edu_degree'=>$request->input('edu_degree'),
 
 'edu_subject'=>$request->input('edu_subject')

]);

$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();


return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Educational Details Updated Successfully.');


}


    public function editlocation(){

        $id=Auth::id();
      $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
     

      return view('user.editlocation', ['user' => $user]);
    }


     public function location(Request $request){

$request->validate([
 
    
  
    'City'=>'required',
  'Area'=> 'required'
  
  ]);


$id=Auth::id();
$update=DB::table('user_more_infos')->where('id','like',$id)->update([

'City'=>$request->input('City'),
 
 'Area'=>$request->input('Area')

]);

$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();


return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Location Details Updated Successfully.');


}




    public function editpersonal(){

        $id=Auth::id();
      $userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
     

      return view('user.editpersonal', ['userMoreInfo' => $userMoreInfo]);
    }

    public function personal(Request $request){
        
        
$request->validate([
 
    'dob'=>'required',
  
   
 'religion'=>'required',
 'marital_status'=>'required',
 'spouses'=>'required',
 'offspring'=>'required',
   'occupation'=>'required',
  
]);
        
        
        

$id=Auth::id();
$update=DB::table('user_more_infos')->where('id','like',$id)->update([

'dob'=>$request->input('dob'),
 
 'religion'=>$request->input('religion'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'hobby'=>$request->input('hobby'),
 'Bio' =>$request->input('Bio')

]);

$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Personal Details Updated Successfully.');


}
 
 public function justjoined(){


  $id=Auth::id();

 $sex=DB::table('user_more_infos')
         ->where('id','like',$id)
         ->select('sex')
         ->first();
   $match = DB::table('user_more_infos')
            ->where('registered_at','>=',Carbon::now()->subdays(7))
            ->whereNotIn('sex',[$sex->sex])
            ->select('*')
            ->get();


$userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
  
  return view('user.justjoined',[ 'match' => $match, 'userMoreInfo' => $userMoreInfo]);
 }

 public function photoupdate(){

 $id= Auth::id();
 $userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
      return view('user.photo', ['userMoreInfo'=>$userMoreInfo]);

}

public function image(Request $request){




$id=Auth::id();
$this->validate($request,[
    'image' => 'required|image|mimes:jpeg,jpg,png|max:2048']);
$image = $request->file('image');
$new_name = rand() . '.' . $image->getClientOriginalExtension();
$image->move("images",$new_name);
$more=userMoreInfo::where('id', $id)
     ->update(["image" => $new_name]);
$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Photo Updated Successfully.');
}


public function preference(Request $request){


$request->validate([
 
   
  
    'edu_degree'=>'required',
 'age_from'=>'required',
 'age_to'=>'required',
 'marital_status'=>'required',
 'spouses'=>'required',
 'offspring'=>'required',
   'occupation'=>'required',
   
   'city'=>'required',
   
]);


 $id=Auth::id();
 $preference=$update=DB::table('preferences')->where('id','like',$id)->update([

    'id'=>$id,
   'occupation'=> $request->input('occupation'),
   'edu_degree'=>$request->input('edu_degree'),
 'age_from'=>$request->input('age_from'),
 'age_to'=>$request->input('age_to'),
  'marital_status'=>$request->input('marital_status'),
  'spouses'=> $request->input('spouses'),
  'offspring'=> $request->input('offspring'),
   'city'=> $request->input('city'),
]);


$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

return view('user.userdash',['user'=>$user]);

}


public function contact(){

  return view('user.contactform');
}


public function upgradeview(){
    
  $id=Auth::id();

$userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();



$upgrade=DB::table('membership_offer')->select('*')->get();
$grade=DB::table('membership_offer')->select('*')->get();
$rade=DB::table('membership_offer')->select('*')->get();
$package=DB::table('membership_offer')->select('*')->get();

$pay = Payments::all();
  return view('user.upgrade',['upgrade'=>$upgrade, 'grade'=>$grade, 'rade'=>$rade,'userMoreInfo'=>$userMoreInfo,'package'=>$package,'pay'=>$pay]);


}

public function card(){
      $id=Auth::id();
      $m = $_GET['m'];

$userMoreInfo=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
    $upgrade=DB::table('membership_offer')->select('*')->get();
    $package=DB::table('membership_offer')->select('*')->get();
    $det = Payments::find($m);
    return view('user.card',['upgrade'=>$upgrade,'package'=>$package,'userMoreInfo'=>$userMoreInfo,'det'=>$det]);
}

public function payment(Request $request){
    $request-> validate([
        'offer_id'=>'required'
        ]);
       
       $id=Auth::id();
       $name=DB::table('users')->where('id','like',$id)->select('name')->first();
       $payment=DB::table('membership_payment')->insert([
         'id'=>$id,
         'name'=> $name->name,     
        'offer_id'=>$request->input('offer_id'),
        'cname'=>$request->input('form1'),
        'ccnum'=>$request->input('form2'),
        'expmonth'=>$request->input('form3'),
        'cvv'=>$request->input('form4'),
        'form_5'=>$request->input('form5'),
        'payt'=>$request->payt
               
               ]);
        
 $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();



 return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Upgrade Request Sent Successfully.');     
    
    
    
}


//Match

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
      
    $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
         return view('user.matchoccu',['occupation'=>$occupation,'user'=>$user]);
        
   
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
    $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
          return view('user.matchedu',['edu_degree'=>$edu_degree, 'user'=>$user]);

        
    
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
    
    $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();        
    return view('user.matchloc',['location'=>$location, 'user'=>$user]);
}
//match by profession, education and location
public function match(){

$id = Auth::id();
$ex = DB::table('preferences')
->where([['id',$id],['occupation','!=','NULL'],['age_from','!=','NULL'],['age_to','!=','NULL']])
->count();
    if($ex>0)
    {
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
            ->select('*')
            ->get();
      
    $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
         return view('user.match',['match'=>$match, 'user'=>$user]);
    }else{
      return back()->with('error','Update preferences first to get matches.');
    }


}
//end of match

public function editcontact(){

  $id=Auth::id();
$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();


return view('user.editcontact', ['user' => $user]);
}


public function contactdet(Request $request){

$request->validate([



'City'=>'required'

]);


$id=Auth::id();
$update=DB::table('user_more_infos')->where('id','like',$id)->update([

'contact'=>$request->input('City'),

]);

$user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();


return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Contact Details Updated Successfully.');


}

public function viewprof($id)
{
   $user=DB::table('user_more_infos')->where('id',$id)->select('*')->get();
        return view('user.viewprof', ['user'=>$user]);
  
}

public function sendint($id)
{
  $by = Auth::id();
  $to = $id;

  $dt = User::find($by);
  if(is_mem($by))
  {
    if($dt->ints>0)
    {
  DB::table('interest')->Insert([
    'uby'=>$by,
    'uto'=>$to
  ]);

  DB::table('users')->where('id',$by)->update([
    'ints'=>$dt->ints-1
  ]);
  
\Mail::send(new Interest());

  return back()->with('success','Interest Sent Successfully.');
    }else{
      return back()->with('error','No interest left to send.');
    }
  }else{
    return back()->with('error','You need to upgrade membership to send interest.');
  }
}

public function seemail($id)
{
  $by = Auth::id();
  $to = $id;

  $dt = User::find($by);
  if(is_mem($by))
  {
    if($dt->em>0)
    {
  DB::table('emailview')->Insert([
    'uby'=>$by,
    'uto'=>$to
  ]);

  DB::table('users')->where('id',$by)->update([
    'em'=>$dt->em-1
  ]);

  return back()->with('success','Email Revealed Successfully.');
    }else{
      return back()->with('error','No reveal left to see email.');
    }
  }else{
    return back()->with('error','You need to upgrade membership to see email.');
  }
}

public function seephn($id)
{
  $by = Auth::id();
  $to = $id;

  $dt = User::find($by);
  if(is_mem($by))
  {
    if($dt->ph>0)
    {
  DB::table('phnview')->Insert([
    'uby'=>$by,
    'uto'=>$to
  ]);

  DB::table('users')->where('id',$by)->update([
    'ph'=>$dt->ph-1
  ]);

  return back()->with('success','phone Number Revealed Successfully.');
    }else{
      return back()->with('error','No reveal left to see phone number.');
    }
  }else{
    return back()->with('error','You need to upgrade membership to see phone number.');
  }
}

public function notif()
{
  $id = Auth::id();
  $userMoreInfo =DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
  $dt =  DB::table('interest')->Where('uto',$id)->orderBy('id','desc')->get();

  return view('user.notif')->with('dt',$dt)->with('userMoreInfo',$userMoreInfo);
}

public function verify(){
  $id= Auth::id();
   $user=DB::table('user_more_infos')->where('id',$id)->select('*')->get();
        return view('user.verify', ['user'=>$user]);
  
      }

      public function vfile(Request $request){
        $id=Auth::id();
        $this->validate($request,[
            'image' => 'required',
            'type' => 'required']);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move("files",$new_name);
        DB::table('verification')->insert([
          'user'=>$id,
          'file'=>$new_name,
          'type'=>$request->type
        ]);

        DB::table('users')->where('id',$id)->update(['verified'=>'1']);
        
    $user=DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();
        return redirect(route('user.userdash'))->with(['user'=>$user])->with('success','Profile Verification Requested Successfully.');
        }

        
 public function msgs()
 {
   $id = Auth::id();
   $x = DB::table('cnt')->orWhere('uto',$id)->orderBy('id','desc')->get();
   $userMoreInfo =DB::table('user_more_infos')->where('id','like',$id)->select('*')->get();

   return view('user.msgs')->with('x',$x)->with('userMoreInfo',$userMoreInfo);
 }

 public function sendmsg($id)
 {
   $by = Auth::id();
   $dt = User::find($by);
   if(is_mem($by))
   {
     if($dt->cnt>0)
     {
  $userMoreInfo =DB::table('user_more_infos')->where('id','like',$by)->select('*')->get();
  $userMoreInfo2 =DB::table('user_more_infos')->where('id','like',$id)->select('*')->first();
  $x = DB::table('msgs')->where([['uby',$by],['uto',$id]])->orWhere([['uby',$id],['uto',$by]])->orderBy('id','desc')->get();
  $xx = DB::table('cnt')->where([['uby',$by],['uto',$id]])->count();
  if($xx==0)
  {
    DB::table('cnt')->Insert([
      'uby'=>$by,
      'uto'=>$id
    ]);

    DB::table('users')->where('id',$by)->update([
      'cnt'=>$dt->cnt-1
    ]);
  }

  
  DB::table('msgs')->where([['uby',$id],['uto',$by]])->update(['seen'=>'1']);
   return view('user.sendmsg')->with('x',$x)->with('userMoreInfo',$userMoreInfo)->with('userMoreInfo2',$userMoreInfo2);
  }else{
    return back()->with('error','No limit left to send messages.');
  }
}else{
  return back()->with('error','You need to upgrade membership to send messages.');
}
 }

 public function msgsent(Request $request)
 {
   $by = Auth::id();
   $to = $request->to;
   $text = $request->text;

   DB::table('msgs')->insert([
     'uby'=>$by,
     'uto'=>$to,
     'content'=>$text
   ]);
   
   return back();
 }
}
