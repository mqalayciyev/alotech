<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::group(['namespace' => 'User'], function () {
//     Route::resource('/', 'HomeController');
//     // Route::get('/', ['HomeController', 'index'])->name('home');
// });

// Route::middleware(['guest'])->group(function () {
    // Auth::routes();
// });

Route::namespace('User')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/set-depot/{depot}', 'HomeController@setDepot')->name('set.depot');
    Route::get('/category-products', 'HomeController@categoryProducts')->name('homepage.category.products');
    Route::get('/products', 'HomeController@products')->name('homepage.products');
    Route::get('/get_product', 'HomeController@get_product')->name('get_product');
    Route::get('/insert_ratings', 'HomeController@insert_ratings')->name('homepage.insert_ratings');
    Route::get('/deal-of-day', 'MenuController@deal_of_day')->name('deal_of_day');
    Route::get('/best-selling', 'MenuController@best_selling')->name('best_selling');
    Route::get('/last-view', 'MenuController@last_view')->name('last_view');
    Route::get('/menu_products', 'MenuController@products')->name('menu.products');
    Route::get('/category/{slug_category_name}', 'CategoryController@index')->name('category');
    // Route::get('/shop/{slug}', 'CategoryController@index')->name('category');
    // Route::get('/category_products', 'ShopController@products')->name('catalog.products');
    Route::get('/categories', 'CategoryController@categories')->name('categories');
    Route::get('/category_products', 'CategoryController@products')->name('category.products');
    Route::get('/category_price_filter', 'CategoryController@price_filter')->name('category.price_filter');
    Route::get('/category_brand_filter', 'CategoryController@brand_filter')->name('category.brand_filter');
    Route::get('/category_size_filter', 'CategoryController@size_filter')->name('category.size_filter');
    Route::get('/category_color_filter', 'CategoryController@color_filter')->name('category.color_filter');
    Route::get('/category_sorting', 'CategoryController@category_sorting')->name('category.category_sorting');
    Route::get('/product/{slug_product_name}', 'ProductController@index')->name('product');
    Route::get('/product_price_list', 'ProductController@price_list')->name('product.price_list');
    Route::get('/product_stock_list', 'ProductController@stock_list')->name('product.stock_list');
    Route::get('/search', 'ProductController@search')->name('search_product');
    Route::get('/quick_search', 'ProductController@quick_search')->name('quick_search_product');
    Route::get('/newproducts', 'ProductController@new_products')->name('new_products');
    Route::get('/discounted', 'ProductController@discounted')->name('discounted');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::post('/contact_send', 'HomeController@send')->name('contact.send');
    Route::get('/add_wish_list', 'WishlistController@add_wish_list')->name('add_wish_list');
    Route::get('/brands', 'BrandsController@index')->name('brands');
    Route::get('/brands/{brand_slug}', 'BrandsController@brands')->name('brand.product');
    Route::get('/brands_products', 'BrandsController@products')->name('brands.brands_products');
    Route::get('/brand_sorting', 'BrandsController@brand_sorting')->name('brands.brand_sorting');
    Route::get('/brand_size_filter', 'BrandsController@size_filter')->name('brands.size_filter');
    Route::get('/brand_color_filter', 'BrandsController@color_filter')->name('brands.color_filter');
    Route::get('/brand_price_filter', 'BrandsController@price_filter')->name('brands.price_filter');
    Route::post('/review', 'ProductController@review')->name('product.review');
    Route::get('/reviews', 'ProductController@reviews')->name('product.reviews');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/shipping_return', 'HomeController@shipping_return')->name('shipping_return');
    Route::get('/privacy', 'HomeController@privacy')->name('privacy');
    Route::get('/invoice', 'HomeController@invoice')->name('invoice');
    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{slug}', 'BlogController@single')->name('blog.single');

    Route::prefix('compare')->group(function () {
        Route::get('/', 'ProductController@compare')->name('compare');
        Route::get('/add_to_compare', 'ProductController@add_to_compare')->name('compare.add_to_compare');
        Route::get('/remove_from_compare', 'ProductController@remove_from_compare')->name('compare.remove_from_compare');
        Route::get('/view', 'ProductController@view_compare')->name('compare.view_compare');
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index')->name('cart');
        Route::get('/my_cart', 'CartController@my_cart')->name('cart.my_cart');
        Route::get('/add_to_cart', 'CartController@add_to_cart')->name('cart.add_to_cart');
        Route::get('/update_cart', 'CartController@update_cart')->name('cart.update_cart');
        Route::get('/delete', 'CartController@delete')->name('cart.delete');
        Route::get('/destroy', 'CartController@destroy')->name('cart.destroy');
    });


    Route::middleware(['auth'])->group(function () {
        Route::get('/account', 'UserController@index')->name('my_account');
        Route::get('/payments', 'PaymentController@index')->name('payment');
        Route::post('/pay', 'PaymentController@pay')->name('pay');
        Route::post('/user/sign-out', 'UserController@logout')->name('logout');
        Route::get('/orders', 'OrderController@index')->name('orders');
        Route::get('/orders/{id}', 'OrderController@detail')->name('order');
        Route::get('/complete/{id}', 'PaymentController@complete')->name('complete');
        Route::get('/my_wish_list', 'WishlistController@index')->name('my_wish_list');
        Route::get('/view_my_wish_list', 'WishlistController@view_my_wish_list')->name('view_my_wish_list');
        Route::get('/remove_wish_list', 'WishlistController@remove_wish_list')->name('remove_wish_list');

        Route::get('/form_info', 'UserController@form_info')->name('user.form_info');
        Route::get('/form_detail', 'UserController@form_detail')->name('user.form_detail');
        Route::get('/form_password', 'UserController@form_password')->name('user.form_password');
    });
    Route::post('/payment/return/{orderid}', 'PaymentController@paymentPageReturn')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('payment.return');

    Route::middleware(['guest'])->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/register', 'UserController@sign_up_form')->name('user.register');
            Route::post('/sign-up', 'UserController@sign_up')->name('user.sign_up');
            Route::get('/login', 'UserController@sign_in_form')->name('user.login');
            Route::post('/authenticate', 'UserController@authenticate')->name('user.authenticate');
            Route::get('/request-password', 'UserController@request_password_form')->name('user.password.request.form');
            Route::post('/request-password', 'UserController@request_password')->name('user.password.request');
            Route::get('/reset-password/{email}/{token}', 'UserController@resetPassword')->name('user.reset.password.form');
            Route::post('/reset-password', 'UserController@change_password')->name('user.reset.password');
        });
    });

    Route::get('user/activate/{activation_key}', 'UserController@activate')->name('user.activate');


});



Route::namespace('Manage')->prefix('manage')->group(function () {
    Route::redirect('/', '/manage/homepage');
    Route::match(['get', 'post'], '/login', 'AdminController@login')->name('manage.login');
    Route::get('/logout', 'AdminController@logout')->name('manage.logout');
    Route::match(['get', 'post'], '/forgot-password', 'AdminController@forgot')->name('manage.forgot.password');
    Route::get('/recovery-password/{token}/{email}', 'AdminController@recovery')->name('manage.recovery.password');
    Route::post('/change-password', 'AdminController@change')->name('manage.change.password');
    Route::group(['middleware' => 'manage'], function () {

        Route::get('/homepage', 'HomepageController@index')->name('manage.homepage');

        Route::group(['prefix' => 'admin'], function () {
            Route::get('/', 'AdminController@index')->name('manage.admin');
            Route::get('/index_data', 'AdminController@index_data')->name('manage.admin.index_data');
            Route::post('/post_data', 'AdminController@post_data')->name('manage.admin.post_data');
            Route::get('/fetch_data', 'AdminController@fetch_data')->name('manage.admin.fetch_data');
            Route::get('/delete_data', 'AdminController@delete_data')->name('manage.admin.delete_data');
            Route::get('/mass_remove', 'AdminController@mass_remove')->name('manage.admin.mass_remove');
            Route::get('/new', 'AdminController@form')->name('manage.admin.new');
            Route::get('/edit/{id}', 'AdminController@form')->name('manage.admin.edit');
            Route::post('/save/{id?}', 'AdminController@save')->name('manage.admin.save');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')->name('manage.user');
            Route::get('/index_data', 'UserController@index_data')->name('manage.user.index_data');
            Route::post('/post_data', 'UserController@post_data')->name('manage.user.post_data');
            Route::get('/fetch_data', 'UserController@fetch_data')->name('manage.user.fetch_data');
            Route::get('/delete_data', 'UserController@delete_data')->name('manage.user.delete_data');
            Route::get('/mass_remove', 'UserController@mass_remove')->name('manage.user.mass_remove');
            Route::get('/new', 'UserController@form')->name('manage.user.new');
            Route::get('/edit/{id}', 'UserController@form')->name('manage.user.edit');
            Route::post('/save/{id?}', 'UserController@save')->name('manage.user.save');
            Route::get('/send_message', 'InvoiceController@send_message')->name('manage.user.send_message');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index')->name('manage.category');
            Route::get('/index_data', 'CategoryController@index_data')->name('manage.category.index_data');
            Route::post('/post_data', 'CategoryController@post_data')->name('manage.category.post_data');
            Route::get('/fetch_data', 'CategoryController@fetch_data')->name('manage.category.fetch_data');
            Route::get('/delete_data', 'CategoryController@delete_data')->name('manage.category.delete_data');
            Route::get('/mass_remove', 'CategoryController@mass_remove')->name('manage.category.mass_remove');
            Route::get('/delete_all', 'CategoryController@delete_all')->name('manage.category.delete_all');
        });

        Route::group(['prefix' => 'apikey'], function () {
            Route::get('/', 'ApiKeyController@index')->name('manage.apikey');
            Route::get('/index_data', 'ApiKeyController@index_data')->name('manage.apikey.index_data');
            Route::post('/post_data', 'ApiKeyController@post_data')->name('manage.apikey.post_data');
            Route::get('/fetch_data', 'ApiKeyController@fetch_data')->name('manage.apikey.fetch_data');
            // Route::get('/delete_data', 'ApiKeyController@delete_data')->name('manage.apikey.delete_data');
            // Route::get('/mass_remove', 'ApiKeyController@mass_remove')->name('manage.apikey.mass_remove');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('manage.product');
            Route::get('/index_data', 'ProductController@index_data')->name('manage.product.index_data');
            Route::post('/post_data', 'ProductController@post_data')->name('manage.product.post_data');
            Route::get('/fetch_data', 'ProductController@fetch_data')->name('manage.product.fetch_data');
            Route::get('/delete_data', 'ProductController@delete_data')->name('manage.product.delete_data');
            Route::get('/mass_remove', 'ProductController@mass_remove')->name('manage.product.mass_remove');
            Route::get('/new', 'ProductController@form')->name('manage.product.new');
            Route::get('/edit/{id}', 'ProductController@form')->name('manage.product.edit');
            Route::get('/filter/{id}', 'ProductController@filter')->name('manage.product.filter');
            Route::get('/filter_data/{id}', 'ProductController@filter_data')->name('manage.product.filter_data');
            Route::post('/save/{id?}', 'ProductController@save')->name('manage.product.save');
            Route::post('/remove_image', 'ProductController@remove_image')->name('manage.product.remove_image');
            Route::post('/load_images', 'ProductController@load_images')->name('manage.product.load_images');
            Route::get('/categories', 'ProductController@categories')->name('manage.product.categories');
            Route::post('/price_post_data', 'ProductController@price_post_data')->name('manage.product.price_post_data');
            Route::get('/price_fetch_data', 'ProductController@price_fetch_data')->name('manage.product.price_fetch_data');
            Route::get('/price_delete_data', 'ProductController@price_delete_data')->name('manage.product.price_delete_data');
            Route::post('/stock_post_data', 'ProductController@stock_post_data')->name('manage.product.stock_post_data');
            Route::get('/stock_fetch_data', 'ProductController@stock_fetch_data')->name('manage.product.stock_fetch_data');
            Route::get('/stock_delete_data', 'ProductController@stock_delete_data')->name('manage.product.stock_delete_data');
            Route::get('/delete_all', 'ProductController@delete_all')->name('manage.product.delete_all');
        });
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', 'SlideshowController@index')->name('manage.slider');
            Route::post('/reorder', 'SlideshowController@reorder')->name('manage.slider.reorder');
            Route::get('/index_data', 'SlideshowController@index_data')->name('manage.slider.index_data');
            Route::get('/delete_data', 'SlideshowController@delete_data')->name('manage.slider.delete_data');
            Route::get('/mass_remove', 'SlideshowController@mass_remove')->name('manage.slider.mass_remove');
            Route::get('/new', 'SlideshowController@form')->name('manage.slider.new');
            Route::get('/edit/{id}', 'SlideshowController@form')->name('manage.slider.edit');
            Route::post('/save', 'SlideshowController@save')->name('manage.slider.save');
        });
        Route::group(['prefix' => 'banner'], function () {
            Route::get('/{type}', 'BannerController@index')->name('manage.banner');
            Route::post('/reorder', 'BannerController@reorder')->name('manage.banner.reorder');
            Route::get('/index_data/{type}', 'BannerController@index_data')->name('manage.banner.index_data');
            Route::get('/delete_data', 'BannerController@delete_data')->name('manage.banner.delete_data');
            Route::get('/mass_remove', 'BannerController@mass_remove')->name('manage.banner.mass_remove');
            Route::get('/new/{type}', 'BannerController@form')->name('manage.banner.new');
            Route::get('/edit/{type}/{id}', 'BannerController@form')->name('manage.banner.edit');
            Route::post('/save', 'BannerController@save')->name('manage.banner.save');
        });
        Route::group(['prefix' => 'services'], function () {
            Route::get('/', 'ServicesController@index')->name('manage.services');
            Route::get('/index_data', 'ServicesController@index_data')->name('manage.services.index_data');
            Route::post('/post_data', 'ServicesController@post_data')->name('manage.services.post_data');
            Route::get('/fetch_data', 'ServicesController@fetch_data')->name('manage.services.fetch_data');
            Route::get('/delete_data', 'ServicesController@delete_data')->name('manage.services.delete_data');
            Route::get('/mass_remove', 'ServicesController@mass_remove')->name('manage.services.mass_remove');
        });
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@index')->name('manage.blog');
            Route::get('/index_data', 'BlogController@index_data')->name('manage.blog.index_data');
            Route::get('/delete_data', 'BlogController@delete_data')->name('manage.blog.delete_data');
            Route::get('/mass_remove', 'BlogController@mass_remove')->name('manage.blog.mass_remove');
            Route::get('/new', 'BlogController@form')->name('manage.blog.new');
            Route::get('/edit/{id}', 'BlogController@form')->name('manage.blog.edit');
            Route::post('/save/{id?}', 'BlogController@save')->name('manage.blog.save');
        });
        Route::group(['prefix' => 'review'], function () {
            Route::get('/', 'ReviewController@index')->name('manage.review');
            Route::get('/index_data', 'ReviewController@index_data')->name('manage.review.index_data');
            Route::post('/view', 'ReviewController@view')->name('manage.review.view');
            Route::get('/delete_data', 'ReviewController@delete_data')->name('manage.review.delete_data');
            Route::get('/mass_remove', 'ReviewController@mass_remove')->name('manage.review.mass_remove');

        });
        Route::group(['prefix' => 'envelope'], function () {
            Route::get('/', 'EnvelopeController@index')->name('manage.envelope');
            Route::get('/index_data', 'EnvelopeController@index_data')->name('manage.envelope.index_data');
            Route::post('/feedback', 'EnvelopeController@feedback')->name('manage.envelope.feedback');
            Route::post('/view', 'EnvelopeController@view')->name('manage.envelope.view');
            Route::get('/delete_data', 'EnvelopeController@delete_data')->name('manage.envelope.delete_data');
            Route::get('/mass_remove', 'EnvelopeController@mass_remove')->name('manage.envelope.mass_remove');

        });
        Route::group(['prefix' => 'logs'], function () {
            Route::get('/', 'LogsController@index')->name('manage.logs');
            Route::get('/index_data', 'LogsController@index_data')->name('manage.logs.index_data');
        });
        Route::group(['prefix' => 'xml_import'], function () {
            Route::get('/', 'XMLController@index')->name('manage.xml_import');
            Route::post('/products', 'XMLController@products')->name('manage.xml_import.products');
            Route::post('/brands', 'XMLController@brands')->name('manage.xml_import.brands');
            Route::post('/categories', 'XMLController@categories')->name('manage.xml_import.categories');
        });

        Route::group(['prefix' => 'info'], function () {
            Route::get('/', 'InfoController@index')->name('manage.info');
            Route::post('/save', 'InfoController@save')->name('manage.info.save');

        });
        Route::group(['prefix' => 'shipping_return'], function () {
            Route::get('/', 'ShippingReturnController@index')->name('manage.shipping_return');
            Route::post('/save', 'ShippingReturnController@save')->name('manage.shipping_return.save');

        });
        Route::group(['prefix' => 'about'], function () {
            Route::get('/', 'AboutController@index')->name('manage.about');
            Route::post('/save', 'AboutController@save')->name('manage.about.save');

        });

        Route::group(['prefix' => 'sell'], function () {
            Route::get('/', 'SellController@index')->name('manage.sell');
            Route::post('/products', 'SellController@products')->name('manage.sell.products');
            Route::post('/search', 'SellController@search')->name('manage.sell.search');
            Route::post('/sale_list', 'SellController@sale_list')->name('manage.sell.sale_list');
            Route::post('/manual_cart_remove', 'SellController@manual_cart_remove')->name('manage.sell.manual_cart_remove');
            Route::post('/trash_cart', 'SellController@trash_cart')->name('manage.sell.trash_cart');
        });


        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', 'BrandController@index')->name('manage.brand');
            Route::get('/index_data', 'BrandController@index_data')->name('manage.brand.index_data');
            Route::post('/post_data', 'BrandController@post_data')->name('manage.brand.post_data');
            Route::get('/fetch_data', 'BrandController@fetch_data')->name('manage.brand.fetch_data');
            Route::get('/delete_data', 'BrandController@delete_data')->name('manage.brand.delete_data');
            Route::get('/mass_remove', 'BrandController@mass_remove')->name('manage.brand.mass_remove');
            Route::get('/delete_all', 'BrandController@delete_all')->name('manage.brand.delete_all');
        });

        Route::group(['prefix' => 'tag'], function () {
            Route::get('/', 'TagController@index')->name('manage.tag');
            Route::get('/index_data', 'TagController@index_data')->name('manage.tag.index_data');
            Route::post('/post_data', 'TagController@post_data')->name('manage.tag.post_data');
            Route::get('/fetch_data', 'TagController@fetch_data')->name('manage.tag.fetch_data');
            Route::get('/delete_data', 'TagController@delete_data')->name('manage.tag.delete_data');
            Route::get('/mass_remove', 'TagController@mass_remove')->name('manage.tag.mass_remove');
        });
        Route::group(['prefix' => 'color'], function () {
            Route::get('/', 'ColorController@index')->name('manage.color');
            Route::get('/index_data', 'ColorController@index_data')->name('manage.color.index_data');
            Route::post('/post_data', 'ColorController@post_data')->name('manage.color.post_data');
            Route::get('/fetch_data', 'ColorController@fetch_data')->name('manage.color.fetch_data');
            Route::get('/delete_data', 'ColorController@delete_data')->name('manage.color.delete_data');
            Route::get('/mass_remove', 'ColorController@mass_remove')->name('manage.color.mass_remove');
        });
        Route::group(['prefix' => 'size'], function () {
            Route::get('/', 'SizeController@index')->name('manage.size');
            Route::get('/index_data', 'SizeController@index_data')->name('manage.size.index_data');
            Route::post('/post_data', 'SizeController@post_data')->name('manage.size.post_data');
            Route::get('/fetch_data', 'SizeController@fetch_data')->name('manage.size.fetch_data');
            Route::get('/delete_data', 'SizeController@delete_data')->name('manage.size.delete_data');
            Route::get('/mass_remove', 'SizeController@mass_remove')->name('manage.size.mass_remove');
        });
        Route::group(['prefix' => 'measurement'], function () {
            Route::get('/', 'MeasurementController@index')->name('manage.measurement');
            Route::get('/index_data', 'MeasurementController@index_data')->name('manage.measurement.index_data');
            Route::post('/post_data', 'MeasurementController@post_data')->name('manage.measurement.post_data');
            Route::get('/fetch_data', 'MeasurementController@fetch_data')->name('manage.measurement.fetch_data');
            Route::get('/delete_data', 'MeasurementController@delete_data')->name('manage.measurement.delete_data');
            Route::get('/mass_remove', 'MeasurementController@mass_remove')->name('manage.measurement.mass_remove');
        });

        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', 'SupplierController@index')->name('manage.supplier');
            Route::get('/index_data', 'SupplierController@index_data')->name('manage.supplier.index_data');
            Route::post('/post_data', 'SupplierController@post_data')->name('manage.supplier.post_data');
            Route::get('/new', 'SupplierController@form')->name('manage.supplier.new');
            Route::get('/edit/{id}', 'SupplierController@form')->name('manage.supplier.edit');
            Route::post('/save/{id?}', 'SupplierController@save')->name('manage.supplier.save');
            Route::get('/delete_data', 'SupplierController@delete_data')->name('manage.supplier.delete_data');
            Route::get('/mass_remove', 'SupplierController@mass_remove')->name('manage.supplier.mass_remove');
        });

        Route::group(['prefix' => 'depot'], function () {
            Route::get('/', 'DepotController@index')->name('manage.depot');
            Route::get('/index_data', 'DepotController@index_data')->name('manage.depot.index_data');
            Route::post('/reorder', 'DepotController@reorder')->name('manage.depot.reorder');
            Route::get('/new', 'DepotController@form')->name('manage.depot.new');
            Route::get('/edit/{id}', 'DepotController@form')->name('manage.depot.edit');
            Route::post('/save/{id?}', 'DepotController@save')->name('manage.depot.save');
            Route::get('/delete_data', 'DepotController@delete_data')->name('manage.depot.delete_data');
            Route::get('/mass_remove', 'DepotController@mass_remove')->name('manage.depot.mass_remove');
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'OrderController@index')->name('manage.order');
            Route::get('/index_data', 'OrderController@index_data')->name('manage.order.index_data');
            Route::get('/new', 'OrderController@form')->name('manage.order.new');
            Route::get('/edit/{id}', 'OrderController@form')->name('manage.order.edit');
            Route::post('/save/{id?}', 'OrderController@save')->name('manage.order.save');
            Route::get('/delete/{id}', 'OrderController@delete')->name('manage.order.delete');
            Route::get('/invoice_send_customer', 'InvoiceController@customer')->name('manage.order.invoice_send_customer');
            Route::get('/invoice_send_courier', 'InvoiceController@courier')->name('manage.order.invoice_send_courier');
            Route::get('/invoice_send_warehouse', 'InvoiceController@warehouse')->name('manage.order.invoice_send_warehouse');
            Route::get('/invoice_view', 'InvoiceController@index')->name('manage.order.invoice_view');
            Route::post('/invoice_print', 'OrderController@invoice_print')->name('manage.order.invoice_print');
            Route::get('/mass_remove', 'OrderController@mass_remove')->name('manage.order.mass_remove');
            Route::get('/exported/{id}', 'OrderController@exported')->name('manage.order.exported');
        });

        Route::group(["prefix" => "raports"], function () {
            Route::get('/export/{type}', 'OrderController@export')->name('manage.raports.export');
        });

        Route::post("ckeditor_slider_upload", 'CommonControllers@ckEditorSliderUpload')->name("ckeditorSliderUpload");
        Route::post("ckeditor_products_upload", 'CommonControllers@ckEditorProductUpload')->name("ckeditorProductUpload");

    });

});




