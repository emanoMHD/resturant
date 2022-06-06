<?php
use Dingo\Api\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Requests;

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


define('PAGINATION_COUNT', 100);
Route::group(['namespace' => 'Admin', 'middleware' =>['api','auth']], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
   
  

    ######################### Begin Languages Route ########################
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/','LanguagesController@index') -> name('admin.languages');
        Route::get('create','LanguagesController@create') -> name('admin.languages.create');
        Route::post('store','LanguagesController@store') -> name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy') -> name('admin.languages.delete');


    });
    ######################### End Languages Route ########################


    
    ######################### Begin Main Categoris Routes ########################
    Route::group(['prefix' => 'main_categories
    '], function () {
        Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
        Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
        Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
        Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
        Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
        Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
        Route::get('changeStatus/{id}','MainCategoriesController@changeStatus') -> name('admin.maincategories.status');

    });
    ######################### End  Main Categoris Routes  ########################


    ######################### Begin Sub Categoris Routes ########################
    Route::group(['prefix' => 'sub_categories'], function () {
        Route::get('/','SubCategoriesController@index') -> name('admin.subcategories');
        Route::get('create','SubCategoriesController@create') -> name('admin.subcategories.create');
        Route::post('store','SubCategoriesController@store') -> name('admin.subcategories.store');
        Route::get('edit/{id}','SubCategoriesController@edit') -> name('admin.subcategories.edit');
        Route::post('update/{id}','SubCategoriesController@update') -> name('admin.subcategories.update');
        Route::get('delete/{id}','SubCategoriesController@destroy') -> name('admin.subcategories.delete');
        Route::get('changeStatus/{id}','SubCategoriesController@changeStatus') -> name('admin.subcategories.status');

    });
    ######################### End  Sub Categoris Routes  ########################
    Route::group(['prefix' => 'products'], function () {
        Route::get('/','productController@index') -> name('admin.products');
        Route::get('create','productController@create') -> name('admin.products.create');
        Route::post('store','productController@store') -> name('admin.products.store');
        Route::get('edit/{id}','productController@edit') -> name('admin.products.edit');
        Route::post('update/{id}','productController@update') -> name('admin.products.update');
        Route::get('delete/{id}','productController@destroy') -> name('admin.products.delete');
        Route::get('changeStatus/{id}','productController@changeStatus') -> name('admin.products.status');

    });
    Route::group(['prefix' => 'parts'], function () {
        Route::get('/','productController@index') -> name('admin.products');
        Route::get('create','PartsController@create') -> name('admin.parts.create');
        Route::post('store','PartsController@store') -> name('admin.parts.store');
        Route::get('edit/{id}','productController@edit') -> name('admin.products.edit');
        Route::post('update/{id}','productController@update') -> name('admin.products.update');
        Route::get('delete/{id}','productController@destroy') -> name('admin.products.delete');
        Route::get('changeStatus/{id}','productController@changeStatus') -> name('admin.products.status');

    });


    ######################### Begin vendors Routes ########################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/','VendorsController@index') -> name('admin.vendors');
        Route::get('create','VendorsController@create') -> name('admin.vendors.create');
        Route::post('store','VendorsController@store') -> name('admin.vendors.store');
        Route::get('edit/{id}','VendorsController@edit') -> name('admin.vendors.edit');
        Route::post('update/{id}','VendorsController@update') -> name('admin.vendors.update');
        Route::get('delete/{id}','VendorsController@destroy') -> name('admin.vendors.delete');
        Route::get('changeStatus/{id}','VendorsController@changeStatus') -> name('admin.VendorsController.status');
    
    });
    ######################### End  vendors Routes  ########################
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/','InvoiceController@index') -> name('admin.invoices');
        Route::get('create','InvoiceController@create') -> name('admin.invoices.create');
        Route::post('store','InvoiceController@store') -> name('admin.invoices.store');
        Route::get('edit/{id}','InvoiceController@edit') -> name('admin.invoices.edit');
        Route::get('show/{id}','InvoiceController@show') -> name('admin.invoices.show');
        Route::get('print/{id}','InvoiceController@print') -> name('admin.invoices.print');
        Route::get('pdf/{id}','InvoiceController@pdf') -> name('admin.invoices.pdf');
        Route::get('sendEmail/{id}','InvoiceController@send_to_email') -> name('admin.invoices.sendEmail');
        Route::post('update/{id}','InvoiceController@update') -> name('admin.invoices.update');
        Route::get('delete/{invoice_number}','InvoiceController@destroy') -> name('admin.invoices.delete');
        Route::get('changeStatus/{id}','InvoiceController@changeStatus') -> name('admin.invoices.status');
    
    });








    Route::group(['prefix' => 'reports'], function () {
        Route::get('/','reportsController@index') -> name('admin.reports');
        Route::get('create','reportsController@create') -> name('admin.reports.create');
        Route::post('store','reportsController@store') -> name('admin.reports.store');
        Route::get('edit/{id}','reportsController@edit') -> name('admin.reports.edit');
        Route::get('show/{id}','reportsController@show') -> name('admin.reports.show');
        Route::get('print/{id}','InvoiceController@print') -> name('admin.invoices.print');
        Route::get('pdf/{id}','InvoiceController@pdf') -> name('admin.invoices.pdf');
        Route::get('sendEmail/{id}','reportsController@send_to_email') -> name('admin.reports.sendEmail');
        Route::post('update/{id}','reportsController@update') -> name('admin.reports.update');
        Route::get('delete/{invoice_number}','reportsController@destroy') -> name('admin.reports.delete');
        Route::get('changeStatus/{id}','InvoiceController@changeStatus') -> name('admin.invoices.status');
    
    });

Route::group(['prefix' => 'vendors'], function () {
    Route::get('/','VendorsController@index') -> name('admin.vendors');
    Route::get('create','VendorsController@create') -> name('admin.vendors.create');
    Route::post('store','VendorsController@store') -> name('admin.vendors.store');
    Route::get('edit/{id}','VendorsController@edit') -> name('admin.vendors.edit');
    Route::post('update/{id}','VendorsController@update') -> name('admin.vendors.update');
    Route::get('delete/{id}','VendorsController@destroy') -> name('admin.vendors.delete');
    Route::get('changeStatus/{id}','VendorsController@changeStatus') -> name('admin.VendorsController.status');

});

    

});
Route::group(['namespace' => 'Admin', 'middleware' => 'api'], function () {
  Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');

});
 ########################### test part routes #####################

Route::get('subcateory',function (){

      $mainCategory = \App\Models\MainCategory::find(31);

   return       $mainCategory -> subCategories;
});

Route::get('maincategory',function (){

    $subcategory = \App\Models\SubCategory::find(1);

    return $subcategory -> mainCategory;


});
//Route::post('register', 'UserController@register');
