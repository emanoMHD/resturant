<?php

use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\LanguagesController;

use App\Http\Controllers\Admin\OrderRegisterController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductControllerr as adminProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ReturnRequestController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as userProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReturnOrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\Admin\InvoiceController‫;
use App\Http\Controllers\Admin\MainCategoriesController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\reportsController;
use App\Http\Controllers\Admin\DashboardController;
use Dingo\Api\Routing\Router;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Requests;



//////////////////////////////////////////////
use App\Http\Controllers\Dealer\ProductController as p;
use App\Http\Controllers\Dealer\BrandController as br;
use App\Http\Controllers\Dealer\CouponController as coup;
use App\Http\Controllers\Dealer\StockDealerController as st;
use App\Http\Controllers\Dealer\ DashboardController as dash;
use App\Http\Controllers\Dealer\PostdealerController as ps;
use App\Http\Controllers\Dealer\ProfilesController as pr;

/////////////////////////////


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
    return view('layouts.index');
});


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/password/change', [HomeController::class, 'changePassword'])->name('password.change');
Route::post('/password/update', [HomeController::class, 'updatePassword'])->name('password.update');
Route::get('/user/logout', [HomeController::class, 'Logout'])->name('user.logout');

//admin routes
Route::get('admin/home', [AdminController::class, 'index']);
Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);


Route::group(['namespace' => 'Admin', 'middleware' =>['api','auth']], function () {
   // Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});


Route::get('/fff', function () {
    return view('front.home');
})->name('front.home');


Route::get('about', function () {
    return view('front.about');
})->name('front.about');


Route::get('clients', function () {
    return view('front.clients');
})->name('front.clients');

Route::get('contact', function () {
    return view('front.contact');
})->name('front.contact');

Route::get('testmonial', function () {
    return view('front.testmonial');
})->name('front.testmonial');




    ######################### Begin Languages Route ########################
    define('PAGINATION_COUNT', 100);
    Route::group(['prefix' => 'languages'], function () {
        Route::get('admin/',[LanguagesController::class, 'index'])-> name('admin.languages');
        Route::get('admin/create',[LanguagesController::class, 'create']) -> name('admin.languages.create');
        Route::post('admin/store',[LanguagesController::class, 'store']) -> name('admin.languages.store');

        Route::get('admin/edit/{id}',[LanguagesController::class, 'edit']) -> name('admin.languages.edit');
        Route::post('admin/update/{id}',[LanguagesController::class, 'update']) -> name('admin.languages.update');

        Route::get('admin/delete/{id}',[LanguagesController::class, 'destroy']) -> name('admin.languages.delete');
    });


        Route::get('/jj', [DashboardController::class, 'index'])->name('admin.dashboard');
   
  

        
        Route::get('admin/maincategories',[MainCategoriesController::class, 'index']) -> name('admin.maincategories');
        Route::get('admin/maincategories/create',[MainCategoriesController::class, 'create']) -> name('admin.maincategories.create');
        Route::post('admin/store','MainCategoriesController@store') -> name('admin.maincategories.store');
        Route::get('admin/edit/{id}',[MainCategoriesController::class,'edit']) -> name('admin.maincategories.edit');
        Route::post('admin/update/{id}',[MainCategoriesController::class,'update']) -> name('admin.maincategories.update');
        Route::get('admin/delete/{id}',[MainCategoriesController::class,'destroy']) -> name('admin.maincategories.delete');
        Route::get('admin/changeStatus/{id}',[MainCategoriesController::class,'changeStatus']) -> name('admin.maincategories.status');

     ######################### Begin Sub Categoris Routes ########################
     Route::group(['prefix' => 'admin/sub_categories'], function () {
        Route::get('/',[SubCategoriesController::class,'index']) -> name('admin.subcategories');
        Route::get('create',[SubCategoriesController::class,'create']) -> name('admin.subcategories.create');
        Route::post('store',[SubCategoriesController::class,'store']) -> name('admin.subcategories.store');
        Route::get('edit/{id}',[SubCategoriesController::class,'edit']) -> name('admin.subcategories.edit');
        Route::post('update/{id}',[SubCategoriesController::class,'update']) -> name('admin.subcategories.update');
        Route::get('delete/{id}',[SubCategoriesController::class,'destroy']) -> name('admin.subcategories.delete');
        Route::get('changeStatus/{id}',[SubCategoriesController::class,'changeStatus']) -> name('admin.subcategories.status');

    });
    ######################### End  Sub Categoris Routes  ########################
  ######################### End  Sub Categoris Routes  ########################
  Route::group(['prefix' => 'admin/products'], function () {
    Route::get('/',[productController::class,'index']) -> name('admin.products');
    Route::get('create',[productController::class,'create']) -> name('admin.products.create');
    Route::post('store',[productController::class,'store']) -> name('admin.products.store');
    Route::get('edit/{id}',[productController::class,'edit']) -> name('admin.products.edit');
    Route::post('update/{id}',[productController::class,'update']) -> name('admin.products.update');
    Route::get('delete/{id}',[productController::class,'destroy']) -> name('admin.products.delete');
    Route::get('changeStatus/{id}',[productController::class,'changeStatus']) -> name('admin.products.status');

});
//Route::get('/', 'DashboardController@index')->name('admin.dashboard');

Route::get('/f', function () {
    return view('front.home');
})->name('front.home');


 ######################### Begin vendors Routes ########################
 Route::group(['prefix' => 'admin/vendors'], function () {
    Route::get('/',[VendorsController::class,'index']) -> name('admin.vendors');
    Route::get('create',[VendorsController::class,'create']) -> name('admin.vendors.create');
    Route::post('store',[VendorsController::class,'store']) -> name('admin.vendors.store');
    Route::get('edit/{id}',[VendorsController::class,'edit']) -> name('admin.vendors.edit');
    Route::post('update/{id}',[VendorsController::class,'update']) -> name('admin.vendors.update');
    Route::get('delete/{id}',[VendorsController::class,'destroy']) -> name('admin.vendors.delete');
    Route::get('changeStatus/{id}',[VendorsController::class,'changeStatus']) -> name('admin.VendorsController.status');

});
######################### End  vendors Routes  ########################
Route::group(['prefix' => 'admin/reports'], function () {
    Route::get('/',[reportsController::class,'index']) -> name('admin.reports');
    Route::get('create',[reportsController::class,'create']) -> name('admin.reports.create');
    Route::post('store',[reportsController::class,'store']) -> name('admin.reports.store');
    Route::get('edit/{id}',[reportsController::class,'edit']) -> name('admin.reports.edit');
    Route::get('show/{id}',[reportsController::class,'show']) -> name('admin.reports.show');
    Route::get('print/{id}',[reportsController::class,'print']) -> name('admin.invoices.print');
    Route::get('pdf/{id}',[reportsController::class,'pdf']) -> name('admin.invoices.pdf');
    Route::get('sendEmail/{id}',[reportsController::class,'send_to_email']) -> name('admin.reports.sendEmail');
    Route::post('update/{id}',[reportsController::class,'update']) -> name('admin.reports.update');
    Route::get('delete/{invoice_number}',[reportsController::class,'destroy']) -> name('admin.reports.delete');
 

});
Route::group(['prefix' => 'admin/invoices'], function () {
    Route::get('/',[InvoiceController::class,'index']) -> name('admin.invoices');
    Route::get('create',[InvoiceController::class,'create']) -> name('admin.invoices.create');
    Route::post('store',[InvoiceController::class,'store']) -> name('admin.invoices.store');
    Route::get('edit/{id}',[InvoiceController::class,'edit']) -> name('admin.invoices.edit');
    Route::get('show/{id}',[InvoiceController::class,'show']) -> name('admin.invoices.show');
    Route::get('print/{id}',[InvoiceController::class,'print']) -> name('admin.invoices.print');
    Route::get('pdf/{id}',[InvoiceController::class,'pdf']) -> name('admin.invoices.pdf');
    Route::get('sendEmail/{id}',[InvoiceController::class,'send_to_email']) -> name('admin.invoices.sendEmail');
    Route::post('update/{id}',[InvoiceController::class,'update']) -> name('admin.invoices.update');
    Route::get('delete/{invoice_number}',[InvoiceController::class,'destroy']) -> name('admin.invoices.delete');
    Route::get('changeStatus/{id}',[InvoiceController::class,'changeStatus']) -> name('admin.invoices.status');

});
// Password Reset Routes...

Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin-password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/reset/password/{token}', [ResetPasswordController::class, 'showReseForm'])->name('admin.password.reset');
Route::post('admin/update/reset', [ResetPasswordController::class, 'reset'])->name('admin.reset.update');
Route::get('/admin/Change/Password',[AdminController::class, 'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update',[AdminController::class, 'Update_pass'])->name('admin.password.update');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


    //Admin section
//Categories
Route::get('admin/categories', [CategoryController::class, 'category'])->name('categories');
Route::post('admin/store/category', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('delete/category/{id}', [CategoryController::class, 'deleteCategory']);
Route::get('edit/category/{id}', [CategoryController::class, 'editCategory']);
Route::post('update/category/{id}', [CategoryController::class, 'updateCategory']);

//Brand
Route::get('admin/brands', [BrandController::class, 'brand'])->name('brands');
Route::post('admin/store/brand', [BrandController::class, 'storeBrand'])->name('store.brand');
Route::get('delete/brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
Route::get('edit/brand/{id}', [BrandController::class, 'editBrand']);
Route::post('update/brand/{id}', [BrandController::class, 'updateBrand']);

//sub categories
Route::get('admin/sub/category', [SubCategoryController::class, 'subcategory'])->name('sub.categories');
Route::post('admin/store/subcat', [SubCategoryController::class, 'storeSubCat'])->name('store.subcategory');
Route::get('delete/subcategory/{id}', [SubCategoryController::class, 'deleteSubCat']);
Route::get('edit/subcategory/{id}', [SubCategoryController::class, 'editSubCat']);
Route::post('update/subcategory/{id}', [SubCategoryController::class, 'updateSubCat']);

// coupons all
Route::get('admin/sub/coupon', [CouponController::class, 'coupon'])->name('admin.coupon');
Route::post('admin/store/coupon', [CouponController::class, 'storeCoupon'])->name('store.coupon');
Route::get('delete/coupon/{id}', [CouponController::class, 'deleteCoupon']);
Route::get('edit/coupon/{id}', [CouponController::class, 'editCoupon']);
Route::post('update/coupon/{id}', [CouponController::class, 'updateCoupon']);

// newsletters
Route::get('admin/newsletter', [CouponController::class, 'newsletter'])->name('admin.newsletter');
Route::get('delete/subscriber/{id}', [CouponController::class, 'deleteSubscriber']);

//show sub categories with ajax
//if you put this route after product routes it stops working
Route::get('get/subcategory/{category_id}', [ProductController::class, 'getSubCat'])->name('add.product');


//Product Routes
Route::get('admin/product/all', [adminProductController::class, 'index'])->name('all.product');
Route::get('admin/product/add', [adminProductController::class, 'create'])->name('add.product');
Route::post('admin/store/product', [adminProductController::class, 'store'])->name('store.product');
Route::get('inactive/product/{id}', [adminProductController::class, 'inactive']);
Route::get('active/product/{id}', [adminProductController::class, 'active']);
Route::get('delete/product/{id}', [adminProductController::class, 'deleteProduct']);
Route::get('view/product/{id}', [adminProductController::class, 'viewProduct']);
Route::get('edit/product/{id}', [adminProductController::class, 'editProduct']);
Route::post('update/product/withoutphoto/{id}', [adminProductController::class, 'updateProductWithoutPhoto']);
Route::post('update/product/photo/{id}', [adminProductController::class, 'updateProductPhoto']);

//Blog admin all
Route::get('blog/category/list', [PostController::class, 'blogCatList'])->name('add.blog.categorylist');
Route::post('admin/store/blog', [PostController::class, 'blogCatStore'])->name('store.blog.category');
Route::get('delete/blog/category/{id}', [PostController::class, 'deleteBlogCat']);
Route::get('edit/blog/category/{id}', [PostController::class, 'editBlogCat']);
Route::post('update/blog/category/{id}', [PostController::class, 'updateBlogCat']);
Route::get('admin/add/post', [PostController::class, 'create'])->name('add.blogpost');
Route::get('admin/all/post', [PostController::class, 'index'])->name('all.blogpost');
Route::post('admin/store/post', [PostController::class, 'store'])->name('store.post');
Route::get('delete/post/{id}', [PostController::class, 'deletePost']);
Route::get('edit/post/{id}', [PostController::class, 'editPost']);
Route::post('update/post/{id}', [PostController::class, 'updatePost']);
 
//Admin Order Routes
Route::get('admin/pending/order', [OrderController::class, 'newOrder'])->name('admin.neworder');
Route::get('admin/view/order/{id}', [OrderController::class, 'viewOrder']);
Route::get('admin/payment/accept/{id}', [OrderController::class, 'paymentAccept']);
Route::get('admin/payment/cancel/{id}', [OrderController::class, 'paymentCancel']);

Route::get('admin/accept/payment', [OrderController::class, 'accepted'])->name('admin.accept.payment');
Route::get('admin/cancel/order', [OrderController::class, 'cancel'])->name('admin.cancel.order');
Route::get('admin/process/payment', [OrderController::class, 'process'])->name('admin.process.payment');
Route::get('admin/success/payment', [OrderController::class, 'success'])->name('admin.success.payment');
Route::get('admin/delivery/process/{id}', [OrderController::class, 'delivery']);
Route::get('admin/delivery/done/{id}', [OrderController::class, 'done']);
    

//SEO settings
Route::get('admin/seo', [SeoController::class, 'seo'])->name('admin.seo');
Route::post('admin/seo/update', [SeoController::class, 'update'])->name('update.seo');

//Report page routes
Route::get('admin/today/order', [ReportController::class, 'todayOrder'])->name('today.order');
Route::get('admin/today/delivery', [ReportController::class, 'todayDelivery'])->name('today.delivery');
Route::get('admin/month/orders', [ReportController::class, 'monthOrders'])->name('month.orders');
Route::get('admin/search/report', [ReportController::class, 'search'])->name('search.report');


//Report Search routes
Route::post('admin/search/by/year', [ReportController::class, 'searchByYear'])->name('search.by.year');
Route::post('admin/search/by/month', [ReportController::class, 'searchByMonth'])->name('search.by.month');
Route::post('admin/search/by/date', [ReportController::class, 'searchByDate'])->name('search.by.date');


//Admin User Role Routes
Route::get('admin/all/user', [UserRoleController::class, 'userRole'])->name('admin.all.user');
Route::get('admin/create/admin', [UserRoleController::class, 'createUser'])->name('create.admin');
Route::post('admin/store/admin', [UserRoleController::class, 'storeUser'])->name('store.admin');
Route::get('delete/admin/{id}', [UserRoleController::class, 'deleteUser']);
Route::get('edit/admin/{id}', [UserRoleController::class, 'editUser']);
Route::post('admin/update/admin', [UserRoleController::class, 'updateUser'])->name('update.admin');


//Admin site setting routes
Route::get('admin/site/setting', [SettingController::class, 'siteSetting'])->name('admin.site.setting');
Route::post('admin/setting/update', [SettingController::class, 'updateSetting'])->name('update.sitesetting');

//Admin Return Reqeusts Routes
Route::get('admin/return/request/', [ReturnRequestController::class,'returnRequest'])->name('admin.return.request');
Route::get('admin/approve/return/{id}', [ReturnRequestController::class, 'approveReturn']);
Route::get('admin/deny/return/{id}', [ReturnRequestController::class, 'denyReturn']);
Route::get('admin/all/requests/', [ReturnRequestController::class, 'allRequests'])->name('admin.all.requests');

//Admin Stock Management Routes
Route::get('admin/product/stock/', [StockController::class, 'viewStock'])->name('admin.product.stock');


//Admin Contact Message Routes
Route::get('admin/message/all', [ContactMessageController::class, 'allMessage'])->name('all.message');
Route::get('admin/view/message/{id}', [ContactMessageController::class, 'viewMessage']);



//******************************************************************************************************
//FrontEnd/User routes
Route::post('store/newsletter', [FrontController::class, 'storeNewsletter'])->name('store.newsletter');


// ADD wishlist
Route::get('add/wishlist/{id}', [WishlistController::class, 'addWishlist']);

// ADD to Cart
Route::get('add/to/cart/{id}', [CartController::class, 'addCart']);
Route::get('check', [CartController::class, 'check']);

Route::post('cart/product/add/{id}', [userProductController::class, 'addCart']);
Route::get('product/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('remove/cart/{rowId}', [CartController::class, 'removeCart']);
Route::post('update/cart/item/', [CartController::class, 'updateCart'])->name('update.cartitem');

Route::get('/cart/product/view/{id}', [CartController::class, 'viewProduct']);
Route::post('insert/into/cart/', [CartController::class, 'insertCart'])->name('insert.into.cart');

Route::get('/cart/product/view/{id}', [CartController::class, 'viewProduct']);
Route::get('user/checkout/', [CartController::class, 'checkout'])->name('user.checkout');
Route::get('user/wishlist/', [CartController::class, 'wishlist'])->name('user.wishlist');

Route::post('user/apply/coupn/', [CartController::class, 'coupon'])->name('apply.coupon');
Route::get('coupon/remove/', [CartController::class, 'couponRemove'])->name('coupon.remove');


//Frontend Product routes
Route::get('/product/details/{id}/{product_name}', [userProductController::class, 'productView']);

//Blog Post Routes
Route::get('blog/post/', [BlogController::class, 'blog'])->name('blog.post');
Route::get('language/english', [BlogController::class, 'english'])->name('language.english');
Route::get('language/arabic', [BlogController::class, 'arabic'])->name('language.arabic');
Route::get('blog/single/{id}', [BlogController::class, 'blogSingle']);

//Payment
Route::get('payment/page', [CartController::class, 'paymentPage'])->name('payment.step');
Route::post('user/payment/process/', [PaymentController::class, 'payment'])->name('payment.process');
Route::post('user/stripe/charge/', [PaymentController::class, 'stripeCharge'])->name('stripe.charge');
Route::post('user/cash/charge/', [PaymentController::class, 'cashCharge'])->name('cash.charge');


//Product Details Page
Route::get('products/{id}', [userProductController::class, 'productsView']);
Route::get('allcategory/{id}', [userProductController::class, 'categoryView']);


//user view order details
Route::get('user/view/order/{id}', [HomeController::class, 'viewOrder']);

//Order Tracking
Route::post('order/tracking', [FrontController::class, 'orderTracking'])->name('order.tracking');

//Return Order routes
Route::get('return/order/', [ReturnOrderController::class, 'returnOrder'])->name('return.order');
Route::get('request/return/{id}', [ReturnOrderController::class, 'returnRequest']);

//Contact Page Routes
Route::get('contact/page', [ContactController::class, 'contact'])->name('contact.page');
Route::post('contact/form', [ContactController::class, 'contactForm'])->name('contact.form');

//Search Routes
Route::post('product/search', [UserSearchController::class, 'search'])->name('product.search');










////////////////////////////////////////////////////////



Route::get('dealer/product',[p::class,'index']) -> name('dealer.product');

Route::get('dealer/product/create',[p::class,'create']) -> name('dealer.product.create');

        Route::post('dealer/product/store',[p::class,'store']) -> name('dealer.product.store');

        Route::get('dealer/product/edit/{id}',[p::class,'edit']) -> name('dealer.product.edit');

        Route::post('dealer/product/update/{id}',[p::class,'update']) -> name('dealer.product.update');

        Route::get('dealer/product/delete/{id}',[p::class,'destroy']) -> name('dealer.product.delete');



Route::get('dealer/product/stock/', [st::class, 'viewStock'])->name('dealer.product.stock');




Route::get('dealer/brands', [br::class, 'brand'])->name('dealer.brands');
Route::post('dealer/store/brand', [br::class, 'storeBrand'])->name('dealer.store.brand');
Route::get('dealer/delete/brand/{id}', [br::class, 'deleteBrand']);
Route::get('dealer/edit/brand/{id}', [br::class, 'editBrand']);
Route::post('dealer/update/brand/{id}', [br::class, 'updateBrand']);


Route::get('dealer/coupon', [coup::class, 'coupon'])->name('dealer.coupon');
Route::post('dealer/store/coupon', [coup::class, 'storeCoupon'])->name('dealer.store.coupon');
Route::get('dealer/delete/coupon/{id}', [coup::class, 'dealer.deleteCoupon']);
Route::get('dealer/edit/coupon/{id}', [coup::class, 'dealer.editCoupon']);
Route::post('dealer/update/coupon/{id}', [coup::class, 'dealer.updateCoupon']);

Route::get('dealer/newsletter', [coup::class, 'newsletter'])->name('dealer.newsletter');
Route::get('dealer/subscriber/{id}', [coup::class, 'deleteSubscriber']);
 //Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

//Route::get('/dealer/', [LogindealerController::class, 'getLogin'])->name('dealer.logindealer');
//Route::post('/dealer/', [LogindealerController::class, 'login']);


//Route::group(['namespace' => 'Dealer', 'middleware' => 'auth:dealer'], function () {

   Route::get('dealer/edit/{id}', [pr::class,'edit'])->name('dealer.edit');
 Route::post('dealer/updateprofile/{id}', [pr::class,'updateprofile'])->name('dealer.updateprofile');
Route::get('dealer/sure_delete/{id}',  [pr::class,'sure_delete'])->name('dealer.sure_delete');
 Route::get('dealer/delete/{id}',  [pr::class,'destroy'])->name('dealer.delete');

    //Route::get('logout', 'Auth\LogindealerController@logout')->name('dealer.logout');
     // Route::get('logout', 'Auth\LogindealerController@logout')->name('dealer.logout');
       
    Route::get('dealer/dashboard', [dash::class,'index'])->name('dealer.dashboard');
  //Route::get('dealer/logout', [LogindealerController::class,'logout'])->name('dealer.logout');


 //Route::group(['prefix' => 'product'], function () {
        
   
  
//});

Route::get('dealer/blog/category/list', [ps::class, 'blogCatList'])->name('dealer.add.blog.categorylist');
Route::post('dealer/store/blog', [ps::class, 'blogCatStore'])->name('dealer.store.blog.category');
Route::get('dealer/delete/blog/category/{id}', [ps::class, 'deleteBlogCat']);
Route::get('dealer/edit/blog/category/{id}', [ps::class, 'editBlogCat']);
Route::post('dealer/update/blog/category/{id}', [ps::class, 'updateBlogCat']);
Route::get('dealer/add/post', [ps::class, 'create'])->name('dealer.add.blogpost');

Route::get('dealer/all/post', [ps::class, 'index'])->name('dealer.all.blogpost');
Route::post('dealer/store/post', [ps::class, 'store'])->name('dealer.store.post');

Route::get('dealer/delete/post/{id}', [ps::class, 'deletePost']);
Route::get('dealer/edit/post/{id}', [ps::class, 'editPost']);
Route::post('dealer/update/post/{id}', [ps::class, 'updatePost']);



Route::get('order/register',[App\Http\Controllers\OrderRegisterController::class, 'getReg'])->name('home.contact');
    Route::post('order/register',[App\Http\Controllers\OrderRegisterController::class, 'postReg']);
   


///////////////////////////////////////////////////////



