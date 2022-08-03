<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'pay_details';

    protected $fillable = ['name','instructions','form_1','form_2','form_3','form_4','form_5'];
}
