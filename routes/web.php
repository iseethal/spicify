<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\EnquiryController;
use App\Http\Controllers\backend\InvoiceController;
use App\Http\Controllers\frontend\CouponController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\backend\VariantsController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\PaymentController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\backend\VariantOptionsController;
use App\Http\Controllers\backend\PincodeController;
use App\Http\Controllers\frontend\PasswordResetController;
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

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Reset Password
Route::get('/forgot-password', [PasswordResetController::class, 'ForgotPassword'])->name('password.forgot');
Route::get('/reset-password', [PasswordResetController::class, 'ResetPassword'])->name('password.reset');
Route::post('/store-password', [PasswordResetController::class, 'StorePassword'])->name('password.store');
Route::post('/mail-password', [PasswordResetController::class, 'MailPassword'])->name('password.email');



// FRONTEND
Route::get('/home',[HomeController::class, 'Home'])->name('frontend.home');

// SHOP
Route::get('/',[ShopController::class, 'Shop'])->name('frontend.shop');
Route::get('/product_details',[ShopController::class, 'ProductDetails'])->name('frontend.single_product');

//  CONTACT
Route::get('/contact',[ContactController::class, 'Contact'])->name('contact');
Route::post('/save_contact',[ContactController::class, 'SaveContact'])->name('contact.save');

// SEARCH
Route::get('/search', [ShopController::class, 'index']);
Route::get('/ajax-autocomplete-search', [ShopController::class, 'selectSearch']);

// CART
Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::post('/addcart/{id}', [CartController::class, 'AddToCart'])->name('cart.store');
Route::get('/remove-from-cart/{id}', [CartController::class, 'Remove'])->name('remove.from.cart');
Route::get('/delete/{id}', [CartController::class, 'RemoveCart'])->name('cart.delete');
// Route::post('/cartupdate', [CartController::class, 'UpdateCart'])->name('cartupdate');
Route::post('/cartupdate', [CartController::class, 'UpdateCart'])->name('cart.update');

// ABOUT US
Route::get('/about_us',[ContactController::class,'AboutUs'])->name('aboutus');

// PRIVACY POLICY
Route::get('/privacy_policy',[ContactController::class,'PrivacyPolicy'])->name('privacypolicy');

// TERMS & CONDITIONS
Route::get('/terms_and_conditions',[ContactController::class,'TermsandCondiotions'])->name('termsandconditions');

// FSSAI Liscence
Route::get('/fssai_licence',[ContactController::class,'FssaiLicence'])->name('fssai_licence');

// WISHLIST
Route::get('/wishlist', [CartController::class, 'WishList'])->name('wishlist');
Route::post('/add_to_wishlist/{id}', [CartController::class, 'AddToWishList'])->name('wishlist.store');
// Route::delete('/remove-from-wishlist', [CartController::class, 'RemoveWishList'])->name('remove.from.wishlist');
Route::post('/wishlistToCart/{id}', [CartController::class, 'WishlistToCart'])->name('wishlist.to.cart');
Route::get('/delete_wishlist/{id}', [CartController::class, 'DeleteWishList'])->name('wishlist.delete');

// ORDER HISTORY
// Route::get('/order_history', [CartController::class, 'OrderHistory'])->name('orderhistory');
Route::get('/order_history', [PaymentController::class, 'Myaccount'])->name('orderhistory');

// CHECKOUT
Route::get('/checkout', [CheckoutController::class, 'Checkout'])->name('checkout');
Route::post('store_checkout', [CheckoutController::class, 'StoreCheckout'])->name('checkout.store');
Route::post('buy-now', [CheckoutController::class, 'BuyNow'])->name('buy-now');

// PAYMENT
Route::get('/payment', [PaymentController::class, 'Payment'])->name('payment');
Route::post('/make-payment', [PaymentController::class, 'MakePayment'])->name('make-payment');
Route::get('/success', [PaymentController::class, 'Success'])->name('success');
Route::get('/my_account', [PaymentController::class, 'Myaccount'])->name('my-account');


//  COUPON
Route::get('/coupon', [CouponController::class, 'Coupon'])->name('coupons');
Route::post('/apply_coupon', [CouponController::class, 'ApplyCoupon'])->name('coupon.apply');

// BACKEND
Route::get('/admin', [AdminController::class, 'Login'])->name('loggin');
Route::post('/signin',[AdminController::class, 'Save'])->name('admin.login');

Route::group(['prefix'=> 'admin', 'middleware'=>['Admin']], function(){

    Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard');
    Route::get('/signout', [AdminController::class,'SignOut'])->name('admin.logout');
    Route::get('/profile', [AdminController::class,'Profile'])->name('admin.profile');
    Route::get('/change_password',[AdminController::class,'ChangePassword'])->name('password.change');
    Route::post('/update_password/{id}',[AdminController::class,'UpdatePassword'])->name('password.update');

    //  CATEGORY
    Route::get('/categories',[CategoryController::class,'AllCategory'])->name('category.all');
    Route::get('/add_category',[CategoryController::class,'AddCategory'])->name('category.add');
    Route::post('/store_category',[CategoryController::class,'StoreCategory'])->name('category.store');
    Route::get('/edit_category',[CategoryController::class,'EditCategory'])->name('category.edit');
    Route::post('/update_category/{id}',[CategoryController::class,'UpdateCategory'])->name('category.update');
    Route::get('/delete_category/{id}',[CategoryController::class,'DeleteCategory'])->name('category.delete');

    //  VARIANTS
    Route::get('/variants',[VariantsController::class,'AllVariants'])->name('variants.all');
    Route::get('/add_variant',[VariantsController::class,'AddVariant'])->name('variants.add');
    Route::post('/store_variant',[VariantsController::class,'StoreVariant'])->name('variants.store');
    Route::get('/edit_variant',[VariantsController::class,'EditVariant'])->name('variants.edit');
    Route::post('/update_variant/{id}',[VariantsController::class,'UpdateVariant'])->name('variants.update');
    Route::get('/delete_variant/{id}',[VariantsController::class,'DeleteVariant'])->name('variants.delete');

    //  VARIANT OPTIONS
    Route::get('/products',[VariantOptionsController::class,'AllVariantOptions'])->name('variant_options.all');
    Route::get('/add_product',[VariantOptionsController::class,'AddVariantOption'])->name('variant_options.add');
    Route::post('/store_variant_option',[VariantOptionsController::class,'StoreVariantOption'])->name('variant_options.store');
    Route::get('/edit_product',[VariantOptionsController::class,'EditVariantOption'])->name('variant_options.edit');
    Route::post('/update_variant_option/{id}',[VariantOptionsController::class,'UpdateVariantOption'])->name('variant_options.update');
    Route::get('/delete_variant_option/{id}',[VariantOptionsController::class,'DeleteVariantOption'])->name('variant_options.delete');
    Route::get('/delete_amount_option/{id}',[VariantOptionsController::class,'DeleteAmountOption'])->name('amount_option.delete');

    //  SLIDERS
    Route::get('/sliders',[SliderController::class,'AllSlider'])->name('slider.all');
    Route::get('/add_slider',[SliderController::class,'AddSlider'])->name('slider.add');
    Route::post('/store_slider',[SliderController::class,'StoreSlider'])->name('slider.store');
    Route::get('/edit_slider',[SliderController::class,'EditSlider'])->name('slider.edit');
    Route::post('/update_slider/{id}',[SliderController::class,'UpdateSlider'])->name('slider.update');
    Route::get('/delete_slider/{id}',[SliderController::class,'DeleteSlider'])->name('slider.delete');

    // ORDERS
    Route::get('/orders',[OrderController::class,'AllOrders'])->name('order.all');
    Route::get('/order_details',[OrderController::class,'OrderDetails'])->name('order.view');
    Route::post('/order_status_update/{id}',[OrderController::class,'OrderStatus'])->name('order.status');
    Route::get('/invoice',[OrderController::class, 'Invoice'])->name('invoice');
    

    // ENQUIRY
    Route::get('/enquiries',[EnquiryController::class,'AllEnquiries'])->name('enquiry.all');
    Route::get('/view_enquiries',[EnquiryController::class,'ViewEnquiries'])->name('enquiry.view');
    Route::post('/enquiry_status_update/{id}',[EnquiryController::class,'UpdateStatus'])->name('update.status');
    Route::get('/delete_enquiry/{id}',[EnquiryController::class,'DeleteEnquiry'])->name('enquiry.delete');
    Route::get('/edit_enquiry',[EnquiryController::class,'EditEnquiry'])->name('enquiry.edit');
    Route::post('/update_enquiry/{id}',[EnquiryController::class,'UpdateEnquiry'])->name('enquiry.update');

    // CUSTOMERS
    Route::get('/customers',[CustomerController::class,'AllCustomers'])->name('customer.all');
    Route::get('/customer_details',[CustomerController::class,'ViewCustomer'])->name('customer.view');

    // COUPON
    Route::get('/coupons', [CouponController::class, 'AllCoupons'])->name('coupons.all');
    Route::get('/add+coupon', [CouponController::class, 'AddCoupon'])->name('coupon.add');
    Route::post('/store_coupon',[CouponController::class,'StoreCoupon'])->name('coupon.store');
    Route::get('/edit_coupon',[CouponController::class,'EditCoupon'])->name('coupon.edit');
    Route::post('/update_coupon/{id}',[CouponController::class,'UpdateCoupon'])->name('coupon.update');
    Route::get('/delete_coupon/{id}',[CouponController::class,'DeleteCoupon'])->name('coupon.delete');

    // CONTACT
    Route::get('/all_contacts',[ContactController::class, 'AllContact'])->name('contact.all');
    Route::get('/view_contact',[ContactController::class, 'ViewContact'])->name('contact.view');
    Route::get('/delete_contact/{id}',[ContactController::class,'DeleteContact'])->name('contact.delete');
    Route::post('/update_contact',[ContactController::class,'UpdateContact'])->name('contact.update');

    // INVOICE
    // Route::get('/invoice',[InvoiceController::class, 'Invoice'])->name('invoice');
    Route::get('/invoice_list',[InvoiceController::class,'InvoiceList'])->name('invoice.List');

    //  PINCODE
    Route::get('/pincodes',[PincodeController::class,'AllPincodes'])->name('pincodes.all');
    Route::get('/add_pincode',[PincodeController::class,'AddPincode'])->name('pincodes.add');
    Route::post('/store_pincode',[PincodeController::class,'StorePincode'])->name('pincodes.store');
    Route::get('/edit_pincode',[PincodeController::class,'EditPincode'])->name('pincodes.edit');
    Route::post('/update_pincode/{id}',[PincodeController::class,'UpdatePincode'])->name('pincodes.update');
    Route::get('/delete_pincode/{id}',[PincodeController::class,'DeletePincode'])->name('pincodes.delete');

});


// Route::get('/register',[AdminController::class,'Register'])->name('register.view');
// Route::post('/store',[AdminController::class,'Save'])->name('register.store');
