<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdController,TagController,UserController,AdminController,BlogsController,PriceController,AdTipsController,PostAdController,StripeController,AdTermsController,CountryController,PackageController,CategoryController,FrontendController,AdBenefitController,TestimonialController,GeneralSettingController,AdCommentController, AdministrationController, LocalServiceController, SearchController,TransactionController, RentalAdController, BuySellTradeController, ArmeniaAdController};
// use App\Http\Controllers\CustomerAuthenticateController;


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.page');
    Route::get('/about', 'about')->name('about.page');
    Route::get('/blog', 'blogs')->name('blog');
    Route::get('/ads', 'ads')->name('ads');
    Route::get('/category/blogs/{id}', 'categoryWiseBlogs')->name('category.blog');
    Route::get('/tag/blogs/{id}', 'tagWiseBlogs')->name('tag.blogs');
    Route::get('/author/blogs/{id}', 'authorWiseBlogs')->name('author.blogs');
    Route::get('/blog-details/{slug}', 'blogDetails')->name('blog.details.page');
    Route::get('/contact', 'contact')->name('contact.page');
    Route::get('/ad-posts', 'adPosts')->name('ad.posts.page')->middleware('auth');
    Route::get('/all-categories','showCategories')->name('all.categories');
    Route::get('/classified/unsubscribe/{email}/{token}', 'unsubscribeMail')->name('unsubscribe');
    Route::get('/ad/categories/{id}', 'adCategories')->name('ad.categories');
    Route::get('/post/ad/{id}', 'postAd')->name('postAd');
});

Route::controller(RentalAdController::class)->group(function(){
    Route::post('/rental/ad', 'postAd')->name('rental.ad.post');
});

Route::controller(LocalServiceController::class)->group(function(){
    Route::post('/local/service/ad', 'postAd')->name('localServicePost.store');
});

Route::controller(BuySellTradeController::class)->group(function(){
    Route::post('/buy/sell/trade', 'postAd')->name('buySellTrade.ad.post');
});

Route::controller(ArmeniaAdController::class)->group(function(){
    Route::post('/armenia/ad', 'postAd')->name('armenia.ad.post');
});


Route::get('/category/search/{id}', [FrontendController::class, 'categorySearch'])->name('categorySearch');

//  all backend Controller
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'rolechecker'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });
        Route::resource('/categories',CategoryController::class);
        Route::resource('/generalSettings', GeneralSettingController::class);
        Route::resource('/blogs', BlogsController::class);
        Route::get('/title/settings', [FrontendController::class, 'titleIndex'])->name('titleSettings');
        Route::put('/title/settings/update/{id}', [FrontendController::class, 'titleUpdate'])->name('titleSettings.update');
        Route::resource('/testimonials', TestimonialController::class);
        Route::get('/contact/info', [FrontendController::class, 'contactInfo'])->name('contactInfo');
        Route::put('/contact/info/update/{id}', [FrontendController::class, 'contactUpdate'])->name('contact.update');
        Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
        Route::put('update/admin/info/{id}', [AdminController::class, 'updateAdminInfo'])->name('update.admin.info');
        Route::post('/change/password/{id}', [AdminController::class, 'changePassword'])->name('change.password');
        Route::get('/about/details', [FrontendController::class, 'aboutDetailsIndex'])->name('about.details.index');
        Route::put('/about/details/update/{id}', [FrontendController::class, 'aboutDetailsUpdate'])->name('about.details.update');
        Route::get('/about/feature', [FrontendController::class, 'aboutFeature'])->name('aboutFeature');
        Route::put('/about/feature/update/{id}', [FrontendController::class, 'aboutFeatureUpdate'])->name('aboutFeature.update');
        Route::get('/guest/message', [AdminController::class, 'guestMessages'])->name('guest.messages');
        Route::delete('/guest/message/delete/{id}', [AdminController::class, 'guestMessagesDestroy'])->name('message.destroy');
        Route::resource('/tag', TagController::class);
        Route::get('/blog/category', [BlogsController::class, 'categoryIndex'])->name('blogCategory.index');
        Route::post('/blog/category/store', [BlogsController::class, 'categoryStore'])->name('blogCategory.store');
        Route::put('/blog/category/update/{id}', [BlogsController::class, 'categoryUpdate'])->name('blogCategory.update');
        Route::delete('/blog/category/delete/{id}', [BlogsController::class, 'categoryDelete'])->name('blogCategory.destroy');
        Route::resource('/adTerm', AdTermsController::class);
        Route::resource('/adBenefit', AdBenefitController::class);
        Route::resource('/adTip', AdTipsController::class);
        Route::get('/stripe/key', [AdminController::class, 'stripeKey'])->name('stripeKey');
        Route::post('/stripe/key/update/{id}', [AdminController::class, 'stripeKeyUpdate'])->name('changeStripe');
        Route::post('/dark/mode', [AdminController::class, 'darkModeSetup'])->name('darkModeSetup');
        Route::get('/user/lists', [AdministrationController::class, 'index'])->name('user.index');
        Route::get('/admin/lists', [AdministrationController::class, 'adminIndex'])->name('admin.index');
        Route::get('/admin/role', [AdministrationController::class, 'roleIndex'])->name('admin.roleIndex');
        Route::get('/admin/permission', [AdministrationController::class, 'permissionIndex'])->name('admin.permissionIndex');

        //PriceController
        Route::get('/create-package',[PackageController::class,'create'])->name('package.create');
        Route::get('/package-list',[PackageController::class,'index'])->name('package.index');
        Route::post('/package-store',[PackageController::class,'store'])->name('package.store');
        Route::post('/package-update/{id}',[PackageController::class,'update'])->name('package.update');
        Route::get('/package-delete/{id}',[PackageController::class,'delete'])->name('package.delete');
        Route::get('delete-categories',[CategoryController::class,'deleteMultipleCategories'])->name('bulkCategory.delete');
        Route::get('/create-featured-package',[PackageController::class,'featuredCreate'])->name('featured.package.create');
        Route::get('/featured-package-list',[PackageController::class,'featuredIndex'])->name('featured.package.index');
        Route::post('/featured-package-store',[PackageController::class,'featuredStore'])->name('featured.package.store');
        Route::post('feature-package-delete/{id}',[PackageController::class,'featureDelete'])->name('feature.package.delete');
        Route::post('/feature-Ppackage-update/{id}',[PackageController::class,'featureUpdate'])->name('feature.package.update');

        //AdController
        Route::get('/ads',[AdController::class,'index'])->name('ad.index');
        Route::post('/ad-delete/{id}',[AdController::class,'delete'])->name('ad.delete');
        Route::get('/total/transaction/list', [TransactionController::class, 'totalGenerate'])->name('total.generate');

        //countryController
        Route::controller(CountryController::class)->group(function(){
            Route::get('/country-list','index')->name('country.index');
            Route::post('/country-add','store')->name('country.add');
            Route::post('/country-delete/{id}','delete')->name('country.delete');
        });
    });

});

Route::get('/category-ads/{id}',[PostAdController::class,'index'])->name('category.ads');
Route::get('/country-ads/{id}',[PostAdController::class,'countryWiseAds'])->name('country.wise.post');
Route::get('/ad-details/{id}',[PostAdController::class,'adDetails'])->name('ad.details');
Route::get('/user-ads/{id}',[PostAdController::class,'userWiseAd'])->name('users.ad');
Route::get('/update-react',[PostAdController::class,'updateReact'])->name('update.react');
Route::get('/search',[PostAdController::class,'searchAd'])->name('search.ad');

Route::post('/write/comment', [BlogsController::class, 'writeComment'])->name('write.comment');
Route::post('/reply/comment/{id}', [BlogsController::class, 'replyComment'])->name('reply.comment');
Route::post('/subscribeMail', [FrontendController::class, 'subscribeMail'])->name('subscribeMail');
Route::post('/guest/message', [FrontendController::class, 'guestMessages'])->name('guest.message');
Route::post('/blog/search', [FrontendController::class, 'blogSearch'])->name('blogSearch');
Route::post('/blog/search/category', [FrontendController::class, 'blogSearchByCategroy'])->name('blogSearchByCategory');
Route::post('/blog/search/author', [FrontendController::class, 'blogSearchByAuthor'])->name('blogSearchByAuthor');
Route::post('/blog/search/tag', [FrontendController::class, 'blogSearchByTag'])->name('blogSearchByTag');

Route::controller(AdCommentController::class)->group(function(){
    Route::post('/ad-comment','store')->name('adComment.store');
    Route::post('/reply','replyStore')->name('reply.store');
});

Route::controller(SearchController::class)->group(function(){
    Route::post('/category/search/result','categorySearch')->name('banner.search');
    Route::get('/keyword-search/{id}','keywordSearch')->name('keyword.search');
});

// user controllers
Route::middleware('auth', 'verified')->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::put('/user/profile/update/{id}', [UserController::class, 'updateUserProfile'])->name('user.profile.update');
    Route::put('/user/password/update/{id}', [UserController::class, 'updateUserPassword'])->name('user.password.update');
    Route::get('/delete/ad/{id}', [UserController::class, 'deleteAd'])->name('delete.ad');
    Route::get('/edit/ad/{id}',[AdController::class,'editAd'])->name('edit.ad');
    Route::post('/update/user/ad/{id}',[AdController::class,'updateAd'])->name('adPost.update');
    Route::get('/renew/user/ad/{id}',[AdController::class,'renewAd'])->name('renew.ad');
    Route::post('/update/user/ad/package/{id}',[AdController::class,'updateAdPackage'])->name('update.ad.package');
    Route::get('/user/ad/feature/{id}',[AdController::class,'adFeature'])->name('ad.feature');
    Route::post('/update/user/ad/feature/{id}',[AdController::class,'updateAdFeature'])->name('update.ad.feature');

    // strpe checkout methods
    Route::controller(StripeController::class)->group(function(){
        Route::get('stripe', 'stripe');
        Route::post('/checkout', 'checkout')->name('stripe.post');
        Route::get('/success/{id}/{trans_id}', 'success')->name('checkout.success');
        Route::get('update/package/success/{id}', 'updatePackageSuccess')->name('checkout.updatePackage.success');
        Route::get('update/feature/success/{id}', 'updateFeatureSuccess')->name('checkout.updateFeature.success');
    });

});
