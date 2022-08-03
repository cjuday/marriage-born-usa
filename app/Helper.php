<?php
use App\Models\admin;
use App\Models\User;

function get_admin_name($id)
{
    return admin::find($id)->name;
}

function get_contact($id)
{
    $con = DB::table('user_more_infos')->where('id',$id)->value('contact');

    if($con)
    {
        return $con;
    }else{
        return "Not specified.";
    }
}

function get_pname($id)
{
    return DB::table('pay_details')->where('id',$id)->value('name');
}

function form1($id)
{
    return DB::table('pay_details')->where('id',$id)->value('form_1');
}

function form2($id)
{
    return DB::table('pay_details')->where('id',$id)->value('form_2');
}

function form3($id)
{
    return DB::table('pay_details')->where('id',$id)->value('form_3');
}

function form4($id)
{
    return DB::table('pay_details')->where('id',$id)->value('form_4');
}

function form5($id)
{
    return DB::table('pay_details')->where('id',$id)->value('form_5');
}

function pdet($id)
{
    return DB::table('membership_offer')->where('offer_id',$id)->first();
}

function is_mem($id)
{
    $time = time();
    $dt = DB::table('users')->where([['id',$id],['mem_exp','>',$time]])->count();

    if($dt>0)
    {
        return 1;
    }else{
        return 0;
    }
}

function get_email($id)
{
    return DB::table('users')->where('id',$id)->value('email');
}

function get_unm($id)
{
    return DB::table('users')->where('id',$id)->value('name');
}

function is_ints($id)
{
    $by = Auth::id();
    $data = DB::table('interest')->where([['uby',$by],['uto',$id]])->count();

    if($data>0)
    {
        return 1;
    }else{
        return 0;
    }
}

function mem_time($pkg)
{
    if($pkg==1)
    {
        $time = 30;
    }else if($pkg==2)
    {
        $time = 90;
    }else if($pkg==3){
        $time = 180;
    }else if($pkg==4)
    {
        $time = 365;
    }

    $sec = $time * 24 * 60 *60;
    return $sec;
}

function mem_lim($pkg)
{
    if($pkg==1)
    {
        $time = 30;
    }else if($pkg==2)
    {
        $time = 100;
    }else if($pkg==3){
        $time = 200;
    }else if($pkg==4)
    {
        $time = 500;
    }

    return $time;
}

function udata($id)
{
    return User::find($id);
}

function get_pkname($id)
{
    return DB::table('membership_offer')->where('offer_id',$id)->value('offer_name');
}

function is_revem($id)
{
    $by = Auth::id();
    $data = DB::table('emailview')->where([['uby',$by],['uto',$id]])->count();

    if($data>0)
    {
        return 1;
    }else{
        return 0;
    }
}

function is_revph($id)
{
    $by = Auth::id();
    $data = DB::table('phnview')->where([['uby',$by],['uto',$id]])->count();

    if($data>0)
    {
        return 1;
    }else{
        return 0;
    }
}

function verified($id)
{
    $x = User::find($id);

    if($x->verified==0)
    {
        return 0;
    }else if($x->verified==1)
    {
        return 1;
    }else{
        return 2;
    }
}

function unread_count($i, $d)
{
    $x = DB::table('msgs')->where([['uby',$i],['uto',$d],['seen','0']])->count();

    return $x;
}