<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\VolunteerController;

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

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/about',function(){
    return view('about');
});

Route::group(['prefix'=>'/'],function(){
    Route::get('/contact',[ContactController::class,'index'])->name('/contact');
    Route::post('/submitcontact',[ContactController::class,'create'])->name('/submitcontact');
});

Route::get('/blog', [VolunteerController::class,'getBlog'])->name('/blog');

Route::get('/event',function(){
    return view('event');
});

Route::get('/razorpay-payment', [RazorpayController::class, 'index'])->name('razorpay-payment');
Route::post('/razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if(Auth::check()){

        if(Auth::user()->role == 'partner')
        {
            return redirect()->route('partner#index');
        }else if(Auth::user()->role == 'donor')
        {
            return redirect()->route('donor#index');
        }else if(Auth::user()->role == 'rider')
        {
            return redirect()->route('rider#index');
        }else if(Auth::user()->role == 'member')
        {
            return redirect()->route('member#index');
        }else if(Auth::user()->role == 'rider')
        {
            return redirect()->route('rider#index');
        }else if(Auth::user()->role == 'volunteer')
        {
            return redirect()->route('volunteer#index');
        }
    }
})->name('dashboard');

//Partner
Route::group(['prefix' => 'partner'], function(){
    Route::get('/', [PartnerController::class, 'index'])->name('partner#index'); //partner dashboard // view meal
    Route::get('addMeal', [PartnerController::class, 'addMeal'])->name('partner#addMeal'); //partner create meal
    Route::post('createMeal', [PartnerController::class, 'createMeal'])->name('partner#createMeal'); //creating Meal
    Route::get('editMeal/{id}', [PartnerController::class, 'editMeal'])->name('partner#editMeal'); //edit Meal
    Route::post('updateMeal/{id}', [PartnerController::class, 'updateMeal'])->name('partner#updateMeal'); //update Meal
    Route::get('deleteMeal/{id}', [PartnerController::class, 'deleteMeal'])->name('partner#deleteMeal'); // delete Meal
    Route::get('updatePartner', [PartnerController::class, 'updatePartner'])->name('partner#update'); //update Partner
});

//Donor
Route::group(['prefix' => 'donor'], function(){
    Route::get('/',[DonorController::class,'index'])->name('donor#index');
    Route::post('/addDonation',[DonorController::class,'store'])->name('donor#addDonation');
    Route::get('/update',[DonorController::class,'updateDonor'])->name('donor#update');
    Route::get('/razorpay-payment', [RazorpayController::class, 'index'])->name('donor#razorpay-payment');
    Route::post('/razorpay-payment', [RazorpayController::class, 'store'])->name('donor#razorpay.payment.store');
});

//Member Routes
Route::group(['prefix'=>'member'], function(){
    Route::get('/',[MemberController::class,'index'])->name('member#index');
    Route::get('/updateMember',[MemberController::class,'updateMember'])->name('member#update');
    Route::post('/updatedetails',[MemberController::class,'updateMemberDetails'])->name('member#updatedetails');
    Route::get('/ordermeal/{id}',[MemberController::class,'orderMeal'])->name('member#ordermeal');
    Route::post('/foodorder',[MemberOrderController::class,'orderFood'])->name('member#foodorder');
    Route::get('/mealupdates',[MemberOrderController::class,'index'])->name('member#mealupdates');
});

//Rider
Route::group(['prefix'=>'rider'], function(){
    Route::get('/',[RiderController::class,'index'])->name('rider#index');
    Route::get('/delivery/{id}',[RiderController::class,'riderDelivery'])->name('rider#delivery');
    ROute::post('/confirmdelivery',[RiderController::class,'confirmDelivery'])->name('rider#confirmdelivery');
    Route::get('/confirmed',[RiderController::class,'confirmPage'])->name('rider#confirmed');
});

//Volunteer
Route::group(['prefix'=>'volunteer'], function(){
    Route::get('/',[VolunteerController::class,'index'])->name('volunteer#index');
    Route::get('/blog',[VolunteerController::class,'createBlog'])->name('volunteer#blog');
    Route::post('/blogsubmit',[VolunteerController::class,'submitBlog'])->name('volunteer#blogsubmit');
    Route::post('/manpower',[VolunteerController::class,'VolunteerManpower'])->name('volunteer#manpower');
    Route::post('/resources',[VolunteerController::class,'VolunteerResources'])->name('volunteer#resources');
    
});
