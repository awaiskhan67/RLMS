<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserMangeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\GuarantorController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConditionController; 
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;
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
    return redirect()->route('login');
});

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard1');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile-image-update', [ProfileController::class, 'image_update'])->name('profile.image.update');
});

Route::middleware(['auth','verified'])->controller(RolePermissionController::class)->group(function () {

    Route::get('/roles-permissions' , 'index')->name('rolesP');
    Route::post('/roles-create' , 'role_create')->name('rolesPcreate');
    Route::get('/roles-edite/{id}' , 'role_edite')->name('rolesPedite');
    Route::post('/roles-update' , 'role_update')->name('rolesPupdate');
    Route::get('/roles-delete/{id}' , 'role_delete')->name('rolesPdelete');
    // Route::get('/all-courses' , 'Courses')->name('browse.course');

});

Route::middleware(['auth','verified'])->controller(UserMangeController::class)->group(function () {

    Route::get('/users-list' , 'index')->name('users');
    Route::post('/user-create' , 'user_create')->name('userCreate');
    Route::get('/user-edite/{id}' , 'user_edite')->name('userEdite');
    Route::post('/user-update' , 'user_update')->name('userUpdate');
    Route::get('/user-delete/{id}' , 'user_delete')->name('userDelete');
    // Route::get('/all-courses' , 'Courses')->name('browse.course');
    Route::get('/users/{id}', 'user_show')->name('userShow');

});


// in below there is property controllers 
Route::middleware(['auth','verified'])->controller(PropertyController::class)->group(function () {

    //this all are for the property category
    Route::get('/property-category', 'cat_index')->name('pcategory');
    Route::post('/pcategory-store', 'cat_store')->name('pcategory.add');
    Route::get('/pcategory-edite/{id}','cat_edite')->name('pcategory.edite');
    Route::post('/pcategory-update', 'cat_update')->name('pcategory.update');
    Route::get('/pcategory-delete/{id}', 'cat_delete')->name('pcategory.delete');

    //this all are for the property section
    Route::get('/property', 'prop_index')->name('property');
    Route::post('/property-store', 'prop_store')->name('property.add');
    Route::get('/property-edite/{id}','prop_edite')->name('property.edite');
    Route::post('/property-update', 'prop_update')->name('property.update');
    Route::get('/property-delete/{id}', 'prop_delete')->name('property.delete');

    //this section for property profile section 
    Route::get('/Property-profile/{id}' , 'property_profile')->name('property.profile');

});


// in below there is for guaranter controllers 
Route::middleware(['auth','verified'])->controller(GuarantorController::class)->group(function () {

    //this all are for the property category
    Route::get('/guarantor', 'index')->name('guarantor');
    Route::post('/guarantor-store', 'store')->name('guarantor.add');
    Route::get('/guarantor-edite/{id}','edite')->name('guarantor.edite');
    Route::post('/guarantor-update', 'update')->name('guarantor.update');
    Route::get('/guarantor-delete/{id}', 'delete')->name('guarantor.delete');

});

// in below there is for tanant controllers 
Route::middleware(['auth','verified'])->controller(TenantController::class)->group(function () {
    //this all are for the property category
    Route::get('/tenant', 'index')->name('tenant');
    Route::post('/tenant-store', 'store')->name('tenant.add');
    Route::get('/tenant-edite/{id}','edite')->name('tenant.edite');
    Route::post('/tenant-update', 'update')->name('tenant.update');
    Route::get('/tenant-delete/{id}', 'delete')->name('tenant.delete');

    Route::get('/g-users/{id}', 'g_show')->name('gShow');

    //this section for Tenant profile section 
    Route::get('/tenant-profile/{id}' , 'tenant_profile')->name('tenant.profile');
});

//this is company controller section
Route::middleware(['auth','verified'])->controller(CompanyController::class)->group(function () {
    //this all are for the property category
    Route::get('/company', 'index')->name('company');
    Route::post('/company-image-update', 'image_update')->name('company.image.update');
    Route::post('/company-update', 'update')->name('compnay.update');

    Route::post('/currency-update', 'currency_update')->name('currency.update');
    Route::post('/initalamount-update', 'inamount_update')->name('Inamount.update');
});

//this is Condition controller section
Route::middleware(['auth','verified'])->controller(ConditionController::class)->group(function () {
    //this all are for the property category
    Route::get('/condition', 'index')->name('condition');
    Route::post('/condition-store', 'store')->name('condition.add');
    Route::get('/condition-delete/{id}', 'delete')->name('condition.delete');
});


//This is the route for all agreement section
Route::middleware(['auth','verified'])->controller(AgreementController::class)->group(function () {

    //this all are for the property category
    Route::get('/agreement', 'index')->name('agreement');
    Route::post('/agreement-store', 'store')->name('agreement.add');
    Route::get('/agreement-edite/{id}','edite')->name('agreement.edite');
    Route::post('/agreement-update', 'update')->name('agreement.update');
    Route::get('/agreement-delete/{id}', 'delete')->name('agreement.delete');

    Route::get('/property-select/{id}', 'p_show')->name('pShow');
    Route::get('/tenant-select/{id}', 't_show')->name('tShow');

    //this is the agreement profile section 
    Route::get('/agreement-profile/{id}' , 'agreement_profile')->name('agreement.profile');

});


//This is the route for all payment section
Route::middleware(['auth','verified'])->controller(PaymentController::class)->group(function () {

    //this all are for the property category
    Route::get('/rent-payment', 'index')->name('rent.pay');
    Route::post('/rent-payment/store', 'store')->name('rentPay.add');

    Route::get('/rent-payment/slip/{Id}', 'printInvoice')->name('rentPay.Slip');

    Route::get('/rent-payment/confirmation/{Id}', 'paymentConfirm')->name('rentPay.confirm');
    Route::get('/rent-payment/cancled/{Id}', 'paymentcancel')->name('rentPay.cancel');
    
    // list of the transactions
    Route::get('/rent-payment-list', 'list')->name('rent.Transactions');
    Route::get('/rent-edite/{id}','edite')->name('agreement.edite');
    Route::post('/agreement-update', 'update')->name('agreement.update');



    Route::get('/agreement-delete/{id}', 'delete')->name('agreement.delete');
    Route::get('/fetch-agreement-details/{id}', 'agreement_details')->name('agreement_details');
    Route::get('/fetch-invoices/{id}', 'fetchInvoices')->name('fetch_invoices');

});

//This is the route for all payment section
Route::middleware(['auth','verified'])->controller(InvoiceController::class)->group(function () {

    Route::get('/invoices', 'index')->name('invoices.index');
    Route::get('/invoices/{year}', 'show')->name('invoices.show');
    Route::get('/invoice/print/{invoiceId}', 'printInvoice')->name('invoice.print');

});




require __DIR__.'/auth.php';
