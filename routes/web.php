<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UserDetailController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EnquiriesController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseOfferController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\DemosController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;

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
        //Frontend Login
        Route::post("postLogin", [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('postLogin');
        Route::post("postForgotPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgotPassword');
        Route::get("resetPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');
        Route::post("postResetPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postResetPassword'])->name('postResetPassword');

        Route::get("logout", [App\Http\Controllers\Auth\LoginController::class, "logout",])->name("webLogout");
        Route::get('registration', [App\Http\Controllers\Auth\RegisterController::class, 'registration'])->name('front.register');
        Route::post('post-registration', [App\Http\Controllers\Auth\RegisterController::class, 'postRegistration'])->name('register.post'); 

        
        //Frontend Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Front\DashboardController::class, 'index'])->name('front.dashboard'); 
        Route::get('/dashboard/profile', [App\Http\Controllers\Front\DashboardController::class, 'profile'])->name('webuser.profile'); 
        Route::post('dashboard/update/{id}', [App\Http\Controllers\Front\DashboardController::class, 'update'])->name('profile.Update');
        Route::get('/dashboard/demos', [App\Http\Controllers\Front\DashboardController::class, 'demos'])->name('front.demo');
        Route::get('/dashboard/orders', [App\Http\Controllers\Front\DashboardController::class, 'orders'])->name('front.order');

        //Frontend Pages
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/setCountry', [HomeController::class, 'setCountry'])->name('setCountry');
        Route::get('/course-detail/{id}', [App\Http\Controllers\Front\CourseDetailController::class, 'index'])->name('courseDetails');
        Route::post('/book_a_demo', [App\Http\Controllers\Front\CourseDetailController::class, 'bookDemo'])->name('book-a-demo');
        Route::get('/pages/guidelines', [App\Http\Controllers\Front\PageController::class, 'guidelines'])->name("class.guidelines");
        Route::get('/pages/terms-conditions', [App\Http\Controllers\Front\PageController::class, 'terms_conditions'])->name("terms.conditions");
        Route::get('/pages/privacy-policy', [App\Http\Controllers\Front\PageController::class, 'privacy_policy'])->name("privacy.policy");
        Route::get('/faqs', [App\Http\Controllers\Front\FaqController::class, 'index'])->name("faqsDeatail");
        Route::get('/booking/{id}',[App\Http\Controllers\Front\BookingController::class,'index'])->name("booking.Deatail");
        Route::post('/demo_booking',[App\Http\Controllers\Front\BookingController::class,'demo_booking'])->name("demo.Booking");
        Route::post('/fetch_timezone', [App\Http\Controllers\Front\BookingController::class, 'storeTimezone'])->name("store.timezone");
        Route::get('/buy-course/{id}',[App\Http\Controllers\Front\BookingController::class,'buy_course'])->name("Buy.Course");
        Route::post('/store-Buy-course',[App\Http\Controllers\Front\BookingController::class,'storeBuycourse'])->name("Store.Buy.Course");


    Route::prefix("/admin")->namespace("Admin")->group(function(){
         Route::namespace("Auth")->group(function(){
             Route::group(["middleware" => ["guest:admin"]], function () {
                    Route::get("login", [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('adminLogin');
                    Route::post("login", [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('postAdminLogin');
                    //forgot password
                    Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
                    Route::post("/postForgotPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postAdminForgotPassword');

                    Route::get("/resetPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'adminResetPassword'])->name('adminResetPassword');
                    Route::post("/postResetPassword", [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postAdminResetPassword'])->name('postAdminResetPassword');
                
                });
                // Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
                // Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

                //Admin Logout
                Route::get("logout", [App\Http\Controllers\Auth\LoginController::class, "logout",])->name("adminLogout");
        
            });

        Route::group(['middleware' => ["auth:admin,staff"]], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('adminHome');
            Route::get("/dashboard", [DashboardController::class, 'index'])->name('adminDashboard');
            //change password
            Route::get('change-password', [ChangePasswordController::class, 'index'])->name('changePassword');
            Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
            //users
            Route::get("/users", [UsersController::class, 'index'])->name("usersList");
            Route::get('users/create', [UsersController::class, 'create'])->name('usersCreate');
            Route::post('users/store', [UsersController::class, 'store'])->name('usersSave');
            Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('usersEdit');
            Route::put('users/update/{id}', [UsersController::class, 'update'])->name('usersUpdate');
            Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('usersDelete');
            Route::get('users/users_status/{id}', [UsersController::class, 'users_status'])->name('usersStatus');
            Route::get('users/profile', [UsersController::class, 'profile'])->name('userProfile');
            Route::post('users/profile_update/{id}', [UsersController::class, 'profile_update'])->name('user.profile.Update');

            //userDetails
            Route::get('/userDetails/{id}', [UserDetailController::class, 'index'])->name("userDetailsList");
            Route::get('userDetails/create', [UserDetailController::class, 'create'])->name('userDetailsCreate');
            Route::post('userDetails/store', [UserDetailController::class, 'store'])->name('userDetailsSave');
            Route::get('userDetails/edit/{id}', [UserDetailController::class, 'edit'])->name('userDetailsEdit');
            Route::post('userDetails/update/{id}', [UserDetailController::class, 'update'])->name('userDetailsUpdate');
            Route::get('userDetails/delete/{id}', [UserDetailController::class, 'userDetails'])->name('userDetailsDelete');
            Route::get('userDetails/userDetails_status/{id}', [UserDetailController::class, 'userDetails_status'])->name('userDetailsStatus');
            
            //page
            Route::get("/page", [App\Http\Controllers\Admin\PagesController::class, 'index'])->name("pageList");
            Route::get('page/create', [App\Http\Controllers\Admin\PagesController::class, 'create'])->name('pageCreate');
            Route::post('page/store', [App\Http\Controllers\Admin\PagesController::class, 'store'])->name('pageSave');
            Route::get('page/edit/{id}', [App\Http\Controllers\Admin\PagesController::class, 'edit'])->name('pageEdit');
            Route::post('page/update/{id}', [App\Http\Controllers\Admin\PagesController::class, 'update'])->name('pageUpdate');
            Route::get('page/delete/{id}', [App\Http\Controllers\Admin\PagesController::class, 'destroy'])->name('pageDelete');
            Route::get('page/page_status/{id}', [App\Http\Controllers\Admin\PagesController::class, 'page_status'])->name('pageStatus');
            //Banners
            Route::get("/banners", [BannersController::class, 'index'])->name("bannersList");
            Route::get('banners/create', [BannersController::class, 'create'])->name('bannersCreate');
            Route::post('banners/store', [BannersController::class, 'store'])->name('bannersSave');
            Route::get('banners/edit/{id}', [BannersController::class, 'edit'])->name('bannersEdit');
            Route::post('banners/update', [BannersController::class, 'update'])->name('bannersUpdate');
            Route::get('banners/delete/{id}', [BannersController::class, 'destroy'])->name('bannersDelete');
            Route::get('banners/banner_status/{id}', [BannersController::class, 'banner_status'])->name('bannersStatus');
            

            //testimonial 
            Route::get("/testimonial", [TestimonialController::class, 'index'])->name("testimonialsList");
            Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonialsCreate');
            Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonialsSave');
            Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonialsEdit');
            Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonialsUpdate');
            Route::get('testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonialsDelete');
            Route::get('testimonial/testimonials_status/{id}', [TestimonialController::class, 'testimonials_status'])->name('testimonialsStatus');     
            
            //setting
            Route::get("/setting", [SettingController::class, 'index'])->name("settingsList");
            Route::get('setting/create', [SettingController::class, 'create'])->name('settingsCreate');
            Route::post('setting/store', [SettingController::class, 'store'])->name('settingsSave');
            Route::get('setting/edit/{id}', [SettingController::class, 'edit'])->name('settingsEdit');
            Route::post('setting/setting_update/{id}', [SettingController::class, 'setting_update'])->name('settingsUpdate');
            Route::get('setting/delete/{id}', [SettingController::class, 'destroy'])->name('settingsDelete');
            Route::get('setting/setting_status/{id}', [SettingController::class, 'setting_status'])->name('settingsStatus');
            //faq
            Route::get("/faqs", [FaqController::class, 'index'])->name("faqsList");
            Route::get('faqs/create', [FaqController::class, 'create'])->name('faqsCreate');
            Route::post('faqs/store', [FaqController::class, 'store'])->name('faqsSave');
            Route::get('faqs/edit/{id}', [FaqController::class, 'edit'])->name('faqsEdit');
            Route::post('faqs/update/{id}', [FaqController::class, 'update'])->name('faqsUpdate');
            Route::get('faqs/delete/{id}', [FaqController::class, 'faqs'])->name('faqsDelete');
            Route::get('faqs/faqs_status/{id}', [FaqController::class, 'faqs_status'])->name('faqsStatus');

            //offers
            Route::get("/offers", [OfferController::class, 'index'])->name("offersList");
            Route::get('offers/create', [OfferController::class, 'create'])->name('offersCreate');
            Route::post('offers/store', [OfferController::class, 'store'])->name('offersSave');
            Route::get('offers/edit/{id}', [OfferController::class, 'edit'])->name('offersEdit');
            Route::post('offers/update/{id}', [OfferController::class, 'update'])->name('offersUpdate');
            Route::get('offers/delete/{id}', [OfferController::class, 'offers'])->name('offersDelete');
            Route::get('offers/offers_status/{id}', [OfferController::class, 'offers_status'])->name('offersStatus');

            

            //country
            Route::get("/country", [CountryController::class, 'index'])->name("countryList");
            Route::get('country/create', [CountryController::class, 'create'])->name('countryCreate');
            Route::post('country/store', [CountryController::class, 'store'])->name('countrySave');
            Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('countryEdit');
            Route::post('country/update/{id}', [CountryController::class, 'update'])->name('countryUpdate');
            Route::get('country/delete/{id}', [CountryController::class, 'country'])->name('countryDelete');
            Route::get('country/country_status/{id}', [CountryController::class, 'country_status'])->name('countryStatus');

            // Country Time Zone
            Route::get("/time-zone/{id}", [CountryController::class,'TimeZoneList'])->name("timezone.List");
            Route::get('time-zone/{id}/timezonecreate', [CountryController::class, 'timezonecreate'])->name('timezoneCreate');
            Route::post('time-zone/timezonestore', [CountryController::class, 'timezonestore'])->name('timezoneSave');
            Route::get('time-zone/timezoneedit/{id}', [CountryController::class, 'timezoneedit'])->name('timezoneEdit');
            Route::post('time-zone/timezoneupdate/{id}', [CountryController::class, 'timezoneupdate'])->name('timezoneUpdate');
            Route::get('time-zone/timezonedelete/{id}', [CountryController::class, 'timezonedelete'])->name('timezoneDelete');
            Route::get('time-zone/timezone_status/{id}', [CountryController::class, 'timezone_status'])->name('timezoneStatus');

            //Bookin Demo 
            Route::get("/demo", [DemosController::class, 'index'])->name("demoList");            
            Route::post('demo/store', [DemosController::class, 'sendInvitation'])->name('sendInvitations');

           // Buy Course
            Route::get("/buycourse", [OrderController::class, 'index'])->name("ordersList");
            Route::post('buy/store', [OrderController::class, 'sendOrderInvitation'])->name('sendOrderInvitations');

   
            });
            Route::group(['middleware' => ["auth:admin"]], function () {
                //course 
                Route::get("/course", [CourseController::class, 'index'])->name("coursesList");
                Route::get('course/create', [CourseController::class, 'create'])->name('coursesCreate');
                Route::post('course/store', [CourseController::class, 'store'])->name('coursesSave');
                Route::get('course/edit/{id}', [CourseController::class, 'edit'])->name('coursesEdit');
                Route::post('course/update/{id}', [CourseController::class, 'update'])->name('coursesUpdate');
                Route::get('course/delete/{id}', [CourseController::class, 'destroy'])->name('coursesDelete');
                Route::get('course/courses_status/{id}', [CourseController::class, 'courses_status'])->name('coursesStatus');
                Route::get("course/course-prices/{id}", [CourseController::class, 'course_prices'])->name("coursePrices");
                Route::post('course/store-course-prices', [CourseController::class, 'store_course_prices'])->name('storeCoursePrices');
                Route::get("course/course-featured/{id}", [CourseController::class, 'course_featured'])->name("courseFeatured");
                Route::post('course/store-course-featured', [CourseController::class, 'store_course_featured'])->name('storeCourseFeatured');

                Route::get("course/course-curriculum/{id}", [CourseController::class, 'course_curriculum'])->name("Course.Curriculum.list");
                Route::post('course/store-course-curriculum', [CourseController::class, 'store_course_curriculum'])->name('storeCurriculum');

                //Course Offers
                Route::get('course-offer/{id}', [CourseOfferController::class, 'index'])->name('Course.Offers.list');
                Route::get('course-offer/{id}/create', [CourseOfferController::class, 'create'])->name('Course.Offers.Create');
                Route::post('course-offer/store', [CourseOfferController::class, 'store'])->name('Course.offers.Save');
                Route::get('course-offer/edit/{id}', [CourseOfferController::class, 'edit'])->name('Course.Offers.Edit');
                Route::get('course-offer/delete/{id}', [CourseOfferController::class, 'destroy'])->name('Course.Offers.Delete');
                Route::post('course-offer/update/{id}', [CourseOfferController::class, 'update'])->name('Course.Offers.Update');
                Route::get('course-offer/status/{id}', [CourseOfferController::class, 'status'])->name('Course.Offers.Status');
                Route::post('check-offer-country', [CourseOfferController::class, 'checkOfferCountry'])->name('checkOfferCountry');
            });
       });
