<?php

use Illuminate\Support\Facades\Route;
use App\Models\admin;
use App\Models\userMoreInfo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes Starts
|--------------------------------------------------------------------------
*/

Route::get('admin.loginform', [App\Http\Controllers\webController::class,'loginform'] )->name('admin.loginform');

Route::post('admin.loginadmin', [App\Http\Controllers\webController::class,'loginadmin'] )->name('admin.loginadmin');

Route::get('admin.logout', [App\Http\Controllers\webController::class,'adminlogout'])->name('admin.logout');

Route::get('admin.registerform', [App\Http\Controllers\webController::class,'registerform'] )->name('admin.registerform');

Route::post('admin.registeradmin', [App\Http\Controllers\webController::class,'registeradmin'] )->name('admin.registeradmin');

Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'admin'], function() {
    Route::get('admin.dashboard',[App\Http\Controllers\webController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin.newjoins', [App\Http\Controllers\webController::class,'newjoins'] )->name('admin.newjoins');
        Route::get('admin.offers', [App\Http\Controllers\webController::class,'viewofferForm'] )->name('admin.offers');
        Route::get('admin.updatepackages', [App\Http\Controllers\webController::class,'updateofferForm'] )->name('admin.updatepackages');
        
      Route::post('admin.updateOffers', [App\Http\Controllers\webController::class,'updateOffers'] )->name('admin.updateOffers');
      Route::post('admin.updateOff', [App\Http\Controllers\webController::class,'updateOff'] )->name('admin.updateOff');
      
  Route::get('admin.newjoins/{id}/delete',[App\Http\Controllers\webController::class, 'delete'])->name('admin.delete');
    Route::get('admin.newjoins/{id}/viewuser',[App\Http\Controllers\webController::class, 'viewuser'])->name('admin.viewuser');
    Route::get('admin.viewpackages', [App\Http\Controllers\webController::class,'upgradeview'])->name('admin.viewpackages');
    Route::get('admin.upgraderequest',[App\Http\Controllers\webController::class,'viewupgraderequest'])->name('admin.upgraderequest');
     Route::get('{id}/admin.paymentDetails',[App\Http\Controllers\webController::class,'paymentDetails'])->name('admin.paymentDetails');
    Route::get('admin.paymentDetails/{id}/statusDecline',[App\Http\Controllers\webController::class,'statusDecline'])->name('admin.statusDecline');
     Route::get('admin.paymentDetails/{id}/statusAccept',[App\Http\Controllers\webController::class,'statusAccept'])->name('admin.statusAccept');
        Route::get('admin.members',[App\Http\Controllers\webController::class,'viewmembers'])->name('admin.members');
        Route::get('admin.denied',[App\Http\Controllers\webController::class,'denied'])->name('admin.denied');
        Route::get('admin.phistory',[App\Http\Controllers\webController::class,'phistory'])->name('admin.history');
        //payment
        Route::get('admin.paymethod',[App\Http\Controllers\webController::class,'paymethod'])->name('admin.paymethod');
        Route::get('admin.addpay',[App\Http\Controllers\webController::class,'addpay'])->name('admin.addpay');
        Route::post('admin.addpayments', [App\Http\Controllers\webController::class,'addpayments'] )->name('admin.addpayments');
        Route::get('admin.editpay/{id}',[App\Http\Controllers\webController::class,'editpay'])->name('admin.editpay');
        Route::get('admin.editoff/{id}',[App\Http\Controllers\webController::class,'editoff'])->name('admin.editoff');
        Route::get('admin.deleteoffer/{id}',[App\Http\Controllers\webController::class,'deloff'])->name('admin.deloffer');
        Route::post('admin.editpayments', [App\Http\Controllers\webController::class,'editpayments'] )->name('admin.editpayments');
        Route::get('admin.deletepay/{id}',[App\Http\Controllers\webController::class,'deletepay'])->name('admin.deletepay');
        
        Route::get('websetting.logoform',[App\Http\Controllers\webController::class, 'logoform'])->name('websetting.logoform');
        Route::post('websetting.logo',[App\Http\Controllers\webController::class, 'logo'])->name('websetting.logo');

        Route::get('websetting.footerform',[App\Http\Controllers\webController::class, 'footerform'])->name('websetting.footerform');
        Route::post('websetting.footer',[App\Http\Controllers\webController::class, 'footer'])->name('websetting.footer');
        
        Route::get('websetting.metaform',[App\Http\Controllers\webController::class, 'metaform'])->name('websetting.metaform');
        Route::post('websetting.meta',[App\Http\Controllers\webController::class, 'meta'])->name('websetting.meta');
        
        Route::get('websetting.titleform',[App\Http\Controllers\webController::class, 'titleform'])->name('websetting.titleform');
        Route::post('websetting.title',[App\Http\Controllers\webController::class, 'title'])->name('websetting.title');

        
        Route::get('admin.verify',[App\Http\Controllers\webController::class,'verify'])->name('admin.verify');
        Route::get('admin.acceptver/{id}',[App\Http\Controllers\webController::class,'acceptver'])->name('admin.acceptver');
        Route::get('admin.denyver/{id}',[App\Http\Controllers\webController::class,'denyver'])->name('admin.denyver');
});
/*
|--------------------------------------------------------------------------
| Admin Routes Ends
|--------------------------------------------------------------------------
*/



Route::get('/', function () {
    return view('welcome');
});


Route::post('user.userlogin', [App\Http\Controllers\webController::class,'login'])->name('user.userlogin');
Route::get('login', [App\Http\Controllers\loginController::class,'index'])->name('login');
Route::get('user.login', [App\Http\Controllers\webController::class,'viewlog'])->name('user.login');
Route::get('user.userregister', [App\Http\Controllers\webController::class,'viewreg'])->name('user.userregister');
Route::post('user.register', [App\Http\Controllers\webController::class,'register'])->name('user.register');
Route::get('user.logout', [App\Http\Controllers\webController::class,'logout'])->name('user.logout');
Route::get('welcome', [App\Http\Controllers\webController::class,'welcome'])->name('welcome');

Route::get('user.upgrade', [App\Http\Controllers\homeController::class,'upgradeview']);

Route::get('welcome',[App\Http\Controllers\webController::class,'welcome'])->name('welcome');


Route::group(['middleware' => ['web','auth:users'], 'prefix' => 'users'], function() {
   Route::get('user.search',[App\Http\Controllers\homeController::class, 'search'])->name('user.search');
   
  Route::get('user.userprofile', [App\Http\Controllers\homeController::class,'userprofile'])->name('user.userprofile');
  Route::get('user.editprofile', [App\Http\Controllers\homeController::class,'editprofile'])->name('user.editprofile');
   Route::post('user.update', [App\Http\Controllers\homeController::class,'update'])->name('user.update');
   Route::get('user.userdash',[App\Http\Controllers\homeController::class,'index'])->name('user.userdash');
    Route::get('user.adpref',[App\Http\Controllers\homeController::class,'adpref'])->name('user.adpref');
    Route::get('user.adinfo',[App\Http\Controllers\homeController::class,'add'])->name('user.adinfo');
         Route::post('user.editpreference', [App\Http\Controllers\homeController::class,'preference'])->name('user.editpreference');
     Route::post('user.addpreference', [App\Http\Controllers\homeController::class,'addpreference'])->name('user.addpreference');
       Route::get('user.editbasic',[App\Http\Controllers\homeController::class,'editbasic'])->name('user.editbasic');
     Route::post('user.basic', [App\Http\Controllers\homeController::class,'basic'])->name('user.basic');

Route::get('user.justjoined',[App\Http\Controllers\homeController::class,'justjoined'])->name('user.justjoined');
  Route::get('user.viewprof/{id}',[App\Http\Controllers\homeController::class,'viewprof'])->name('user.viewprof');
      Route::get('user.editpersonal',[App\Http\Controllers\homeController::class,'editpersonal'])->name('user.editpersonal');
     Route::post('user.personal', [App\Http\Controllers\homeController::class,'personal'])->name('user.personal');
   Route::get('user.photo',[App\Http\Controllers\homeController::class,'photoupdate'])->name('user.photo');

    Route::post('user.image', [App\Http\Controllers\homeController::class,'image'])->name('user.image');
 Route::get('user.editlocation',[App\Http\Controllers\homeController::class,'editlocation'])->name('user.editlocation');
     Route::post('user.location', [App\Http\Controllers\homeController::class,'location'])->name('user.location');
     Route::get('user.editcontact',[App\Http\Controllers\homeController::class,'editcontact'])->name('user.editcontact');
         Route::post('user.contact', [App\Http\Controllers\homeController::class,'contactdet'])->name('user.contact');
     
     Route::get('user.editedu',[App\Http\Controllers\homeController::class,'editedu'])->name('user.editedu');
     Route::post('user.edu', [App\Http\Controllers\homeController::class,'edu'])->name('user.edu');
     Route::get('user.upgrade', [App\Http\Controllers\homeController::class,'upgradeview'])->name('user.upgrade');
     Route::post('user.payment', [App\Http\Controllers\homeController::class,'payment'])->name('user.payment');
     Route::get('user.card', [App\Http\Controllers\homeController::class,'card'])->name('user.card');
      Route::post('user.payment', [App\Http\Controllers\homeController::class,'payment'])->name('user.payment');
     Route::post('user.payment', [App\Http\Controllers\homeController::class,'payment'])->name('user.payment');
      //match
      
      Route::get('user.match', [App\Http\Controllers\homeController::class,'match'])->name('user.match');
      Route::get('user.sendint/{id}',[App\Http\Controllers\homeController::class,'sendint'])->name('user.sendint');
      Route::get('user.seemail/{id}',[App\Http\Controllers\homeController::class,'seemail'])->name('user.seemail');
      Route::get('user.seephn/{id}',[App\Http\Controllers\homeController::class,'seephn'])->name('user.seephn');
      Route::get('user.notif', [App\Http\Controllers\homeController::class,'notif'])->name('user.notif');
      Route::get('user.msgs', [App\Http\Controllers\homeController::class,'msgs'])->name('user.msgs');
      Route::get('user.verify', [App\Http\Controllers\homeController::class,'verify'])->name('user.verify');
      Route::post('user.verifyfile', [App\Http\Controllers\homeController::class,'vfile'])->name('user.verifyfile');
      Route::get('user.sendmsg/{id}',[App\Http\Controllers\homeController::class,'sendmsg'])->name('user.sendmsg');
      Route::post('user.msgsent', [App\Http\Controllers\homeController::class,'msgsent'])->name('user.msgsent');

});

Route::get('contact',[App\Http\Controllers\homeController::class,'contact'])->name('contact');