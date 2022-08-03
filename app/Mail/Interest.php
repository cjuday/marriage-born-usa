<?php

namespace App\Mail;
use App\Models\User;
use DB;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Interest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user  = DB::table('interest')->orderBy('id','desc')->first();

        $by = User::find($user->uby);
        $to = User::find($user->uto);



        return $this->view('interests')->with('by',$by)->to($to->email);
    }
}
