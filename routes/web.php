<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminMain;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SiteBlogController;
use App\Http\Controllers\SupplierDashController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserCheckoutController;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});
Route::get('/', [HomeController::class, 'index'])->name('main_page');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.category');
Route::get('/blog', [SiteBlogController::class, 'index'])->name('blog.page');
Route::get('/blog/{id}', [CategoryController::class, 'show'])->name('category.with.id');
Route::get('/blog_details/{id}', [BlogDetailsController::class, 'index'])->name('blog.details');
Route::get('/checkout', [UserCheckoutController::class, 'index'])->name('user.checkout');

Auth::routes();

Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/register_customer', [CustomerLoginController::class, 'registerCustomer'])->name('register.customer');
Route::post('/login_customer', [CustomerLoginController::class, 'login'])->name('login.customer');
Route::get('/delete_customer', [CustomerLoginController::class, 'logout'])->name('customer.logout');

Route::get('/user_cart', [UserCartController::class, 'index'])->name('user.cart');
Route::get('/add_to_cart', [UserCartController::class, 'addCart'])->name('add.to.cart');
Route::get('/delete_cart_items/{id}', [UserCartController::class, 'cartItemDelete'])->name('delete.cart.item');
Route::get('/delete_session_cart_item', [UserCartController::class, 'sessionCartItemDelete'])->name('delete.session.cart');
Route::get('/add_product_quantity', [UserCartController::class, 'incrementProductQuantity'])->name('plus.quantity');
Route::get('/minus_product_quantity', [UserCartController::class, 'decrementProductQuantity'])->name('minus.quantity');

Route::post('/checkout', [CheckoutController::class, 'order_details'])->name('order.detail');
Route::get('/confirmation', [ConfirmationController::class, 'index'])->name('confirmation.page');

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminMain::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


    Route::get('/admin/add_posts', [PostController::class, 'index'])->name('admin.add_post');
    Route::post('/admin/add_posts', [PostController::class, 'store']);
    Route::get('/admin/all_posts', [PostController::class, 'show_all_posts'])->name('admin.all_post');
    Route::get("/admin/all_posts/delete/{id}", [PostController::class, 'destroy'])->name('delete.post');
    Route::get("/admin/all_posts/edit_post/{id}", [PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/all_posts/edit_post/{id}', [PostController::class, 'update'])->name('admin.post.update');


    Route::get('/admin/all_categories', [AdminCategoryController::class, "view_all"])->name('admin.all_categories');
    Route::get('/admin/add_category', [AdminCategoryController::class, 'index'])->name('admin.add_category');
    Route::post('/admin/add_category', [AdminCategoryController::class, 'store']);


    Route::get('/admin/supplier_area', [SupplierDashController::class, 'index'])->name('supplier.area');
    Route::get('/admin/supplier_area/supplier_dashboard', [SupplierDashController::class, 'supplierDash'])->name('supplier.dash');
    Route::get('/admin/supplier_area/add_supplier', [SupplierDashController::class, 'addSupplier'])->name('add.supplier');
    Route::post('/admin/supplier_area/add_supplier', [SupplierDashController::class, 'storeSupplier'])->name('store.supplier');
    Route::get('/admin/supplier_area/all_supplier', [SupplierDashController::class, 'allSupplier'])->name('all.supplier');
    Route::get('/admin/supplier_area/edit_supplier/{id}', [SupplierDashController::class, 'editSupplierPage'])->name('edit.supplier.page');
    Route::post('/admin/supplier_area/edit_supplier/{id}', [SupplierDashController::class, 'updateSupplier'])->name('update.supplier.page');
    Route::get('/admin/supplier_area/defective_pieces', [SupplierDashController::class, 'defectivePiece'])->name('defective.pieces');
    Route::get('/admin/supplier_area/delete_supplier/{id}', [SupplierDashController::class, 'destroySupplier'])->name('delete.supplier');
    Route::get('/admin/supplier_relative_products', [SupplierDashController::class, 'relativeSellerProducts'])->name('supplier.products');
    Route::post('/admin/supplier_relative_products_save', [SupplierDashController::class, 'storeSupplierProducts'])->name('supplier.products.save');


    Route::get('/admin/all_product_categories', [ProductsController::class, 'allCategories'])->name('all.product.categories');
    Route::get('/admin/add_product_categories', [ProductsController::class, 'addCategories'])->name('add.product.categories');
    Route::post('/admin/add_product_categories', [ProductsController::class, 'storeProductCategory'])->name('store.product.categories');
    Route::get('/admin/edit_product_categories/{id}', [ProductsController::class, 'editCategory'])->name('edit.product.categories');
    Route::post('/admin/update_product_categories/{id}', [ProductsController::class, 'updateProductCategory'])->name('update.product.categories');
    Route::get('/admin/delete_product_category/{id}', [ProductsController::class, 'destroyProductCategory'])->name('delete.product.category');


    Route::get('/admin/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/admin/add_products', [ProductsController::class, 'addProduct'])->name('admin.add.product');
    Route::get('/admin/all_products', [ProductsController::class, 'allProduct'])->name('admin.all.product');
    Route::post('/admin/all_products', [ProductsController::class, 'storeProducts'])->name('store.product');
    Route::get('/admin/edit_products/{id}', [ProductsController::class, 'editRelativeProduct'])->name('edit.products');
    Route::post('/admin/edit_products/{id}', [ProductsController::class, 'updateProduct'])->name('update.products');
    Route::get('/admin/delete_product_image/{id}', [ProductsController::class, 'deleteProductImage'])->name('del.image');
});
