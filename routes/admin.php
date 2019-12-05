<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//Route::group(array('prefix' => 'admin'), function () {
# Error pages should be shown without requiring login
Route::get('404', function () {
    return View('admin/404');
});
Route::get('500', function () {
    return View::make('admin/500');
});

Route::post('secureImage', array('as' => 'secureImage', 'uses' => 'AdminJoshController@secureImage'));

# Lock screen
Route::get('{id}/lockscreen', array('as' => 'lockscreen', 'uses' => 'AdminUsersController@lockscreen'));
Route::post('{id}/lockscreen', array('as' => 'lockscreen', 'uses' => 'AdminUsersController@postLockscreen'));

# All basic routes defined here
Route::get('signin', array('as' => 'signin', 'uses' => 'AdminAuthController@getSignin'));
Route::post('signin', 'AdminAuthController@postSignin');
Route::post('signup', array('as' => 'signup', 'uses' => 'AdminAuthController@postSignup'));
Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AdminAuthController@postForgotPassword'));
Route::get('login2', function () {
    return View::make('admin/login2');
});
//Route::get('reset-password', array('as' => 'passreset', 'uses' => 'AdminAuthController@Password_Update'));
# Register2
Route::get('register2', function () {
    return View::make('admin/register2');
});
Route::post('register2', array('as' => 'register2', 'uses' => 'AdminAuthController@postRegister2'));

# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AdminAuthController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'AdminAuthController@postForgotPasswordConfirm');

# Logout
Route::get('logout', array('as' => 'logout', 'uses' => 'AdminAuthController@getLogout'));

# Account Activation
Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AdminAuthController@getActivate'));






Route::group(['middleware' => 'admin', 'as' => 'admin.',], function () {

    # Dashboard / Index
    Route::get('/', array('as' => 'dashboard', 'uses' => 'AdminJoshController@showHome'));

    // GUI Crud Generator
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

    # User Management
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'AdminUsersController@index'));
        Route::get('data', ['as' => 'users.data', 'uses' => 'AdminUsersController@data']);
        Route::get('create', 'AdminUsersController@create');
        Route::post('create', 'AdminUsersController@store');
        Route::get('{user}/delete', array('as' => 'users.delete', 'uses' => 'AdminUsersController@destroy'));
        Route::get('{user}/confirm-delete', array('as' => 'users.confirm-delete', 'uses' => 'AdminUsersController@getModalDelete'));
        Route::get('{user}/restore', array('as' => 'restore/user', 'uses' => 'AdminUsersController@getRestore'));
        Route::get('{user}', array('as' => 'users.show', 'uses' => 'AdminUsersController@show'));
        Route::post('{user}/passwordreset', array('as' => 'passwordreset', 'uses' => 'AdminUsersController@passwordreset'));
        Route::any('send-email/{type}', array('as' => 'users.send-email', 'uses' => 'AdminUsersController@send_email'));
    });
    Route::resource('users', 'AdminUsersController');
    Route::get('deleted_users', array('as' => 'deleted_users', 'before' => 'Sentinel', 'uses' => 'AdminUsersController@getDeletedUsers'));


    # Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'AdminGroupsController@index'));
        Route::get('create', array('as' => 'groups.create', 'uses' => 'AdminGroupsController@create'));
        Route::post('create', 'GroupsController@store');
        Route::get('{group}/edit', array('as' => 'groups.edit', 'uses' => 'AdminGroupsController@edit'));
        Route::post('{group}/edit', 'GroupsController@update');
        Route::get('{group}/delete', array('as' => 'groups.delete', 'uses' => 'AdminGroupsController@destroy'));
        Route::get('{group}/confirm-delete', array('as' => 'groups.confirm-delete', 'uses' => 'AdminGroupsController@getModalDelete'));
        Route::get('{group}/restore', array('as' => 'groups.restore', 'uses' => 'AdminGroupsController@getRestore'));
    });
    
    /* routes for about */
    Route::group(array('prefix' => 'about'), function () {
        Route::get('/', array('as' => 'abouts', 'uses' => 'AdminAboutController@index'));
        Route::get('create', array('as' => 'about.create', 'uses' => 'AdminAboutController@create'));
        Route::post('create', 'AdminAboutController@store');
        Route::get('{about}/edit', array('as' => 'about.edit', 'uses' => 'AdminAboutController@edit'));
        Route::post('{about}/edit', 'AdminAboutController@update');
        Route::get('{about}/delete', array('as' => 'about.delete', 'uses' => 'AdminAboutController@destroy'));
        Route::get('{about}/confirm-delete/', array('as' => 'about.confirm-delete', 'uses' => 'AdminAboutController@getModalDelete'));
        Route::get('{about}/restore', array('as' => 'about.restore', 'uses' => 'AdminAboutController@restore'));
        Route::get('{about}/show', array('as' => 'about.show', 'uses' => 'AdminAboutController@show'));
        Route::post('{about}/storecomment', 'AdminAboutController@storeComment');
    });
    /* routes for blog */
    Route::group(array('prefix' => 'blog'), function () {
        Route::get('/', array('as' => 'blogs', 'uses' => 'AdminBlogController@index'));
        Route::get('create', array('as' => 'blog.create', 'uses' => 'AdminBlogController@create'));
        Route::post('create', 'AdminBlogController@store');
        Route::get('{blog}/edit', array('as' => 'blog.edit', 'uses' => 'AdminBlogController@edit'));
        Route::post('{blog}/edit', 'AdminBlogController@update');
        Route::get('{blog}/delete', array('as' => 'blog.delete', 'uses' => 'AdminBlogController@destroy'));
        Route::get('confirm-delete/blog', array('as' => 'blog.confirm-delete', 'uses' => 'AdminBlogController@getModalDelete'));
        Route::get('{blog}/restore', array('as' => 'blog.restore', 'uses' => 'AdminBlogController@restore'));
        Route::get('{blog}/show', array('as' => 'blog.show', 'uses' => 'AdminBlogController@show'));
        Route::post('{blog}/storecomment', 'AdminBlogController@storeComment');
    });

    /* routes for blog category */
    Route::group(array('prefix' => 'blogcategory'), function () {
        Route::get('/', array('as' => 'blogcategories', 'uses' => 'AdminBlogCategoryController@index'));
        Route::get('create', array('as' => 'blogcategory.create', 'uses' => 'AdminBlogCategoryController@create'));
        Route::post('create', 'BlogCategoryController@store');
        Route::get('{blogCategory}/edit', array('as' => 'blogcategory.edit', 'uses' => 'AdminBlogCategoryController@edit'));
        Route::post('{blogCategory}/edit', 'BlogCategoryController@update');
        Route::get('{blogCategory}/delete', array('as' => 'blogcategory.delete', 'uses' => 'AdminBlogCategoryController@destroy'));
        Route::get('{blogCategory}/confirm-delete', array('as' => 'blogcategory.confirm-delete', 'uses' => 'AdminBlogCategoryController@getModalDelete'));
        Route::get('{blogCategory}/restore', array('as' => 'blogcategory.restore', 'uses' => 'AdminBlogCategoryController@getRestore'));
    });

    /* routes for press category */
    Route::group(array('prefix' => 'presscategory'), function () {
        Route::get('/', array('as' => 'presscategories', 'uses' => 'AdminPressCategoryController@index'));
        Route::get('create', array('as' => 'presscategory.create', 'uses' => 'AdminPressCategoryController@create'));
        Route::post('create', 'AdminPressCategoryController@store');
        Route::get('{pressCategory}/edit', array('as' => 'presscategory.edit', 'uses' => 'AdminPressCategoryController@edit'));
        Route::post('{pressCategory}/edit', 'AdminPressCategoryController@update');
        Route::get('{pressCategory}/delete', array('as' => 'presscategory.delete', 'uses' => 'AdminPressCategoryController@destroy'));
        Route::get('{pressCategory}/confirm-delete', array('as' => 'presscategory.confirm-delete', 'uses' => 'AdminPressCategoryController@getModalDelete'));
        Route::get('{pressCategory}/restore', array('as' => 'presscategory.restore', 'uses' => 'AdminPressCategoryController@getRestore'));
    });

    /* routes for file */
    Route::group(array('prefix' => 'file'), function () {
        Route::post('create', 'FileController@store');
        Route::post('createmulti', 'FileController@postFilesCreate');
        Route::delete('delete', 'FileController@delete');
    });

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });
    Route::post('crop_demo', 'AdminJoshController@crop_demo');

    /* laravel example routes */
    # datatables
    Route::get('datatables', 'DataTablesController@index');
    Route::get('datatables/data', array('as' => 'datatables.data', 'uses' => 'AdminDataTablesController@data'));

    # editable datatables
    Route::get('editable_datatables', 'EditableDataTablesController@index');
    Route::get('editable_datatables/data', array('as' => 'editable_datatables.data', 'uses' => 'AdminEditableDataTablesController@data'));
    Route::post('editable_datatables/create', 'EditableDataTablesController@store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update');
    Route::get('editable_datatables/{id}/delete', array('as' => 'editable_datatables.delete', 'uses' => 'AdminEditableDataTablesController@destroy'));

    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index');
    Route::get('custom_datatables/sliderData', array('as' => 'custom_datatables.sliderData', 'uses' => 'AdminCustomDataTablesController@sliderData'));
    Route::get('custom_datatables/radioData', array('as' => 'custom_datatables.radioData', 'uses' => 'AdminCustomDataTablesController@radioData'));
    Route::get('custom_datatables/selectData', array('as' => 'custom_datatables.selectData', 'uses' => 'AdminCustomDataTablesController@selectData'));
    Route::get('custom_datatables/buttonData', array('as' => 'custom_datatables.buttonData', 'uses' => 'AdminCustomDataTablesController@buttonData'));
    Route::get('custom_datatables/totalData', array('as' => 'custom_datatables.totalData', 'uses' => 'AdminCustomDataTablesController@totalData'));

    //tasks section
    Route::post('task/create', 'TaskController@store');
    Route::get('task/data', 'TaskController@data');
    Route::post('task/{task}/edit', 'TaskController@update');
    Route::post('task/{task}/delete', 'TaskController@delete');


    # Remaining pages will be called from below controller method
    # in real world scenario, you may be required to define all routes manually
    //Route::get('{name?}', 'JoshController@showView');


    Route::any('/url-redirect/list', array('as' => 'url-redirect', 'uses' => 'AdminRedirectController@index'));

    Route::any('get-units', ['as' => 'get-units', 'uses' => 'AdminSaleCenterController@getUnits']);
    Route::any('sale-center/locations', ['as' => 'sale-center.locations', 'uses' => 'AdminSaleCenterController@get_locations']);
    Route::any('sale-center/locations/edit/{id}', ['as' => 'sale-center.locations.edit', 'uses' => 'AdminSaleCenterController@get_locations']);
    Route::any('sale-center/communities', ['as' => 'sale-center.communities', 'uses' => 'AdminSaleCenterController@get_communities']);
    Route::any('sale-center/communities/edit/{id}', ['as' => 'sale-center.communities.edit', 'uses' => 'AdminSaleCenterController@index']);
    Route::any('sale-center/properties', ['as' => 'sale-center.properties', 'uses' => 'AdminSaleCenterController@get_properties']);
    Route::any('sale-center/properties/edit/{id}', ['as' => 'sale-center.properties.edit', 'uses' => 'AdminSaleCenterController@index']);
    Route::any('sale-center/units', ['as' => 'sale-center.units', 'uses' => 'AdminSaleCenterController@get_units']);
    Route::any('sale-center/units/wishlist', ['as' => 'sale-center.wishlist', 'uses' => 'AdminSaleCenterController@wishlist']);
    Route::any('sale-center/units/wishlist/{id}/edit', ['as' => 'sale-center.wishlist.edit', 'uses' => 'AdminSaleCenterController@wishlist_edit']);
    Route::any('sale-center/save-property-details', ['as' => 'sale-center.save-property-details', 'uses' => 'AdminSaleCenterController@save_property_details']);
    Route::any('sale-center/save-unit-details', ['as' => 'sale-center.save-unit-details', 'uses' => 'AdminSaleCenterController@save_unit_details']);

    Route::get('availability-app-setting', ['as' => 'availability-app-setting.index', 'uses' => 'AdminMobileAppsController@availabilityAppGetSetting']);
    Route::post('availability-app-setting', ['as' => 'availability-app-setting.store', 'uses' => 'AdminMobileAppsController@availabilityAppSetSetting']);

    Route::get('thoe-app-setting', ['as' => 'thoe-app-setting.index', 'uses' => 'AdminMobileAppsController@thoeAppGetSetting']);
    Route::post('thoe-app-setting', ['as' => 'thoe-app-setting.store', 'uses' => 'AdminMobileAppsController@thoeAppSetSetting']);

    Route::get('app-sync-version', ['as' => 'app-sync-version.index', 'uses' => 'SyncAdminController@getSyncVersion']);
    Route::post('app-sync-version', ['as' => 'app-sync-version.store', 'uses' => 'SyncAdminController@setSyncVersion']);
    Route::get('app-sync-version/delete/{id}', ['as' => 'app-sync-version.delete', 'uses' => 'SyncAdminController@deleteSyncVersion']);

    Route::get('get-access-token', ['as' => 'get-access-token', 'uses' => 'SalesForceAdminController@getAccessToken']);
    Route::get('get-lead-fields', ['as' => 'get-lead-fields', 'uses' => 'SalesForceAdminController@getLeadFields']);

    Route::get('import-leads', ['as' => 'leads.index', 'uses' => 'LeadImportAdminController@index']);
    Route::post('import-leads', ['as' => 'leads.import', 'uses' => 'LeadImportAdminController@importExcel']);

    Route::get('/permissionDenied', array('uses' => 'AdminPermissionController@noPermission', 'as' => 'noPermission'));

    # Website management

    Route::get('/setting', array('uses' => 'AdminSettingController@index'));
    Route::post('/setting', array('uses' => 'AdminSettingController@update_logo'));
    Route::get('/setting/header_menu', array('uses' => 'AdminSettingController@header_menu'));
    Route::get('/setting/add_menu', array('uses' => 'AdminSettingController@add_menu'));
    Route::post('/setting/add_menu', array('uses' => 'AdminSettingController@store_menu'));
    Route::get('/setting/{id}/edith', array('uses' => 'AdminSettingController@edit_menu'));
    Route::get('/setting/{id}/deleteh', array('uses' => 'AdminSettingController@delete_menu'));
    Route::post('/setting/{id}/edith', array('uses' => 'AdminSettingController@update_menu'));
    Route::get('/setting/{id}/status/{flag}', array('uses' => 'AdminSettingController@status'));
    Route::get('/setting/footer', array('uses' => 'AdminSettingController@footer_setting'));
    Route::post('/setting/footer', array('uses' => 'AdminSettingController@update_setting'));

    Route::get('/setting/footer_menu', array('uses' => 'AdminSettingController@footer_menu'));
    Route::get('/setting/add_menu', array('uses' => 'AdminSettingController@add_menu'));
    Route::post('/setting/add_menu', array('uses' => 'AdminSettingController@store_menu'));


    /* Menu Ordering Management */
    Route::get('/setting/ordering', array('uses' => 'AdminSettingController@getOrdering'));
    Route::post('/setting/ordering', array('uses' => 'AdminSettingController@update_ordering'));
    Route::get('/setting/fordering', array('uses' => 'AdminSettingController@getOrderingf'));
    Route::post('/setting/fordering', array('uses' => 'AdminSettingController@update_orderingf'));
    Route::get('/setting/projectordering', array('uses' => 'AdminSettingController@getProjectOrdering'));
    Route::post('/setting/projectordering', array('uses' => 'AdminSettingController@update_project_ordering'));

    Route::get('/setting/eventordering', array('uses' => 'AdminSettingController@getEventOrdering'));
    Route::post('/setting/eventordering', array('uses' => 'AdminSettingController@updateEventOrdering'));

    Route::get('/setting/pressordering', array('uses' => 'AdminSettingController@getPressOrdering'));
    Route::post('/setting/pressordering', array('uses' => 'AdminSettingController@updatePressOrdering'));

    Route::get('/setting/videoordering', array('uses' => 'AdminSettingController@getvideoordering'));
    Route::post('/setting/videoordering', array('uses' => 'AdminSettingController@update_video_ordering'));
    Route::get('/setting/imagealbumordering', array('uses' => 'AdminSettingController@getimagealbumordering'));
    Route::post('/setting/imagealbumordering', array('uses' => 'AdminSettingController@update_image_album_ordering'));
    Route::get('/setting/imagethumbordering', array('uses' => 'AdminSettingController@getimagethumordering'));
    Route::post('/setting/imagethumbordering', array('uses' => 'AdminSettingController@update_image_thumb_ordering'));



    /* Banner Ordering */
    Route::get('/setting/bannerodering', array('uses' => 'AdminSettingController@getBannerOrdering'));
    Route::post('/setting/bannerodering', array('uses' => 'AdminSettingController@update_banner_ordering'));

    /* Team Ordering */
    Route::get('/setting/teamrordering', array('uses' => 'AdminSettingController@getTeamOrdering'));
    Route::post('/setting/teamrordering', array('uses' => 'AdminSettingController@update_team_ordering'));

    /* Banner Slider */

    Route::get('/setting/banner_slider', array('uses' => 'AdminSettingController@banner_slider'));
    Route::get('/setting/{id}/add_banner', array('uses' => 'AdminSettingController@add_banner'));
    Route::post('/setting/{id}/add_banner', array('uses' => 'AdminSettingController@store_banner'));
    Route::get('/setting/{id}/deleteh', array('uses' => 'AdminSettingController@delete_banner'));
    Route::get('/setting/{id}/bannerstatus/{flag}', array('uses' => 'AdminSettingController@bannerstatus'));

    /* Feature Slider */

    Route::get('/setting/feature_slider', array('uses' => 'AdminSettingController@feature_slider'));
    Route::get('/setting/{id}/add_feature', array('uses' => 'AdminSettingController@add_feature'));
    Route::post('/setting/{id}/add_feature', array('uses' => 'AdminSettingController@store_feature'));
    Route::get('/setting/{id}/deletefeature', array('uses' => 'AdminSettingController@delete_feature'));
    Route::get('/setting/{id}/featurestatus/{flag}', array('uses' => 'AdminSettingController@featurestatus'));


    # Content management

    Route::get('/content/{id}/edit', array('uses' => 'AdminContentsController@edit'));
    Route::get('/content/{id}/delete', array('uses' => 'AdminContentsController@delete'));
    Route::post('/content/{id}/edit', array('uses' => 'AdminContentsController@update'));
    Route::get('/content', array('as' => 'content', 'uses' => 'AdminContentsController@index'));
    Route::get('/content/create', array('uses' => 'AdminContentsController@create'));
    Route::post('/content/create', array('uses' => 'AdminContentsController@store'));

    /* About Thoe Development */
    Route::get('/content/about', array('uses' => 'AdminContentsController@about_us'));
    Route::post('/content/about', array('uses' => 'AdminContentsController@update_about'));

    /* Careers Development */
    Route::get('/content/careers', array('uses' => 'AdminContentsController@careers'));
    Route::post('/content/careers', array('uses' => 'AdminContentsController@update_careers'));

    /* Timeline - Awards */
    Route::get('/content/timeline', array('uses' => 'AdminContentsController@fun_timeline'));
    Route::get('/content/createtimeline', array('uses' => 'AdminContentsController@createtimeline'));
    Route::post('/content/createtimeline', array('uses' => 'AdminContentsController@update_timeline'));
    Route::get('/content/timeline/{id}/edit', array('uses' => 'AdminContentsController@createtimeline'));
    Route::get('/content/timeline/{id}/delete_timeline', array('uses' => 'AdminContentsController@delete_timeline'));
    Route::post('/content/timeline/{id}/edit', array('uses' => 'AdminContentsController@update_timeline'));
    Route::get('/content/{id}/contentstatus/{flag}', array('uses' => 'AdminContentsController@timelinestatus'));

    /* Team Members */
    Route::get('/content/team', array('uses' => 'AdminContentsController@fun_team'));
    Route::get('/content/createteam', array('uses' => 'AdminContentsController@createteam'));
    Route::post('/content/createteam', array('uses' => 'AdminContentsController@update_team'));
    Route::get('/content/team/{id}/edit', array('uses' => 'AdminContentsController@createteam'));
    Route::get('/content/team/{id}/delete_timeline', array('uses' => 'AdminContentsController@delete_team'));
    Route::post('/content/team/{id}/edit', array('uses' => 'AdminContentsController@update_team'));
    Route::get('/content/{id}/status_p/{flag}', array('uses' => 'AdminContentsController@status'));

    Route::get('/content/team_member', array('uses' => 'AdminContentsController@fun_team_member'));
    Route::get('/content/createteam_member', array('uses' => 'AdminContentsController@createteam_member'));
    Route::post('/content/createteam_member', array('uses' => 'AdminContentsController@update_team_member'));
    Route::get('/content/team_member/{id}/edit', array('uses' => 'AdminContentsController@createteam_member'));
    Route::get('/content/team_member/{id}/delete_timeline', array('uses' => 'AdminContentsController@delete_team_member'));
    Route::post('/content/team_member/{id}/edit', array('uses' => 'AdminContentsController@update_team_member'));
    Route::get('/content/{id}/status_p_member/{flag}', array('uses' => 'AdminContentsController@status_member'));
    Route::post('/content/ajax_get_team', array('uses' => 'AdminContentsController@ajax_get_teams'));
    Route::post('/content/team_member/{id}/ajax_get_team', array('uses' => 'AdminContentsController@ajax_get_teams'));

    /* Corporate Executives */
    Route::get('/content/executives', array('uses' => 'AdminContentsController@executives'));
    Route::post('/content/executives', array('uses' => 'AdminContentsController@update_executives'));

    /* Project Management */

    Route::get('/properties/projects', array('uses' => 'AdminPropertiesController@projects'));
    Route::get('/properties/add_project', array('uses' => 'AdminPropertiesController@add_project'));
    Route::post('/properties/add_project', array('uses' => 'AdminPropertiesController@store_project'));
    Route::get('/properties/projects/{id}/add_project', array('uses' => 'AdminPropertiesController@add_project'));
    Route::post('/properties/projects/{id}/add_project', array('uses' => 'AdminPropertiesController@store_project'));
    Route::get('/properties/projects/{id}/delete', array('uses' => 'AdminPropertiesController@delete_project'));
    Route::get('/properties/{id}/status_p/{flag}', array('uses' => 'AdminPropertiesController@status'));

    /* Property Gallery Management */
    Route::get('/properties/gallery', array('uses' => 'AdminPropertiesController@gallery'));
    Route::get('/properties/add_gallery', array('uses' => 'AdminPropertiesController@add_gallery'));
    Route::post('/properties/add_gallery', array('uses' => 'AdminPropertiesController@update_gallery'));
    Route::post('/properties/ajax_get_properties', array('uses' => 'AdminPropertiesController@ajax_getproperties'));
    Route::get('/properties/gallery/{id}/edit', array('uses' => 'AdminPropertiesController@add_gallery'));
    Route::post('/properties/gallery/{id}/edit', array('uses' => 'AdminPropertiesController@update_gallery'));
    Route::get('/properties/gallery/{id}/delete', array('uses' => 'AdminPropertiesController@delete_gallery'));
    Route::get('/properties/{id}/statusg/{flag}', array('uses' => 'AdminPropertiesController@statusg'));

    /* Available Unit Management */
    Route::get('/properties/availableunits', array('uses' => 'AdminPropertiesController@availableunits'));
    Route::get('/properties/add_availableunits', array('uses' => 'AdminPropertiesController@add_availableunits'));
    Route::post('/properties/add_availableunits', array('uses' => 'AdminPropertiesController@update_availableunits'));
    Route::get('/properties/gallery/{id}/editavailableunits', array('uses' => 'AdminPropertiesController@add_availableunits'));
    Route::post('/properties/gallery/{id}/editavailableunits', array('uses' => 'AdminPropertiesController@update_availableunits'));
    Route::get('/properties/gallery/{id}/deleteavailableunits', array('uses' => 'AdminPropertiesController@delete_availableunit'));
    Route::get('/properties/{id}/statusavailableunits/{flag}', array('uses' => 'AdminPropertiesController@statusavailableunits'));
    Route::post('/properties/ajax_get_units', array('uses' => 'AdminPropertiesController@ajax_getunits'));
    Route::post('/properties/ajax_get_properties_unit', array('uses' => 'AdminPropertiesController@ajax_getproperties_unit'));


    /* Unit Gallery Management */


    Route::get('/properties/units/{id}/addphotos', array('uses' => 'AdminPropertiesController@addphoto'));
    Route::post('/properties/units/{id}/addphotos', array('uses' => 'AdminPropertiesController@updateupload'));

    Route::get('/properties/units/{id}/addphotosfloorplan', array('uses' => 'AdminPropertiesController@addphotosfloorplan'));
    Route::post('/properties/units/{id}/addphotosfloorplan', array('uses' => 'AdminPropertiesController@updatefloorplanupload'));

    /* Aminities Management */
    Route::get('/properties/amenities', array('uses' => 'AdminPropertiesController@amenities'));
    Route::get('/properties/add_amenities', array('uses' => 'AdminPropertiesController@add_amenities'));
    Route::post('/properties/add_amenities', array('uses' => 'AdminPropertiesController@store_amenities'));
    Route::get('/properties/amenities/{id}/edit_amenities', array('uses' => 'AdminPropertiesController@add_amenities'));
    Route::post('/properties/amenities/{id}/edit_amenities', array('uses' => 'AdminPropertiesController@store_amenities'));
    Route::get('/properties/amenities/{id}/delete', array('uses' => 'AdminPropertiesController@delete_amenities'));
    Route::get('/properties/{id}/status/{flag}', array('uses' => 'AdminPropertiesController@status_am'));


    /* Units Management */
    Route::get('/properties/units', array('uses' => 'AdminPropertiesController@units'));
    Route::get('/properties/add_units', array('uses' => 'AdminPropertiesController@add_units'));
    Route::post('/properties/add_units', array('uses' => 'AdminPropertiesController@store_units'));
    Route::get('/properties/units/{id}/edit_units', array('uses' => 'AdminPropertiesController@add_units'));
    Route::post('/properties/units/{id}/edit_units', array('uses' => 'AdminPropertiesController@store_units'));
    Route::get('/properties/units/{id}/delete', array('uses' => 'AdminPropertiesController@delete_units'));
    Route::get('/properties/{id}/status_u/{flag}', array('uses' => 'AdminPropertiesController@status_u'));
    Route::get('/properties/units/{id}/edit_units_detail', array('uses' => 'AdminPropertiesController@add_units_detail'));
    Route::post('/properties/units/{id}/edit_units_detail', array('uses' => 'AdminPropertiesController@store_units_detail'));


    /* Unit floor Management */
    Route::get('/properties/unitsfloor', array('uses' => 'AdminPropertiesController@unitsfloor'));
    Route::get('/properties/add_unitsfloor', array('uses' => 'AdminPropertiesController@add_unitsfloor'));
    Route::post('/properties/add_unitsfloor', array('uses' => 'AdminPropertiesController@store_unitsfloor'));
    Route::get('/properties/units/{id}/edit_unitsfloor', array('uses' => 'AdminPropertiesController@add_unitsfloor'));
    Route::post('/properties/units/{id}/edit_unitsfloor', array('uses' => 'AdminPropertiesController@store_unitsfloor'));
    Route::get('/properties/units/{id}/deletefloor', array('uses' => 'AdminPropertiesController@delete_unitsfloor'));
    Route::get('/properties/{id}/status_ufloor/{flag}', array('uses' => 'AdminPropertiesController@status_ufloor'));

    /* Unit feature Management */
    Route::get('/properties/unitsfeature', array('uses' => 'AdminPropertiesController@unitsfeature'));
    Route::get('/properties/add_unitsfeature', array('uses' => 'AdminPropertiesController@add_unitsfeature'));
    Route::post('/properties/add_unitsfeature', array('uses' => 'AdminPropertiesController@store_unitsfeature'));
    Route::get('/properties/units/{id}/edit_unitsfeature', array('uses' => 'AdminPropertiesController@add_unitsfeature'));
    Route::post('/properties/units/{id}/edit_unitsfeature', array('uses' => 'AdminPropertiesController@store_unitsfeature'));
    Route::get('/properties/units/{id}/deletefeature', array('uses' => 'AdminPropertiesController@delete_unitsfeature'));
    Route::get('/properties/{id}/status_ufeature/{flag}', array('uses' => 'AdminPropertiesController@status_ufeature'));

    /* Category Management */
    Route::get('/properties/categories', array('uses' => 'AdminPropertiesController@categories'));
    Route::get('/properties/add_category', array('uses' => 'AdminPropertiesController@add_category'));
    Route::post('/properties/add_category', array('uses' => 'AdminPropertiesController@store_category'));
    Route::get('/properties/categories/{id}/edit_category', array('uses' => 'AdminPropertiesController@add_category'));
    Route::post('/properties/categories/{id}/edit_category', array('uses' => 'AdminPropertiesController@store_category'));
    Route::get('/properties/categories/{id}/delete', array('uses' => 'AdminPropertiesController@delete_category'));
    Route::get('/properties/{id}/status_c/{flag}', array('uses' => 'AdminPropertiesController@status_c'));

    Route::any('/meta/list', array('uses' => 'AdminMetaController@index'));
    //SeoTools

    /* Property Management */
    Route::get('/properties/list', array('uses' => 'AdminPropertiesController@list1'));
    Route::get('/properties/add_property', array('uses' => 'AdminPropertiesController@add_property'));
    Route::post('/properties/add_property', array('uses' => 'AdminPropertiesController@store_property'));
    Route::get('/properties/{id}/edit_property', array('uses' => 'AdminPropertiesController@add_property'));
    Route::post('/properties/{id}/edit_property', array('uses' => 'AdminPropertiesController@store_property'));
    Route::get('/properties/{id}/delete', array('uses' => 'AdminPropertiesController@delete_property'));
    Route::get('/properties/{id}/status_property/{flag}', array('uses' => 'AdminPropertiesController@status_property'));

    /* Construction Management */
    Route::get('/properties/construction', array('uses' => 'AdminPropertiesController@construction'));
    Route::get('/properties/construction/{id}/edit', array('uses' => 'AdminPropertiesController@edit_construction'));
    Route::post('/properties/construction/{id}/edit', array('uses' => 'AdminPropertiesController@updateconstruction'));

    /* Construction Gallery Management */
    Route::get('/properties/medias', array('uses' => 'AdminPropertiesController@medias'));
    Route::get('/properties/add_media', array('uses' => 'AdminPropertiesController@add_media'));
    Route::post('/properties/add_media', array('uses' => 'AdminPropertiesController@update_media'));
    Route::get('/properties/medias/{id}/edit', array('uses' => 'AdminPropertiesController@add_media'));
    Route::post('/properties/medias/{id}/edit', array('uses' => 'AdminPropertiesController@update_media'));
    Route::get('/properties/medias/{id}/delete', array('uses' => 'AdminPropertiesController@delete_media'));
    Route::get('/properties/{id}/statusc/{flag}', array('uses' => 'AdminPropertiesController@statusc'));
    Route::get('/properties/medias/{id}/addcaption', array('uses' => 'AdminPropertiesController@add_caption'));
    Route::post('/properties/medias/{id}/addcaption', array('uses' => 'AdminPropertiesController@update_caption'));



    /* Property Type */
    Route::post('/properties/add_category', array('uses' => 'AdminPropertiesController@store_category'));
    Route::get('/properties/categories/{id}/edit_category', array('uses' => 'AdminPropertiesController@add_category'));
    Route::post('/properties/categories/{id}/edit_category', array('uses' => 'AdminPropertiesController@store_category'));
    Route::get('/properties/categories/{id}/delete', array('uses' => 'AdminPropertiesController@delete_category'));
    Route::get('/properties/{id}/status_c/{flag}', array('uses' => 'AdminPropertiesController@status_c'));

    /* News Management */
    Route::get('/news', array('uses' => 'AdminNewsController@index'));
    Route::get('/news/{id}/status/{flag}', array('uses' => 'AdminNewsController@status'));

    Route::get('/news/add_news', array('uses' => 'AdminNewsController@create'));
    Route::get('/news/{id}/edit', array('uses' => 'AdminNewsController@create'));
    Route::get('/news/{id}/delete', array('uses' => 'AdminNewsController@delete_news'));
    Route::post('/news/{id}/edit', array('uses' => 'AdminNewsController@store_news'));
    Route::post('/news/add_news', array('uses' => 'AdminNewsController@store_news'));
    Route::post('/news/coverage/delete_coverage', array('as' => 'news.deletecoverage', 'uses' => 'AdminNewsController@delete_coverage'));
    /* Booking and payment Management */
    Route::post('/payment/search', array('uses' => 'AdminPaymentController@getSearch'));
    Route::post('/payment/search_booking', array('uses' => 'AdminPaymentController@getSearchBooking'));
    Route::get('/payment/onlinepayment', array('uses' => 'AdminPayController@show_list'));
    Route::post('/payment/fetch_booking_transactions', array('uses' => 'AdminPayController@getBookingTransactionStatus'));
    Route::get('/payment/booking', array('uses' => 'AdminPayController@booking'));

    /* Event Management */
    Route::get('/events/', array('uses' => 'AdminEventsController@index'));
    Route::get('/events/{id}/status/{flag}', array('uses' => 'AdminEventsController@status'));
    Route::get('/events/{id}/delete', array('uses' => 'AdminEventsController@delete_event'));

    Route::get('/events/add_event', array('uses' => 'AdminEventsController@create'));
    Route::post('/events/add_event', array('uses' => 'AdminEventsController@store_events'));

    Route::get('/events/{id}/edit', array('uses' => 'AdminEventsController@create'));
    Route::post('/events/{id}/edit', array('uses' => 'AdminEventsController@store_events'));

    /* Interviews */
    Route::get('/interviews/', array('uses' => 'AdminInterviewsController@index'));
    Route::get('/interviews/{id}/status/{flag}', array('uses' => 'AdminInterviewsController@status'));
    Route::get('/interviews/{id}/delete', array('uses' => 'AdminInterviewsController@delete_interviews'));

    Route::get('/interviews/add_interview', array('uses' => 'AdminInterviewsController@create'));
    Route::post('/interviews/add_interview', array('uses' => 'AdminInterviewsController@store_interviews'));

    Route::get('/interviews/{id}/edit', array('uses' => 'AdminInterviewsController@create'));
    Route::post('/interviews/{id}/edit', array('uses' => 'AdminInterviewsController@store_interviews'));
    /* End Interviews */

    /* Contact Us */
    Route::get('/contact', array('uses' => 'AdminContactController@index'));
    Route::get('/contact/{id}/status/{flag}', array('uses' => 'AdminContactController@status'));

    Route::get('/contact/add_contact', array('uses' => 'AdminContactController@create'));
    Route::get('/contact/{id}/edit', array('uses' => 'AdminContactController@create'));
    Route::post('/contact/{id}/edit', array('uses' => 'AdminContactController@store_contact'));
    Route::post('/contact/add_contact', array('uses' => 'AdminContactController@store_contact'));
    Route::get('/contact/{id}/delete', array('uses' => 'AdminContactController@delete'));

//    /* Admin Users */
//    Route::get('/adminusers', array('uses' => 'AdminUsersController@index'));
//    Route::get('/adminusers/{id}/status/{flag}', array('uses' => 'AdminUsersController@status'));
//
//    Route::get('/adminusers/add_user', array('uses' => 'AdminUsersController@create'));
//    Route::get('/adminusers/{id}/edit', array('uses' => 'AdminUsersController@create'));
//    Route::post('/adminusers/{id}/edit', array('uses' => 'AdminUsersController@store_user'));
//    //Route::post('/adminusers/add_user',array('uses' => 'AdminUsersController@store_user'));
//    Route::post('/adminusers/add_user', array('uses' => 'AdminUsersController@postLogin'));
//    Route::get('/adminusers/{id}/delete', array('uses' => 'AdminUsersController@delete'));

    /* Agents */
    Route::get('/agents', array('uses' => 'AdminAgentController@index'));
    Route::get('/agents/{id}/status/{flag}', array('uses' => 'AdminAgentController@status'));
    Route::get('/agents/add_contact', array('uses' => 'AdminAgentController@create'));
    Route::get('/agents/{id}/edit', array('uses' => 'AdminAgentController@create'));
    Route::post('/agents/{id}/edit', array('uses' => 'AdminAgentController@store_contact'));

    Route::get('/agents/{id}/reset', array('uses' => 'AdminAgentController@resetf'));
    Route::post('/agents/{id}/reset', array('uses' => 'AdminAgentController@reset'));

    Route::post('/agents/add_contact', array('uses' => 'AdminAgentController@store_contact'));
    Route::get('/agents/{id}/delete', array('uses' => 'AdminAgentController@delete'));
    Route::get('/agents/{id}/approveagent', array('uses' => 'AdminAgentController@approveagent'));

    /* Gallery management */

    Route::get('/events/gallery', array('uses' => 'AdminEventsController@gallery'));
    Route::get('/events/videos', array('uses' => 'AdminEventsController@videos'));

    Route::get('/events/add_gallery', array('uses' => 'AdminEventsController@add_gallery'));
    Route::post('/events/add_gallery', array('uses' => 'AdminEventsController@update_gallery'));

    Route::get('/events/add_video', array('uses' => 'AdminEventsController@add_video'));
    Route::post('/events/add_video', array('uses' => 'AdminEventsController@update_video'));

    Route::post('/events/ajax_get_properties', array('uses' => 'AdminEventsController@ajax_getproperties'));
    Route::get('/events/gallery/{id}/edit', array('uses' => 'AdminEventsController@add_gallery'));
    Route::post('/events/gallery/{id}/edit', array('uses' => 'AdminEventsController@update_gallery'));

    Route::get('/events/videos/{id}/edit', array('uses' => 'AdminEventsController@add_video'));
    Route::post('/events/videos/{id}/edit', array('uses' => 'AdminEventsController@update_video'));

    Route::get('/events/gallery/{id}/delete', array('uses' => 'AdminEventsController@delete_gallery'));
    Route::get('/events/videos/{id}/delete', array('uses' => 'AdminEventsController@delete_video'));

    Route::get('/events/{id}/statusg/{flag}', array('uses' => 'AdminEventsController@statusg'));
    Route::get('/events/{id}/statusvideo/{flag}', array('uses' => 'AdminEventsController@statusvideo'));

    Route::get('/events/{id}/addphotos', array('uses' => 'AdminEventsController@addphoto'));
    Route::post('/events/{id}/addphotos', array('uses' => 'AdminEventsController@updateupload'));

    /* Near By Management */

    Route::get('/properties/near', array('uses' => 'AdminPropertiesController@near_places'));
    Route::get('/properties/add_places', array('uses' => 'AdminPropertiesController@add_places'));
    Route::get('/properties/near/{id}/edit_place', array('uses' => 'AdminPropertiesController@add_places'));
    Route::post('/properties/near/{id}/edit_place', array('uses' => 'AdminPropertiesController@updateplace'));
    Route::post('/properties/add_places', array('uses' => 'AdminPropertiesController@updateplace'));
    Route::get('/properties/{id}/status_n/{flag}', array('uses' => 'AdminPropertiesController@status_n'));
    Route::get('/properties/near/{id}/delete_place', array('uses' => 'AdminPropertiesController@delete_place'));

    /* Careers Step Management */
    Route::get('/content/steps', array('uses' => 'AdminContentsController@steps'));
    Route::get('/content/add_steps', array('uses' => 'AdminContentsController@add_steps'));
    Route::post('/content/add_steps', array('uses' => 'AdminContentsController@store_steps'));
    Route::get('/content/steps/{id}/edit_steps', array('uses' => 'AdminContentsController@add_steps'));
    Route::post('/content/steps/{id}/edit_steps', array('uses' => 'AdminContentsController@store_steps'));
    Route::get('/content/steps/{id}/deletesteps', array('uses' => 'AdminContentsController@delete_steps'));
    Route::get('/content/{id}/status_steps/{flag}', array('uses' => 'AdminContentsController@status_steps'));

    /* Careers Job Management */
    Route::get('/content/jobs', array('uses' => 'AdminContentsController@jobs'));
    Route::get('/content/add_jobs', array('uses' => 'AdminContentsController@add_jobs'));
    Route::post('/content/add_jobs', array('uses' => 'AdminContentsController@store_jobs'));
    Route::get('/content/jobs/{id}/edit_jobs', array('uses' => 'AdminContentsController@add_jobs'));
    Route::post('/content/jobs/{id}/edit_jobs', array('uses' => 'AdminContentsController@store_jobs'));
    Route::get('/content/jobs/{id}/deletejobs', array('uses' => 'AdminContentsController@delete_jobs'));
    Route::get('/content/{id}/status_jobs/{flag}', array('uses' => 'AdminContentsController@status_jobs'));

    Route::get('get-availability', 'AdminSalesForceController@avaliablilityListApi');

    # Remaining pages will be called from below controller method
    # in real world scenario, you may be required to define all routes manually
    //Route::get('{name?}', 'AdminJoshController@showView');
});
