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
Route::get('/products',[ProductsController::class,'index'])->name('product.product')->middleware('can:view-all-products');

Route::get('/product/create', [ProductsController::class,'create'])->name('product.create')->middleware('can:add-products');

Route::post('/product/store', [ProductsController::class,'store'])->name('product.store');

Route::get('product/edit/{product}',[ProductsController::class,'edit'])->name('product.edit')->middleware('can:edit-products');

Route::put('/product/edit/{product}',[ProductsController::class,'update'])->name('product.update');

Route::delete('/product/{id}',[ProductsController::class,'destroy'])->name('product.destroy')->middleware('can:delete-products');

Route::get('/product/{product}', [ProductsController::class,'show'])->name('product.show')->middleware('can:view-products');

Route::get('/prod/trash',[ProductsController::class,'deletedproduct'])->name('product.trash')->middleware('can:view-deleted-products');

Route::get('/product/restore/{id}',[ProductsController::class,'restoreproduct'])->name('product.restore')->middleware('can:restore-deleted-products');

Route::delete('/prod/{id}',[ProductsController::class,'forceDelete'])->name('product.forcedelete')->middleware('can:delete-products-permananly');

/*------------------------------ Routes for Services ----------------------*/

Route::get('/services',[ServiceController::class,'index'])->name('service.service')->middleware('can:view-all-services');

Route::get('/service/create', [ServiceController::class,'create'])->name('service.create')->middleware('can:add-services');

Route::post('/service/store', [ServiceController::class,'store'])->name('service.store');

Route::get('service/edit/{service}',[ServiceController::class,'edit'])->name('service.edit')->middleware('can:edit-services');

Route::put('/service/edit/{service}',[ServiceController::class,'update'])->name('service.update');

Route::post('/service/delete/{id}',[ServiceController::class,'destroy'])->name('service.destroy')->middleware('can:delete-services');

Route::get('/service/{service}', [ServiceController::class,'show'])->name('service.show')->middleware('can:view-services');

Route::get('/serv/trash',[ServiceController::class,'deletedservice'])->name('service.trash')->middleware('can:view-deleted-services');

Route::get('/service/restore/{id}',[ServiceController::class,'restoreservice'])->name('service.restore')->middleware('can:restore-deleted-services');

Route::delete('/service/{id}',[ServiceController::class,'forceDelete'])->name('service.forcedelete')->middleware('can:delete-services-permanently');



/*------------------ Routes for Clients -------------- */


Route::get('/client',[ClientsController::class,'index'])->name('client.client')->middleware('can:view-all-clients');

Route::get('/client/create', [ClientsController::class,'create'])->name('client.create')->middleware('can:add-clients');

Route::post('/client/store', [ClientsController::class,'store'])->name('client.store');

Route::get('/client/edit/{client}',[ClientsController::class,'edit'])->name('client.edit')->middleware('can:edit-clients');

Route::put('/client/edit/{client}',[ClientsController::class,'update'])->name('client.update');

Route::delete('/client/{client}',[ClientsController::class,'destroy'])->name('client.destroy')->middleware('can:delete-clients');

Route::get('/client/{client}',[ClientsController::class,'show'])->name('client.show')->middleware('can:view-clients');

Route::post('/client/type/{id}',[ClientsController::class,'type'])->name('client.type')->middleware('can:change-clients-type');

Route::get('/client/type/{id}',[ClientsController::class,'edtiType'])->name('client.edittype')->middleware('can:edit-clients-type');

Route::get('/allclients', [ClientsController::class,'clientsFilter'])->name('client.allclients')->middleware('can:view-filtered-clients');

Route::get('/allprospects', [ClientsController::class,'prospectsFilter'])->name('client.allprospects')->middleware('can:view-filtered-prospects');

/*---------------------- Route For Prospect ---------------------*/
// Route::get('/prospect',[ProspectController::class,'index'])->name('prospect.prospect');

// Route::get('/prospect/create', [ProspectController::class,'create'])->name('prospect.create')->middleware('can:add-prospects');

// Route::post('/prospect/store', [ProspectController::class,'store'])->name('prospect.store');

// Route::get('/prospect/edit/{prospect}',[ProspectController::class,'edit'])->name('prospect.edit');

// Route::put('/prospect/edit/{prospect}',[ProspectController::class,'update'])->name('prospect.update');

// Route::delete('/prospect/{prospect}',[ProspectController::class,'destroy'])->name('prospect.destroy');

// Route::get('/prospect/{prospect}',[ProspectController::class,'show'])->name('prospect.show');


/*------------------ Routes for Company -------------------*/
Route::get('/company/cr',[CompanyController::class,'internalCreate'])->name('company.cr')->middleware('can:affect-company');


Route::get('/company',[CompanyController::class,'index'])->name('company.company')->middleware('can:view-company');

Route::get('/company/create', [CompanyController::class,'create'])->name('company.create')->middleware('can:create-company');

Route::post('/company/store', [CompanyController::class,'store'])->name('company.store');

Route::post('/company/stor', [CompanyController::class,'storage'])->name('company.storage');

Route::get('/company/edit/{company}',[CompanyController::class,'edit'])->name('company.edit')->middleware('can:edit-company');

Route::post('/company/updat/{company}',[CompanyController::class,'updatage'])->name('company.updatage');


Route::get('/company/editage/{company}',[CompanyController::class,'editage'])->name('company.editage')->middleware('can:edit-company-only');
Route::put('/company/edit/{company}',[CompanyController::class,'update'])->name('company.update');

Route::delete('/company/{company}',[CompanyController::class,'destroy'])->name('company.destroy')->middleware('can:delete-company');

Route::get('/company/{company}',[CompanyController::class,'show'])->name('company.show');
// Auth::routes();


/**--------------------Routes for facture ---------------*/


Route::get('/facture/create',[FactureController::class,'create'])->name('facture.create')->middleware('can:create-facture');

Route::post('/facture/store',[FactureController::class,'store'])->name('facture.store');

Route::get('/facture',[FactureController::class,'index'])->name('facture.facture')->middleware('can:view-facture');

Route::get('/facture/trash',[FactureController::class,'deletedInvoices'])->name('facture.trash')->middleware('can:view-deleted-facture');

Route::get('/facture/edit/{facture}',[FactureController::class,'edit'])->name('facture.edit')->middleware('can:edit-facture');

Route::get('/facture/restore/{id}',[FactureController::class,'restoreInvoices'])->name('facture.restore')->middleware('can:restore-facture');

Route::delete('/facture/{facture}',[FactureController::class,'destroy'])->name('facture.destroy')->middleware('can:delete-facture');

Route::post('facture/update',[FactureController::class,'update'])->name('facture.update');

Route::get('/facture/show/{facture}',[FactureController::class,'show'])->name('facture.show')->middleware('can:view-facture');

Route::get('generate-pdf', [FactureController::class, 'generatePDF'])->name('facture.pdf')->middleware('can:generate-pdf-facture');

Route::get('/status_show/{id}',[FactureController::class,'showstat'])->name('facture.status')->middleware('can:change-facture-status');

Route::get('/facture/payed',[FactureController::class,'payedInvoices'])->name('facture.payed')->middleware('can:view-paidinvoices');

Route::get('/facture/unpayed',[FactureController::class,'unpayedInvoices'])->name('facture.unpayed')->middleware('can:view-unpaidinvoices');

Route::get('/facture/pdf/{id}', [FactureController::class, 'createPDF']);

Route::post('/facture/sendmail/{id}', [FactureController::class, 'sendmail'])->name('facture.send')->middleware('can:send-invoice-mail');

Route::delete('/fact/{id}',[FactureController::class,'forceDelete'])->name('facture.forcedelete')->middleware('can:delete-facture-permanently');



/**--------------------Routes for Estimate ---------------*/

Route::get('/estimate/create',[EstimateController::class,'create'])->name('estimate.create')->middleware('can:create-estimate');

Route::post('/estimate/store',[EstimateController::class,'store'])->name('estimate.store');

Route::get('/estimate',[EstimateController::class,'index'])->name('estimate.estimate')->middleware('can:view-all-estimates');

Route::get('/estimate/edit/{estimate}',[EstimateController::class,'edit'])->name('estimate.edit')->middleware('can:edit-estimates');

Route::delete('/estimate/{estimate}',[EstimateController::class,'destroy'])->name('estimate.destroy')->middleware('can:delete-estimates');

Route::post('estimate/update',[EstimateController::class,'update'])->name('estimate.update');

Route::get('/estimate/show/{estimate}',[EstimateController::class,'show'])->name('estimate.show')->middleware('can:view-estimate');

Route::get('/estimate/status/{estimate}',[EstimateController::class,'status'])->name('estimate.status')->middleware('can:change-estimate-status');

Route::post('/estimate/update/{id}',[EstimateController::class,'updateStatus'])->name('estimate.updatestatus')->middleware('can:update-estimate-status');

Route::get('generate-pdf', [EstimateController::class, 'generatePDF'])->name('estimate.pdf')->middleware('can:generate-estimate-pdf');

Route::get('/estimate/pdf/{id}', [EstimateController::class, 'createPDF']);

Route::post('/estimate/sendmail/{id}', [EstimateController::class, 'sendmail'])->name('estimate.send')->middleware('can:send-estimates-mail');

Route::delete('/estimat/{id}',[EstimateController::class,'forceDelete'])->name('estimate.forcedelete')->middleware('cacn:delete-estimate-permanently');

Route::get('/estimat/trash',[EstimateController::class,'deletedInvoices'])->name('estimate.trash')->middleware('can:view-deleted-estimates');

/******     Routes for discounts      ******/

Route::get('/discount/{facture}',[DiscountController::class,'index'])->name('discount.discount')->middleware('can:view-discounts');
Route::post('/discount/{facture}',[DiscountController::class,'create'])->name('adddis')->middleware('can:make-discounts');
Route::get('/discount',[DiscountController::class,'show'])->name('discount.show')->middleware('can:show-discounts');

Route::delete('/discount/{id}',[DiscountController::class,'destroy'])->name('discount.destroy')->middleware('can:deleted-discounts');


/*************************************** *delievery*****************************/


// Route::resources(['delivery' =>DeliveryController::class]);

// Route::get('/delivery/show/{id}',[DeliveryController::class,'showProducts'])->name('delivery.show');

Route::get('/delivery/{id}',[DeliveryController::class,'create'])->name('delivery.create')->middleware('can:create-deliveries');

Route::post('/delivery/store/{id}',[DeliveryController::class,'store'])->name('delivery.store');

Route::get('/delivery/store',[DeliveryController::class,'store'])->name('delivery.delivery');

Route::get('/delivery',[DeliveryController::class,'index'])->name('delivery.all')->middleware('can:view-all-deliveries');

Route::get('delivery/show/{id}', [DeliveryController::class,'bonDeSortie'])->name('delivery.show')->middleware('can:view-deliveries');

Route::get('delivery/edit/{id}', [DeliveryController::class,'edit'])->name('delivery.edit')->middleware('can:edit-deliveries');

Route::post('/delivery/update',[DeliveryController::class,'update'])->name('delivery.update');

// Route::post('delivery/edit/{id}', [DeliveryController::class,'edit'])->name('delivery.edit');
// Route::post('delivery/quant/{id}',[DeliveryController::class,'quantDelivery'])->name('delivery.quant');

// Route::get('/delivery/show/{id}',[DeliveryController::class,'show'])->name('delivery.show');




/*********************************Users **********************************************/
Route::get('/user',[UserController::class,'index'])->name('user.user')->middleware('can:view-all-users');
Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show')->middleware('can:view-user');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('can:edit-users');
Route::get('/user/edi/{user}',[UserController::class,'editall'])->name('user.editall')->middleware('can:view-all-users');
Route::get('user/create',[UserController::class,'create'])->name('user.create')->middleware('can:create-users');
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/chat',[UserController::class,'chat'])->name('user.chat')->middleware('can:chat');

Route::post('/user/updat/{user}',[UserController::class,'updateall'])->name('user.updateall');

Route::get('user/profile',[UserController::class,'editProfile'])->name('user.editProfile')->middleware('can:edit-profile');

Route::post('/user/update/{user}',[UserController::class,'updateprofile'])->name('user.updateprofile');

Route::delete('/user/{user}',[UserController::class,'destroy'])->name('user.destroy')->middleware('can:delete-users');



/******************************Role ************************************************* */

Route::get('/roles',[RoleController::class,'index'])->name('roles.index')->middleware('can:view-roles');
Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create')->middleware('can:create-roles');
Route::get('/roles/edit/{id}',[RoleController::class,'edit'])->name('roles.edit')->middleware('can:edit-roles');
Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
Route::post('/roles/update/{id}',[RoleController::class,'update'])->name('roles.update');
Route::post('/roles/delete/{id}',[RoleController::class,'delete'])->name('roles.delete')->middleware('can:delete-roles');


/****************************Permission ************************************- */


Route::get('/permission',[PermissionController::class,'index'])->name('permissions.index');
Route::get('/permission/create',[PermissionController::class,'create'])->name('permissions.create');
Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permissions.edit');
Route::post('/permission/store',[PermissionController::class,'store'])->name('permissions.store');
Route::post('/permission/update',[PermissionController::class,'update'])->name('permissions.update');
Route::post('/permission/delete/{id}',[PermissionController::class,'delete'])->name('permissions.delete');


/*****************************************process ********** */

Route::get('/process',[ProcessController::class,'index'])->name('process.process')->middleware('can:view-extracted');

Route::post('/import',[ProcessController::class,'uploadfile'])->name('process.upload')->middleware('can:upload-extracted');

Route::post('/hkeya',[ProcessController::class,'process'])->name('facture.process')->middleware('can:extract');

Route::get('/getdata',[ProcessController::class,'getData'])->name('facture.getdata')->middleware('can:get-data');

Route::get('/process/edit/{id}',[ProcessController::class,'edit'])->name('process.edit')->middleware('can:edit-extracted');

Route::post('/process/update',[ProcessController::class,'update'])->name('process.update');

Route::delete('/process/{id}',[ProcessController::class,'destroy'])->name('process.destroy')->middleware('can:delete-extracted');

Route::post('/store', [ProcessController::class,'store'])->name('process.store');

/**********************************************dashboard ************************/



Route::get('/dashboard',[ChartController::class,'index'])->name('dashboard.index')->middleware('can:view-dashboard');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/api/v1/companies', [AjaxController::class, 'getCompanies']);
Route::get('/api/v1/phone', [AjaxController::class, 'getPhonenumber']);
Route::get('/api/v1/adresse', [AjaxController::class, 'getAdresse']);
Route::get('/api/v1/price', [AjaxController::class, 'getPrice']);
Route::get('/api/v1/state',[AjaxController::class,'getState']);
Route::get('/api/v1/filtreClients',[AjaxController::class,'filtreClients']);
});


/********* Contact Us routes ************/
Route::get('/contact-form', [ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contact-form', [ContactController::class, 'storeContactForm'])->name('contact-form.store');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.contact');
Route::delete('/contact/{id}',[ContactController::class,'destroy'])->name('contact.destroy');
// Route::get('/',[ProductsController::class,'index'])->name('product.product');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
