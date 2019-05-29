<?php

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

//Basic routes
Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/contact',  'PagesController@getContact')->name('contact');
Route::get('/policy',  'PagesController@getPolicy')->name('policy');
Route::post('/contact/send',  'PagesController@contactMail')->name('contactSend');


//Product routes

Route::get('/products', 'ProductController@getProducts')->name('products');

//Create Product
Route::get('/products/create', 'ProductController@createProducts')->name('createproducts');
Route::post('/products/save', 'ProductController@postSave')->name('productSave');

//Edit Product
Route::get('/products/{product_id}/edit', 'ProductController@editProduct')->name('editproduct');
Route::patch('/products/{product_id}/update', 'ProductController@update')->name('update');

//Delete Product
Route::get('/products/{product_id}/delete', 'ProductController@deleteProduct')->name('deleteproduct');

//Detail page van Product
Route::get('/products/{product_id}/detail', 'ProductController@getDetail')->name('productDetail');
Route::get('/products/{product_id}/detailspotlight', 'ProductController@spotlight')->name('spotlight');
Route::get('/products/{product_id}/detailgenerate-pdf','ProductController@generatePDF')->name('generatePDF');
Route::post('/products/{product_id}/detail/comment', 'ProductController@comment')->name('comment');
Route::post('/products/{product_id}/detail/upload', 'ImageUploadController@store')->name('postUpload');
Route::get('/products/{product_id}/detail/image/delete', 'ProductController@deleteImage')->name('deletePic');
Route::get('/products/{product_id}/detail/list', 'ProductController@getList')->name('list');

// funding Product
Route::get('/products/{product_id}/detail/fund/{amount}', 'ProductController@fund')->name('fund');


//credit  routes
Route::get('/credits', 'PaymentController@getStripeForm');
Route::post('/stripe', 'PaymentController@postStripePayment')->name('stripe.post');
Route::post('api/convert', 'APIController@postConvert')->name('converter');

//Profile route
Route::get('/profile', 'UserController@getProfile')->name('profile');
Route::get('/profile/edit', 'UserController@editProfile')->name('editProfile');

Route::patch('/profile/edit/upload', 'UserController@updateProfile')->name('updateProfile');
Route::patch('/profile/edit/upload/picture', 'UserController@updateProfilePicture')->name('updateProfilePicture');

//Detail news page
Route::get('/article/{article_id}', 'ArticleController@getArticle')->name('articleDetail');
Route::get('/article/{article_id}/edit', 'ArticleController@editArticle')->name('editArticle');
Route::patch('/article/{article_id}/edit/update', 'ArticleController@updateArticle')->name('updateArticle');
Route::get('/article/{article_id}/delete', 'ArticleController@deleteArticle')->name('deleteArticle');
Route::get('/article/new/create', 'ArticleController@createArticle')->name('createArticle');
Route::post('/article/new/create/save', 'ArticleController@saveArticle')->name('articleSave');

//Admin routes
Route::get('/admin', 'AdminController@getIndex')->name('adminHome');
//admin Categorie routes
Route::get('/admin/categories', 'AdminController@getCategories')->name('adminCategories');
Route::get('/admin/categories/create', 'AdminController@createCategorie')->name('adminCategorieCreate');
Route::post('/admin/categories/save', 'AdminController@categorieSave')->name('categorieSave');
Route::get('/admin/categories/edit/{categorie_id}', 'AdminController@editCategorie')->name('adminCategorieEdit');
Route::patch('/admin/categories/update/{categorie_id}', 'AdminController@updateCategorie')->name('adminCategorieUpdate');
Route::get('/admin/categories/delete/{categorie_id}', 'AdminController@deleteCategorie')->name('adminCategorieDelete');
//admin users routes
Route::get('/admin/users', 'AdminController@getUsers')->name('adminUsers');
Route::get('/admin/users/edit/{user_id}', 'AdminController@editUsers')->name('adminUsersEdit');
Route::patch('/admin/users/update/{user_id}', 'AdminController@updateUsers')->name('adminUsersUpdate');
Route::get('/admin/users/delete/{user_id}', 'AdminController@deleteUsers')->name('adminUsersDelete');
//admin articles route
Route::get('/admin/articles', 'AdminController@getArticles')->name('adminArticles');

//admin fundings route
Route::get('/admin/fundings', 'AdminController@getFundings')->name('adminFundings');
Route::get('/admin/fundings/delete/{funding_id}', 'AdminController@deleteFundings')->name('adminFundingsDelete');
Route::get('/admin/fundings/create/{project_id}', 'AdminController@createFundings')->name('adminFundingsCreate');
Route::post('/admin/fundings/save', 'AdminController@fundingsSave')->name('fundingsSave');






//Authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

