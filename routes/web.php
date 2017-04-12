<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//public routes
Route::get('/', 'HomeController@index');
Route::get('/kompetisi', 'HomeController@viewCompetition');
Route::get('/daftar/{id}', 'RegistrantController@register')->name('registerCompetition');

//dashboard routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//artikel
Route::get('/dashboard/artikel', 'ArticleController@index')->name('viewArticle');
Route::get('/dashboard/artikel/tambah', 'ArticleController@addShowForm')->name('addArticle');
Route::post('/dashboard/artikel/tambah', 'ArticleController@add');
Route::get('/dashboard/artikel/ubah/{id}', 'ArticleController@editShowForm')->name('editArticle');
Route::post('/dashboard/artikel/ubah/{id}', 'ArticleController@edit');
Route::post('/dashboard/artikel/hapus/{id}', 'ArticleController@delete')->name('deleteArticle');

//kompetisi
Route::get('/dashboard/kompetisi/', 'CompetitionController@index')->name('viewCompetition');
Route::get('/dashboard/kompetisi/tambah', 'CompetitionController@addShowForm')->name('addCompetition');
Route::post('/dashboard/kompetisi/tambah', 'CompetitionController@add');
Route::get('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@editShowForm')->name('editCompetition');
Route::post('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@edit');

Route::get('dashboard/kompetisi/pendaftar/{id}', 'RegistrantController@registrantShow')->name('showRegistrantCompetition');

//grup
Route::get('/dashboard/groups/', 'GroupController@index')->name('viewGroup');
Route::get('/dashboard/groups/tambah', 'GroupController@addShowForm')->name('addGroup');
Route::post('/dashboard/groups/tambah', 'GroupController@add');
Route::get('/dashboard/groups/ubah/{id}', 'GroupController@editShowForm')->name('editGroup');
Route::post('/dashboard/groups/ubah/{id}', 'GroupController@edit');
Route::post('/dahsboard/groups/hapus/{id}', 'GroupController@delete')->name('deleteGroup');

//user
Route::get('/dashboard/users', 'UserController@index')->name('viewUser');
Route::get('/dashboard/changePassword', 'UserController@changePasswordForm')->name('changePasswordUser');
Route::post('/dashboard/changePassword', 'UserController@changePassword');
Route::get('/dashboard/users/tambah', 'UserController@addForm')->name('addUser');
Route::post('/dashboard/users/tambah', 'UserController@add');
Route::get('/dashboard/users/ubah', 'UserController@editForm')->name('editUser');
Route::post('/dashboard/users/ubah', 'UserController@edit');
Route::post('/dahsboard/users/hapus/{id}', 'UserController@delete')->name('deleteUser');

Route::post('/dashboard/upload', 'FileController@upload')->name('uploadFile');


Route::get('/', 'HomeController@index');
Route::get('/{dept}', 'HomeController@showDept');

Route::get('/{dept}/article/{id}', 'HomeController@showArticle')->name('readArticle');
Route::get('/{dept}/competition/{id}', 'HomeController@showCompetition')->name('readCompetition');

Route::get('/pnk', function () {
    return view('temp.pnk', ['name' => 'pnk']);
});

Route::get('/page', function () {
    return view('page', ['name' => 'pnk']);
});

Route::get('/depor', function () {
    return view('temp.depor', ['name' => 'depor']);
});

Route::get('/blog', function () {
    return view('temp.blog', ['name' => 'senbud']);
});