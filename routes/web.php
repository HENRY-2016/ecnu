<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Models\OrganizationsModel;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\SupplierController;
use App\Models\AssetsModel;

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

// migrate db tables
Route::get('/migrate', function(){
    Artisan::call('migrate'); 
    dd('Migrations Done!');
});

//Clear config cache:
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});

 //Clear route cache:
Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Routes cache cleared';
});


// Get Ajax Data
Route::get('/orgs/data/{id}', [OrganizationsController::class, 'getAjaxData']);
Route::get('/supplier/data/{id}', [SupplierController::class, 'getAjaxData']);
Route::get('/asset/data/{id}', [AssetsController::class, 'getAjaxData']);

Route::get('/', function () {return view('auth.login');});
Route::get('/components/dashboard', function () {
    return view('components.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/save/data/details',[OrganizationsController::class,'saveData']);
Route::post('/update/data/details',[OrganizationsController::class,'updateData']);

Route::get('/components/orgs/view/{organization}', function ($organization) {
    $data = OrganizationsModel::where('Province',$organization)->get ();
    $total = OrganizationsModel::where('Province',$organization)->count();
    return view('components.orgs.view',compact('data','total','organization'));
})->middleware(['auth', 'verified'])->name('View');

Route::get('/components/orgs/add/{organization}', function ($organization) {
    return view('components.orgs.add',compact('organization'));
})->middleware(['auth', 'verified'])->name('Add');

Route::get('/components/orgs/print/{id}', function ($id) {
    
    $data = OrganizationsModel::findOrFail($id);
    return view('components.orgs.Print',compact('data'));
})->middleware(['auth', 'verified'])->name('Print');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// resources
Route::resource('OrganizationsResource',OrganizationsController::class);
Route::resource('supplier',SupplierController::class);
Route::resource('asset',AssetsController::class);

require __DIR__.'/auth.php';
