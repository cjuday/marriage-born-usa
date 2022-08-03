<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class userMoreInfo extends Model
{


    use HasApiTokens, HasFactory, Notifiable;

   


 protected $fillable = [
          'id','name','image','dob','age','sex','edu_degree','edu_subject','contact','religion','marital_status','spouses','offspring','occupation','Country','City','Area','hobby','Bio','registered_at','street','zip'
    ];

}
