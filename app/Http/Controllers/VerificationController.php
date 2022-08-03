<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundtion\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verifed;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
   

use VerifiesEmails;

return [
'message'=>'Verified'

];

}
