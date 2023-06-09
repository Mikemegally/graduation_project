<?php

use App\Http\Controllers\admin\AdminservicesController;
use App\Http\Controllers\admin\AdminViewComplaintController;
use App\Http\Controllers\admin\AdminViewFeedback;
use App\Http\Controllers\admin\AdminviewuserserviceController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserComplaintController;
use App\Http\Controllers\UserFeedbackController;
use App\Http\Controllers\UserserviceController;
use App\Http\Controllers\UserviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// portfolio page
Route::get('portfolio',function (){
    return view('portfolio');
});


//admin page
Route::get('admin',function (){
    return view('admin.home');
})->middleware(['Admin','auth']);



Route::get('/dashboard', function () {
    if (auth()->user()->is_admin){
        return redirect('admin');
    }else{
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin add service,view the services requested by client, delete, update
    Route::resource('adminservice', AdminservicesController::class)->middleware('Admin');

    //admin view,add,delete users
    Route::resource('adminusers', UserController::class)->middleware('Admin');

    //user view added services by admin
    Route::resource('userview', UserviewController::class);

    //user add service
    Route::resource('userservice', UserserviceController::class);

    //Admin view,update,delete services added by user
    Route::resource('adminviewservice', AdminviewuserserviceController::class)->middleware('Admin');

    //user add feedbacks
    Route::resource('userfeedback', UserFeedbackController::class);

    //admin view,delete feedbacks
    Route::resource('adminfeedback', AdminViewFeedback::class)->middleware('Admin');


    //user add complaint
    Route::resource('usercomplaint', UserComplaintController::class);

    //Admin view,delete complaint
    Route::resource('admincomplaint' , AdminViewComplaintController::class)->middleware('Admin');


});

require __DIR__.'/auth.php';

