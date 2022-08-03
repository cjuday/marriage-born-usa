<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preference extends Model
{
    use HasFactory;

 protected $fillable = [
          'id','occupation','edu_degree','age_from','age_to','marital_status','spouses','offspring','City'
    ];

}