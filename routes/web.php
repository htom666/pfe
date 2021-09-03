<?php

use App\Models\Product;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProcessController;
use App\Models\Delivery;
use Symfony\Component\Process\Process;

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

Auth::routes();
/*------- Routes for Products -----*/
// Route::get('/',[ProductsController::class,'index'])->name('product.product');
Route::get('/', function(){
    return view('auth.login');
})->name('/');
//::resource('client', ClientsController::class);
/*Route::resource('facture', [FactureController::class]);**/

Route::middleware(['auth'])->group(function () {
/*------------------------------ Routes for Products ----------------------*/
Route::get('/products',[ProductsController::class,'index'])->name('product.product');

Route::get('/product/create', [ProductsController::class,'create'])->name('product.create');

Route::post('/product/store', [ProductsController::class,'store'])->name('product.store');

Route::get('product/edit/{product}',[ProductsController::class,'edit'])->name('product.edit');

Route::put('/product/edit/{product}',[ProductsController::class,'update'])->name('product.update');

Route::delete('/product/{id}',[ProductsController::class,'destroy'])->name('product.destroy');

Route::get('/product/{product}', [ProductsController::class,'show'])->name('product.show');

Route::get('/prod/trash',[ProductsController::class,'deletedproduct'])->name('product.trash');

Route::get('/product/restore/{id}',[ProductsController::class,'restoreproduct'])->name('product.restore');

Route::delete('/prod/{id}',[ProductsController::class,'forceDelete'])->name('product.forcedelete');

/*------------------------------ Routes for Services ----------------------*/

Route::get('/service',[ServiceController::class,'index'])->name('service.service');

Route::get('/service/create', [ServiceController::class,'create'])->name('service.create');

Route::post('/service/store', [ServiceController::class,'store'])->name('service.store');

Route::get('service/edit/{service}',[ServiceController::class,'edit'])->name('service.edit');

Route::put('/service/edit/{service}',[ServiceController::class,'update'])->name('service.update');

Route::delete('/service/{id}',[ServiceController::class,'destroy'])->name('service.destroy');

Route::get('/service/{service}', [ServiceController::class,'show'])->name('service.show');

Route::get('/serv/trash',[ServiceController::class,'deletedservice'])->name('service.trash');

Route::get('/service/restore/{id}',[ServiceController::class,'restoreservice'])->name('service.restore');

Route::delete('/service/{id}',[ServiceController::class,'forceDelete'])->name('service.forcedelete');



/*------------------ Routes for Clients -------------- */


Route::get('/client',[ClientsController::class,'index'])->name('client.client');

Route::get('/client/create', [ClientsController::class,'create'])->name('client.create');

Route::post('/client/store', [ClientsController::class,'store'])->name('client.store');

Route::get('/client/edit/{client}',[ClientsController::class,'edit'])->name('client.edit');

Route::put('/client/edit/{client}',[ClientsController::class,'update'])->name('client.update');

Route::delete('/client/{client}',[ClientsController::class,'destroy'])->name('client.destroy');

Route::get('/client/{client}',[ClientsController::class,'show'])->name('client.show');

Route::post('/client/type/{id}',[ClientsController::class,'type'])->name('client.type');

Route::get('/client/type/{id}',[ClientsController::class,'edtiType'])->name('client.edittype');

Route::get('/allclients', [ClientsController::class,'clientsFilter'])->name('client.allclients');

Route::get('/allprospects', [ClientsController::class,'prospectsFilter'])->name('client.allprospects');

/*---------------------- Route For Prospect ---------------------*/
// Route::get('/prospect',[ProspectController::class,'index'])->name('prospect.prospect');

// Route::get('/prospect/create', [ProspectController::class,'create'])->name('prospect.create')->middleware('can:add-prospects');

// Route::post('/prospect/store', [ProspectController::class,'store'])->name('prospect.store');

// Route::get('/prospect/edit/{prospect}',[ProspectController::class,'edit'])->name('prospect.edit');

// Route::put('/prospect/edit/{prospect}',[ProspectController::class,'update'])->name('prospect.update');

// Route::delete('/prospect/{prospect}',[ProspectController::class,'destroy'])->name('prospect.destroy');

// Route::get('/prospect/{prospect}',[ProspectController::class,'show'])->name('prospect.show');


/*------------------ Routes for Company -------------------*/
Route::get('/company/cr',[CompanyController::class,'internalCreate'])->name('company.cr');


Route::get('/company',[CompanyController::class,'index'])->name('company.company');

Route::get('/company/create', [CompanyController::class,'create'])->name('company.create');

Route::post('/company/store', [CompanyController::class,'store'])->name('company.store');

Route::post('/company/stor', [CompanyController::class,'storage'])->name('company.storage');

Route::get('/company/edit/{company}',[CompanyController::class,'edit'])->name('company.edit');

Route::post('/company/updat/{company}',[CompanyController::class,'updatage'])->name('company.updatage');


Route::get('/company/editage/{company}',[CompanyController::class,'editage'])->name('company.editage');
Route::put('/company/edit/{company}',[CompanyController::class,'update'])->name('company.update');

Route::delete('/company/{company}',[CompanyController::class,'destroy'])->name('company.destroy');

Route::get('/company/{company}',[CompanyController::class,'show'])->name('company.show');
// Auth::routes();


/**--------------------Routes for facture ---------------*/

Route::get('/facture/create',[FactureController::class,'create'])->name('facture.create');

Route::post('/facture/store',[FactureController::class,'store'])->name('facture.store');

Route::get('/facture',[FactureController::class,'index'])->name('facture.facture');

Route::get('/facture/trash',[FactureController::class,'deletedInvoices'])->name('facture.trash');

Route::get('/facture/edit/{facture}',[FactureController::class,'edit'])->name('facture.edit');

Route::get('/facture/restore/{id}',[FactureController::class,'restoreInvoices'])->name('facture.restore');

Route::delete('/facture/{facture}',[FactureController::class,'destroy'])->name('facture.destroy');

Route::post('facture/update',[FactureController::class,'update'])->name('facture.update');

Route::get('/facture/show/{facture}',[FactureController::class,'show'])->name('facture.show');

Route::get('generate-pdf', [FactureController::class, 'generatePDF'])->name('facture.pdf');

Route::get('/status_show/{id}',[FactureController::class,'showstat'])->name('facture.status');

Route::get('/facture/payed',[FactureController::class,'payedInvoices'])->name('facture.payed');

Route::get('/facture/unpayed',[FactureController::class,'unpayedInvoices'])->name('facture.unpayed');

Route::get('/facture/pdf/{id}', [FactureController::class, 'createPDF']);

Route::post('/facture/sendmail/{id}', [FactureController::class, 'sendmail'])->name('facture.send');

Route::delete('/fact/{id}',[FactureController::class,'forceDelete'])->name('facture.forcedelete');



/**--------------------Routes for Estimate ---------------*/

Route::get('/estimate/create',[EstimateController::class,'create'])->name('estimate.create');

Route::post('/estimate/store',[EstimateController::class,'store'])->name('estimate.store');

Route::get('/estimate',[EstimateController::class,'index'])->name('estimate.estimate');

Route::get('/estimate/edit/{estimate}',[EstimateController::class,'edit'])->name('estimate.edit');

Route::delete('/estimate/{estimate}',[EstimateController::class,'destroy'])->name('estimate.destroy');

Route::post('estimate/update',[EstimateController::class,'update'])->name('estimate.update');

Route::get('/estimate/show/{estimate}',[EstimateController::class,'show'])->name('estimate.show');

Route::get('/estimate/status/{estimate}',[EstimateController::class,'status'])->name('estimate.status');

Route::post('/estimate/update/{id}',[EstimateController::class,'updateStatus'])->name('estimate.updatestatus');

Route::get('generate-pdf', [EstimateController::class, 'generatePDF'])->name('estimate.pdf');

Route::get('/estimate/pdf/{id}', [EstimateController::class, 'createPDF']);

Route::post('/estimate/sendmail/{id}', [EstimateController::class, 'sendmail'])->name('estimate.send');

Route::get('/estimate/trash',[EstimateController::class,'deletedInvoices'])->name('estimate.trash');

Route::get('/estimate/restore/{id}',[EstimateController::class,'restoreInvoices'])->name('estimate.restore');

Route::delete('/estimat/{id}',[EstimateController::class,'forceDelete'])->name('estimate.forcedelete');


/******     Routes for discounts      ******/

Route::get('/discount/{facture}',[DiscountController::class,'index'])->name('discount.discount');
Route::post('/discount/{facture}',[DiscountController::class,'create'])->name('adddis');
Route::get('/discount',[DiscountController::class,'show'])->name('discount.show');

Route::delete('/discount/{id}',[DiscountController::class,'destroy'])->name('discount.destroy');


/*************************************** *delievery*****************************/


// Route::resources(['delivery' =>DeliveryController::class]);

// Route::get('/delivery/show/{id}',[DeliveryController::class,'showProducts'])->name('delivery.show');

Route::get('/delivery/{id}',[DeliveryController::class,'create'])->name('delivery.create');

Route::post('/delivery/store/{id}',[DeliveryController::class,'store'])->name('delivery.store');

Route::get('/delivery/store',[DeliveryController::class,'store'])->name('delivery.delivery');

Route::get('/delivery',[DeliveryController::class,'index'])->name('delivery.all');

Route::get('delivery/show/{id}', [DeliveryController::class,'bonDeSortie'])->name('delivery.show');

Route::get('delivery/edit/{id}', [DeliveryController::class,'edit'])->name('delivery.edit');


// Route::put('/delivery/update',[DeliveryController::class,'update'])->name('delivery.update');

// Route::post('delivery/edit/{id}', [DeliveryController::class,'edit'])->name('delivery.edit');
// Route::post('delivery/quant/{id}',[DeliveryController::class,'quantDelivery'])->name('delivery.quant');

// Route::get('/delivery/show/{id}',[DeliveryController::class,'show'])->name('delivery.show');




/*********************************Users **********************************************/
Route::get('/user',[UserController::class,'index'])->name('user.user');
Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::get('/user/edi/{user}',[UserController::class,'editall'])->name('user.editall');
Route::get('user/create',[UserController::class,'create'])->name('user.create');
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/chat',[UserController::class,'chat'])->name('user.chat');
Route::post('/user/updat/{user}',[UserController::class,'updateall'])->name('user.updateall');

Route::get('user/profile',[UserController::class,'editProfile'])->name('user.editProfile');

Route::post('/user/update/{user}',[UserController::class,'updateprofile'])->name('user.updateprofile');

Route::delete('/user/{user}',[UserController::class,'destroy'])->name('user.destroy');


/******************************Role ************************************************* */

Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
Route::get('/roles/edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
Route::post('/roles/update/{id}',[RoleController::class,'update'])->name('roles.update');
Route::post('/roles/delete/{id}',[RoleController::class,'delete'])->name('roles.delete');


/****************************Permission ************************************- */


Route::get('/permission',[PermissionController::class,'index'])->name('permissions.index');
Route::get('/permission/create',[PermissionController::class,'create'])->name('permissions.create');
Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permissions.edit');
Route::post('/permission/store',[PermissionController::class,'store'])->name('permissions.store');
Route::post('/permission/update',[PermissionController::class,'update'])->name('permissions.update');
Route::post('/permission/delete/{id}',[PermissionController::class,'delete'])->name('permissions.delete');


/*****************************************process ********** */

Route::get('/process',[ProcessController::class,'index'])->name('process.process');

Route::post('/import',[ProcessController::class,'uploadfile'])->name('process.upload');

Route::post('/hkeya',[ProcessController::class,'process'])->name('facture.process');

Route::get('/getdata',[ProcessController::class,'getData'])->name('facture.getdata');

Route::get('/process/edit/{id}',[ProcessController::class,'edit'])->name('process.edit');

Route::post('/process/update',[ProcessController::class,'update'])->name('process.update');

Route::delete('/process/{id}',[ProcessController::class,'destroy'])->name('process.destroy');

Route::post('/store', [ProcessController::class,'store'])->name('process.store');

/**********************************************dashboard ************************/


Route::get('/dashboard',[ChartController::class,'index'])->name('dashboard.index');


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/api/v1/companies', [AjaxController::class, 'getCompanies']);
Route::get('/api/v1/phone', [AjaxController::class, 'getPhonenumber']);
Route::get('/api/v1/adresse', [AjaxController::class, 'getAdresse']);
Route::get('/api/v1/price', [AjaxController::class, 'getPrice']);
});


/********* Contact Us routes ************/
Route::get('/contact-form', [ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contact-form', [ContactController::class, 'storeContactForm'])->name('contact-form.store');

// Route::get('/',[ProductsController::class,'index'])->name('product.product');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
