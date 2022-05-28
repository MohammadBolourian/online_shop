<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\admin\content\FaqController;
use App\Http\Controllers\admin\content\MenuController;
use App\Http\Controllers\admin\content\PageController;
use App\Http\Controllers\admin\content\PostController;
use App\Http\Controllers\Admin\Custom\IndexPicController;
use App\Http\Controllers\Admin\Custom\LinkController;
use App\Http\Controllers\Admin\Custom\SliderController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\admin\market\OrderController;
use App\Http\Controllers\admin\market\PaymentController;
use App\Http\Controllers\admin\market\ProductController;
use App\Http\Controllers\Admin\Market\ProductGalleryController;
use App\Http\Controllers\admin\market\PropertyController;
use App\Http\Controllers\admin\market\StoreController;
use App\Http\Controllers\admin\notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\admin\notify\SMSController;
use App\Http\Controllers\admin\setting\SettingController;
use App\Http\Controllers\admin\ticket\TicketController;
use App\Http\Controllers\admin\user\AdminUserController;
use App\Http\Controllers\admin\user\CustomerController;
use App\Http\Controllers\admin\user\PermissionController;
use App\Http\Controllers\admin\user\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenController;
use App\Models\User;
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




Route::prefix('admin')->namespace('Admin')->group( function (){

    Route::get('/',[AdminDashboardController::class,'index'])->name('admin.home');
    Route::get('/see-profile{user}',[AdminDashboardController::class,'seeProfile'])->name('admin.see-profile');
    Route::get('/logout',[AdminDashboardController::class, 'logout'])->name('admin.logout');

    Route::post('attribute/values',[AttributeController::class,'getValues']);
    //============================> Market
    Route::prefix('market')->namespace('Market')->group(function (){

        //============================> Category------!!!
        Route::prefix('category')->group(function (){
            Route::get('/',[CategoryController::class,'index'])->name('admin.market.category.index');
            Route::get('/create',[CategoryController::class,'create'])->name('admin.market.category.create');
            Route::post('/store',[CategoryController::class,'store'])->name('admin.market.category.store');
            Route::get('/edit{category}',[CategoryController::class,'edit'])->name('admin.market.category.edit');
            Route::put('/update{category}',[CategoryController::class,'update'])->name('admin.market.category.update');
            Route::delete('/destroy{category}',[CategoryController::class,'destroy'])->name('admin.market.category.destroy');
        });
        //============================> Brand------!!!
        Route::prefix('brand')->group(function (){
            Route::get('/',[BrandController::class,'index'])->name('admin.market.brand.index');
            Route::get('/create',[BrandController::class,'create'])->name('admin.market.brand.create');
            Route::post('/store',[BrandController::class,'store'])->name('admin.market.brand.store');
            Route::get('/edit{id}',[BrandController::class,'edit'])->name('admin.market.brand.edit');
            Route::put('/update{id}',[BrandController::class,'update'])->name('admin.market.brand.update');
            Route::delete('/destroy{id}',[BrandController::class,'destroy'])->name('admin.market.brand.destroy');
        });
        //============================> Comment------!!!
        Route::prefix('comment')->group(function (){
            Route::get('/',[CommentController::class,'index'])->name('admin.market.comment.index');
            Route::get('/show{comment}',[CommentController::class,'show'])->name('admin.market.comment.show');
            Route::post('/store',[CommentController::class,'store'])->name('admin.market.comment.store');
            Route::get('/edit{id}',[CommentController::class,'edit'])->name('admin.market.comment.edit');
            Route::put('/update{comment}',[CommentController::class,'update'])->name('admin.market.comment.update');
            Route::delete('/destroy{comment}',[CommentController::class,'destroy'])->name('admin.market.comment.destroy');
        });
        //============================> Delivery------!!!
        Route::prefix('delivery')->group(function (){
            Route::get('/',[DeliveryController::class,'index'])->name('admin.market.delivery.index');
            Route::get('/create',[DeliveryController::class,'create'])->name('admin.market.delivery.create');
            Route::post('/store',[DeliveryController::class,'store'])->name('admin.market.delivery.store');
            Route::get('/edit{delivery}',[DeliveryController::class,'edit'])->name('admin.market.delivery.edit');
            Route::put('/update{delivery}',[DeliveryController::class,'update'])->name('admin.market.delivery.update');
            Route::delete('/destroy{delivery}',[DeliveryController::class,'destroy'])->name('admin.market.delivery.destroy');
            Route::get('/status{delivery}',[DeliveryController::class,'status'])->name('admin.market.delivery.status');
        });

        //============================> Discount------!!!
        Route::prefix('discount')->group(function (){
            Route::get('/',[DiscountController::class,'index'])->name('admin.market.discount.index');
            Route::get('/create',[DiscountController::class,'create'])->name('admin.market.discount.create');
            Route::post('/store',[DiscountController::class,'store'])->name('admin.market.discount.store');
            Route::get('/edit{discount}',[DiscountController::class,'edit'])->name('admin.market.discount.edit');
            Route::put('/update{discount}',[DiscountController::class,'update'])->name('admin.market.discount.update');
            Route::delete('/destroy{discount}',[DiscountController::class,'destroy'])->name('admin.market.discount.destroy');

        });
        //============================> Order------!!!
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('admin.market.order.index');
            Route::get('/show{order}', [OrderController::class, 'show'])->name('admin.market.order.show');
            Route::get('/edit{order}',[OrderController::class,'edit'])->name('admin.market.order.edit');
            Route::put('/update{order}',[OrderController::class,'update'])->name('admin.market.order.update');
            Route::delete('/destroy{order}',[OrderController::class,'destroy'])->name('admin.market.order.destroy');
//            Route::get('/new-order', [OrderController::class, 'newOrder'])->name('admin.market.order.newOrder');
//            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
//            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
//            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
//            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
//            Route::get('/change-set-status', [OrderController::class, 'changeSetStatus'])->name('admin.market.order.changeSetStatus');
//            Route::get('/change-order-status', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
//            Route::get('/cancel-order', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
        });
        //============================> Payment------!!!
        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'all'])->name('admin.market.payment.index');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/attendance', [PaymentController::class, 'attendance'])->name('admin.market.payment.attendance');
            Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
        });
        //============================> product------!!!

        Route::prefix('product')->group(function (){
            Route::get('/',[ProductController::class,'index'])->name('admin.market.product.index');
            Route::get('/create',[ProductController::class,'create'])->name('admin.market.product.create');
            Route::post('/store',[ProductController::class,'store'])->name('admin.market.product.store');
            Route::get('/edit{product}',[ProductController::class,'edit'])->name('admin.market.product.edit');
            Route::put('/update{product}',[ProductController::class,'update'])->name('admin.market.product.update');
            Route::delete('/destroy{product}',[ProductController::class,'destroy'])->name('admin.market.product.destroy');

            Route::get('/{product}/gallery',[ProductGalleryController::class,'index'])->name('admin.market.product.gallery.index');
            Route::post('/{product}/gallery',[ProductGalleryController::class,'store'])->name('admin.market.product.gallery.store');
            Route::get('/{product}/gallery/create',[ProductGalleryController::class,'create'])->name('admin.market.product.gallery.create');
            Route::put('/{product}/gallery/{gallery}',[ProductGalleryController::class,'update'])->name('admin.market.product.gallery.update');
            Route::delete('/{product}/gallery/{gallery}',[ProductGalleryController::class,'destroy'])->name('admin.market.product.gallery.destroy');
            Route::get('/{product}/gallery/{gallery}/edit',[ProductGalleryController::class,'edit'])->name('admin.market.product.gallery.edit');

            //============================> Gallery------!!!
//            Route::get('/gallery',[GalleryController::class,'index'])->name('admin.market.gallery.index');
//            Route::post('/gallery/store',[GalleryController::class,'store'])->name('admin.market.gallery.store');
//            Route::delete('/gallery/destroy{id}',[GalleryController::class,'destroy'])->name('admin.market.gallery.destroy');
        });
        //============================> property  ya form kala------!!!

        Route::prefix('property')->group(function (){
            Route::get('/',[PropertyController::class,'index'])->name('admin.market.property.index');
            Route::get('/create',[PropertyController::class,'create'])->name('admin.market.property.create');
            Route::post('/store',[PropertyController::class,'store'])->name('admin.market.property.store');
            Route::get('/edit{id}',[PropertyController::class,'edit'])->name('admin.market.property.edit');
            Route::put('/update{id}',[PropertyController::class,'update'])->name('admin.market.property.update');
            Route::delete('/destroy{id}',[PropertyController::class,'destroy'])->name('admin.market.property.destroy');
          });
        //============================> store ------!!!

        Route::prefix('store')->group(function (){
            Route::get('/',[StoreController::class,'index'])->name('admin.market.store.index');
            Route::get('/add-to-store',[StoreController::class,'addToStore'])->name('admin.market.store.add-to-store');
            Route::post('/store',[StoreController::class,'store'])->name('admin.market.store.store');
            Route::get('/edit{id}',[StoreController::class,'edit'])->name('admin.market.store.edit');
            Route::put('/update{id}',[StoreController::class,'update'])->name('admin.market.store.update');
            Route::delete('/destroy{id}',[StoreController::class,'destroy'])->name('admin.market.store.destroy');
        });
    });
    //============================> Content
    Route::prefix('content')->namespace('Content')->group(function (){

        //============================> Category------!!!
        Route::prefix('category')->group(function (){
            Route::get('/',[ContentCategoryController::class,'index'])->name('admin.content.category.index');
            Route::get('/create',[ContentCategoryController::class,'create'])->name('admin.content.category.create');
            Route::post('/store',[ContentCategoryController::class,'store'])->name('admin.content.category.store');
            Route::get('/edit/{postCategory}',[ContentCategoryController::class,'edit'])->name('admin.content.category.edit');
            Route::get('/status/{postCategory}',[ContentCategoryController::class,'status'])->name('admin.content.category.status');
            Route::put('/update/{postCategory}',[ContentCategoryController::class,'update'])->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}',[ContentCategoryController::class,'destroy'])->name('admin.content.category.destroy');
        });
        //============================> Comment------!!!
        Route::prefix('comment')->group(function (){
            Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
            Route::delete('/destroy/{comment}', [ContentCommentController::class, 'destroy'])->name('admin.content.comment.destroy');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'])->name('admin.content.comment.approved');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('admin.content.comment.answer');
        });
        //============================> Faq------!!!
        Route::prefix('faq')->group(function (){
            Route::get('/',[FaqController::class,'index'])->name('admin.content.faq.index');
            Route::get('/create',[FaqController::class,'create'])->name('admin.content.faq.create');
            Route::post('/store',[FaqController::class,'store'])->name('admin.content.faq.store');
            Route::get('/edit{faq}',[FaqController::class,'edit'])->name('admin.content.faq.edit');
            Route::put('/update{faq}',[FaqController::class,'update'])->name('admin.content.faq.update');
            Route::delete('/destroy{faq}',[FaqController::class,'destroy'])->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', [FaqController::class, 'status'])->name('admin.content.faq.status');
        });
        //============================> menu------!!!
        Route::prefix('menu')->group(function (){
            Route::get('/',[MenuController::class,'index'])->name('admin.content.menu.index');
            Route::get('/create',[MenuController::class,'create'])->name('admin.content.menu.create');
            Route::post('/store',[MenuController::class,'store'])->name('admin.content.menu.store');
            Route::get('/edit{menu}',[MenuController::class,'edit'])->name('admin.content.menu.edit');
            Route::put('/update{menu}',[MenuController::class,'update'])->name('admin.content.menu.update');
            Route::delete('/destroy{menu}',[MenuController::class,'destroy'])->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', [MenuController::class, 'status'])->name('admin.content.menu.status');
        });
        //============================> page------!!!
        Route::prefix('page')->group(function (){
            Route::get('/',[PageController::class,'index'])->name('admin.content.page.index');
            Route::get('/create',[PageController::class,'create'])->name('admin.content.page.create');
            Route::post('/store',[PageController::class,'store'])->name('admin.content.page.store');
            Route::get('/edit{page}',[PageController::class,'edit'])->name('admin.content.page.edit');
            Route::put('/update{page}',[PageController::class,'update'])->name('admin.content.page.update');
            Route::delete('/destroy{page}',[PageController::class,'destroy'])->name('admin.content.page.destroy');
            Route::get('/status/{page}', [PageController::class, 'status'])->name('admin.content.page.status');
        });
        //============================> post------!!!
        Route::prefix('post')->group(function (){
            Route::get('/',[PostController::class,'index'])->name('admin.content.post.index');
            Route::get('/create',[PostController::class,'create'])->name('admin.content.post.create');
            Route::post('/store',[PostController::class,'store'])->name('admin.content.post.store');
            Route::get('/edit{post}',[PostController::class,'edit'])->name('admin.content.post.edit');
            Route::put('/update{post}',[PostController::class,'update'])->name('admin.content.post.update');
            Route::delete('/destroy{post}',[PostController::class,'destroy'])->name('admin.content.post.destroy');
            Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
            Route::get('/commentable/{post}', [PostController::class, 'commentable'])->name('admin.content.post.commentable');
        });
    });
    //============================> User
    Route::prefix('user')->namespace('User')->group(function (){

             //============================> admin-user------!!!
        Route::prefix('admin-user')->group(function (){
            Route::get('/',[AdminUserController::class,'index'])->name('admin.user.admin-user.index');
            Route::get('/create',[AdminUserController::class,'create'])->name('admin.user.admin-user.create');
            Route::post('/store',[AdminUserController::class,'store'])->name('admin.user.admin-user.store');
            Route::get('/edit{user}',[AdminUserController::class,'edit'])->name('admin.user.admin-user.edit');
            Route::put('/update{user}',[AdminUserController::class,'update'])->name('admin.user.admin-user.update');
            Route::delete('/destroy{user}',[AdminUserController::class,'destroy'])->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
            Route::get('/user/{user}/permission', [PermissionController::class, 'create'])->name('admin.user.admin-user.permissions');
            Route::post('/user/{user}/permission', [PermissionController::class, 'store'])->name('admin.user.admin-user.permissions.store');

        });

        //============================> customer------!!!
        Route::prefix('customer')->group(function (){
            Route::get('/',[CustomerController::class,'index'])->name('admin.user.customer.index');
            Route::get('/create',[CustomerController::class,'create'])->name('admin.user.customer.create');
            Route::post('/store',[CustomerController::class,'store'])->name('admin.user.customer.store');
            Route::get('/edit{id}',[CustomerController::class,'edit'])->name('admin.user.customer.edit');
            Route::put('/update{id}',[CustomerController::class,'update'])->name('admin.user.customer.update');
            Route::delete('/destroy{id}',[CustomerController::class,'destroy'])->name('admin.user.customer.destroy');
        });
        //============================> role------!!!
        Route::prefix('role')->group(function (){
            Route::get('/',[RoleController::class,'index'])->name('admin.user.role.index');
            Route::get('/create',[RoleController::class,'create'])->name('admin.user.role.create');
            Route::post('/store',[RoleController::class,'store'])->name('admin.user.role.store');
            Route::get('/edit{role}',[RoleController::class,'edit'])->name('admin.user.role.edit');
            Route::put('/update{role}',[RoleController::class,'update'])->name('admin.user.role.update');
            Route::delete('/destroy{role}',[RoleController::class,'destroy'])->name('admin.user.role.destroy');
        });

        //============================> permission------!!!
        Route::prefix('permission')->group(function (){
            Route::get('/',[PermissionController::class,'index'])->name('admin.user.permission.index');
            Route::get('/create',[PermissionController::class,'create'])->name('admin.user.permission.create');
            Route::post('/store',[PermissionController::class,'store'])->name('admin.user.permission.store');
            Route::get('/edit{id}',[PermissionController::class,'edit'])->name('admin.user.permission.edit');
            Route::put('/update{id}',[PermissionController::class,'update'])->name('admin.user.permission.update');
            Route::delete('/destroy{id}',[PermissionController::class,'destroy'])->name('admin.user.permission.destroy');
        });

     });
    //================================================>notify
         Route::prefix('notify')->namespace('Notify')->group(function (){

             //email
             Route::prefix('email')->group(function(){
                 Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
                 Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
                 Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
                 Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
                 Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
                 Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
                 Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');

             });
             //email file
             Route::prefix('email-file')->group(function(){
                 Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
                 Route::get('/{email}/create', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
                 Route::post('/{email}/store', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
                 Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
                 Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
                 Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
                 Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');

             });

             //sms
             Route::prefix('sms')->group(function(){
                 Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
                 Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
                 Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
                 Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
                 Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
                 Route::delete('/destroy/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
                 Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');

             });
        });

    //================================================>Ticket
        Route::prefix('ticket')->namespace('Ticket')->group(function (){

            Route::get('/new-tickets',[TicketController::class,'newTickets'])->name('admin.ticket.newTickets');
            Route::get('/open-tickets',[TicketController::class,'openTickets'])->name('admin.ticket.openTickets');
            Route::get('/close-tickets',[TicketController::class,'closeTickets'])->name('admin.ticket.closeTickets');
            Route::get('/',[TicketController::class,'index'])->name('admin.ticket.index');
            Route::get('/create',[TicketController::class,'create'])->name('admin.ticket.create');
            Route::get('/show',[TicketController::class,'show'])->name('admin.ticket.show');
            Route::post('/store',[TicketController::class,'store'])->name('admin.ticket.store');
            Route::get('/edit{id}',[TicketController::class,'edit'])->name('admin.ticket.edit');
            Route::put('/update{id}',[TicketController::class,'update'])->name('admin.ticket.update');
            Route::delete('/destroy{id}',[TicketController::class,'destroy'])->name('admin.ticket.destroy');
        });

    //================================================>Setting
    Route::prefix('setting')->namespace('Setting')->group(function (){

        Route::get('/',[SettingController::class,'index'])->name('admin.setting.index');
        Route::get('/edit{setting}',[SettingController::class,'edit'])->name('admin.setting.edit');
        Route::put('/update{setting}',[SettingController::class,'update'])->name('admin.setting.update');
    });
    //==========================================> custom background and slider
    Route::prefix('custom')->namespace('Custom')->group(function (){

        //====================================>Slider
         Route::prefix('slider')->group(function (){
            Route::get('/',[SliderController::class,'index'])->name('admin.custom.slider.index');
            Route::get('/create',[SliderController::class,'create'])->name('admin.custom.slider.create');
            Route::post('/store',[SliderController::class,'store'])->name('admin.custom.slider.store');
            Route::get('/edit{slider}',[SliderController::class,'edit'])->name('admin.custom.slider.edit');
            Route::put('/update{slider}',[SliderController::class,'update'])->name('admin.custom.slider.update');
            Route::delete('/destroy{slider}',[SliderController::class,'destroy'])->name('admin.custom.slider.destroy');
          });
        //====================================>Links
        Route::prefix('link')->group(function (){
            Route::get('/',[LinkController::class,'index'])->name('admin.custom.link.index');
            Route::get('/edit{link}',[LinkController::class,'edit'])->name('admin.custom.link.edit');
            Route::put('/update{link}',[LinkController::class,'update'])->name('admin.custom.link.update');
        });
        //====================================>Index Pics
        Route::prefix('index-pic')->group(function (){
            Route::get('/',[IndexPicController::class,'index'])->name('admin.custom.index-pic.index');
            Route::get('/edit{indexPage}',[IndexPicController::class,'edit'])->name('admin.custom.index-pic.edit');
            Route::put('/update{indexPage}',[IndexPicController::class,'update'])->name('admin.custom.index-pic.update');
        });
    });

    //============================> Gallery------!!!


});
