<?php

include_once 'web_builder.php';
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

Route::group(array('prefix' => get_locale(Request::segment(1))), function() {

    Route::get('/thank-you', ['as' => 'thank', 'uses' => 'PageController@thankYou']);
    Route::get('/privacy', ['as' => 'privacy', 'uses' => 'PageController@privacy']);
    Route::get('/terms', ['as' => 'terms', 'uses' => 'PageController@terms']);
    Route::get('/careers-at-thoe', ['as' => 'careers-at-thoe', 'uses' => 'PageController@careersAtThoe']);
    Route::any('/media-center', ['as' => 'mediacenter', 'uses' => 'PageController@mediacenter']);

    Route::any('/search', ['as' => 'search', 'uses' => 'SearchController@index']);

    Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@about_thoe']);
    Route::get('/about-thoe', ['as' => 'about-thoe', 'uses' => 'AboutController@about_thoe']);
    Route::get('/about-the-world', ['as' => 'about-the-world', 'uses' => 'AboutController@about_the_world']);
    Route::get('/about-developer', ['as' => 'about-developer', 'uses' => 'AboutController@about_developer']);
    Route::get('/chairmans-message', ['as' => 'chairmans-message', 'uses' => 'AboutController@chairmans_message']);
    Route::get('/management-team', ['as' => 'management-team', 'uses' => 'AboutController@management_team']);
    Route::get('/awards', ['as' => 'awards', 'uses' => 'AboutController@awards']);


    Route::get('/our-founder', ['as' => 'our-founder', 'uses' => 'AboutController@our_founder']);
    Route::get('/management', ['as' => 'management', 'uses' => 'AboutController@management1']);
    Route::get('/board-of-directors', ['as' => 'management', 'uses' => 'AboutController@board_of_directors']);
    //Route::get('/management-draft', ['as' => 'management-draft', 'uses' => 'AboutController@management1']);
    Route::get('/ajax_get_team', ['as' => 'management', 'uses' => 'AboutController@ajax_get_team']);
    Route::get('/construction-year', ['as' => 'construction-year', 'uses' => 'AboutController@construction_year']);

    Route::get('/agent-login', ['as' => 'agent-index', 'uses' => 'AgentController@index']);
    Route::post('/agent-login', ['as' => 'agent-login', 'uses' => 'AgentController@agentLogin']);
    Route::post('/agent-register', ['as' => 'agent-register', 'uses' => 'AgentController@agentRegister']);
    Route::get('/agent-dashboard', ['as' => 'agent-dashboard', 'uses' => 'AgentController@agent_dashboard']);
    Route::get('/agent-dash', ['as' => 'agent-dashboard', 'uses' => 'AgentController@agent_dash']);
    Route::post('/downloaddata', ['as' => 'downloaddata', 'uses' => 'AgentController@downloaddata']);
    Route::get('/logout', array('as' => 'logout', 'uses' => 'AgentController@getLogout'));

    Route::get('/contact', ['as' => 'contact.index', 'uses' => 'ContactController@index']);
    Route::post('/contact-send', ['as' => 'contact.send', 'uses' => 'ContactController@send_contact']);

    Route::get('/events', ['as' => 'events.index', 'uses' => 'EventController@index']);
    Route::get('/events/{slug}', ['as' => 'events.details', 'uses' => 'EventController@details']);

    Route::get('/offers', ['as' => 'offers.index', 'uses' => 'OfferController@index']);
    Route::get('/offers/{slug}', ['as' => 'offers.details', 'uses' => 'OfferController@details']);

    Route::any('/news-pr', ['as' => 'news-pr.index', 'uses' => 'NewsPRController@index']);
    Route::get('/news-pr/{slug}', ['as' => 'news-pr.details', 'uses' => 'NewsPRController@details']);
    Route::get('/media-gallery', ['as' => 'media-galleries.index', 'uses' => 'MediaGalleryController@index']);
    Route::get('/image-gallery', ['as' => 'image-gallery.index', 'uses' => 'MediaGalleryController@image_galleries']);
    Route::get('/image-gallery/{gallery}', ['as' => 'image-gallery.index', 'uses' => 'MediaGalleryController@image_gallery']);
    Route::get('/video-gallery', ['as' => 'video-galleries.index', 'uses' => 'MediaGalleryController@video_galleries']);
    Route::get('/video-gallery/{gallery}', ['as' => 'video-gallery.index', 'uses' => 'MediaGalleryController@video_gallery']);
    Route::any('/interviews', ['as' => 'interviews.index', 'uses' => 'InterviewsController@index']);

    Route::get('/construction-updates', ['as' => 'construction.updates', 'uses' => 'ConstructionController@index']);
    //Route::get('/construction-updates', ['as' => 'community.updates', 'uses' => 'ConstructionController@community']);
    Route::get('/construction-updates/{projects}', ['as' => 'community-area.updates', 'uses' => 'ConstructionController@properties']);
    Route::get('/construction-updates/{projects}/{property}', ['as' => 'community-area.updates', 'uses' => 'ConstructionController@property']);
    Route::post('/constructiondownload', ['as' => 'constructiondownload', 'uses' => 'ConstructionController@constructiondownload']);

    Route::get('/projects', ['as' => 'thoe.properties', 'uses' => 'PropertyController@index']);
    //Route::get('/community', ['as' => 'community.properties', 'uses' => 'PropertyController@community']);
    Route::get('/projects/{peoject}', ['as' => 'community-area.properties', 'uses' => 'PropertyController@properties']);
    Route::get('/projects/{peoject}/{property}', ['as' => 'community-area.properties', 'uses' => 'PropertyController@property']);

    Route::get('/property-booking', ['as' => 'property-bookings', 'uses' => 'PropertyController@propertyBooking']);
    Route::get('/completed-projects', ['as' => 'completed-projects', 'uses' => 'PropertyController@completed']);
    Route::any('/download/{id}', ['as' => 'download', 'uses' => 'PropertyController@download']);
    Route::get('/mortgage-calculator', 'PropertyController@mortgageCalculator');

    Route::get('/sitemap', 'SitemapController@index');
    Route::get('/generate-sitemap', 'SitemapController@create_sitemap_xml');

    Route::get('/invite/{num}', function($num) {
        return view('pages.invite', ['num' => $num]);
    });

    Route::get('/online-booking', ['as' => 'online-booking.index', 'uses' => 'BookingController@index']);
    Route::get('/online-booking/{project}', ['as' => 'online-booking.project', 'uses' => 'BookingController@project']);
    Route::get('/online-booking/{project}/book', ['as' => 'online-booking.book', 'uses' => 'BookingController@book']);

    Route::get('/lead-form/agents', ['as' => 'lead-form.agents', 'uses' => 'LeadFormController@agent_leads']);
    Route::get('/lead-form/{form?}', ['as' => 'lead-form.index', 'uses' => 'LeadFormController@index']);
    Route::get('/lead-form2/{form?}', ['as' => 'lead-form.form_2', 'uses' => 'LeadFormController@form_2']);
    Route::get('/lead-report', ['as' => 'lead-report', 'uses' => 'LeadFormController@lead_report']);

    Route::post('/newsletter/subscribe', ['as' => 'newsletter-subscribe', 'uses' => 'NewsLetterController@subscribe']);
    Route::get('/newsletter/confirm/{sid}/{token}', ['as' => 'newsletter-confirm', 'uses' => 'NewsLetterController@confirm']);


// New Routes
    Route::post('/get-in-touch', 'HomeController@get_in_touch');
    Route::get('/send-emailer', ['as' => 'ips.sendEmailer', 'uses' => 'IPSController@sendEmailer']);

    #FrontEndController
    Route::get('login', array('as' => 'fe-login', 'uses' => 'FrontEndController@getLogin'));
    Route::post('login', array('as' => 'fe-login', 'uses' => 'FrontEndController@postLogin'));
    //Route::get('register', array('as' => 'fe-register', 'uses' => 'FrontEndController@getRegister'));
    //Route::post('register', array('as' => 'fe-register', 'uses' => 'FrontEndController@postRegister'));
    Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'FrontEndController@getActivate'));
    Route::get('forgot-password', array('as' => 'fe-forgot-password', 'uses' => 'FrontEndController@getForgotPassword'));
    Route::post('forgot-password', array('as' => 'fe-forgot-password', 'uses' => 'FrontEndController@postForgotPassword'));
# Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'fe-forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{userId}/{passwordResetCode}', array('as' => 'fe-forgot-password-confirm', 'uses' => 'FrontEndController@postForgotPasswordConfirm'));
# My account display and update details
    Route::group(array('middleware' => 'user'), function () {
        //Route::get('my-account', array('as' => 'fe-my-account', 'uses' => 'FrontEndController@myAccount'));
        //Route::put('my-account', array('as' => 'fe-my-account', 'uses' =>'FrontEndController@update'));
    });
    Route::get('logout', array('as' => 'logout', 'uses' => 'FrontEndController@getLogout'));
# contact form
    Route::post('contact', array('as' => 'contact', 'uses' => 'FrontEndController@postContact'));

#frontend views

    Route::get('blog', array('as' => 'blog', 'uses' => 'FrontendBlogController@index'));
    Route::get('blog/{slug}/tag', 'FrontendBlogController@getBlogTag');
    Route::get('blogitem/{slug?}', 'FrontendBlogController@getBlog');
    Route::post('blogitem/{blog}/comment', 'FrontendBlogController@storeComment');

    //Route::get('{name?}', 'JoshController@showFrontEndView');
# End of frontend views 
    //Redirect Pages Section
    Route::get('en/offers', function() {
        return redirect('https://thoe.com/offers');
    });
    //End Page Redirect Section
});


Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));
Route::get('en', array('as' => 'home.en', 'uses' => 'HomeController@index'));
Route::get('ar', array('as' => 'home.ar', 'uses' => 'HomeController@index'));

/* Custom */
Route::post('/cache-page', 'CacheController@store');
Route::any('/cache-clear', 'CacheController@index');
//Route::get('/delete-session', 'CacheController@delete_session_views');
Route::post('/save-meta', 'MetaController@save');


/* Newsletter */
Route::post('/subscribe', ['as' => 'newsletter-subscribe', 'uses' => 'LeadController@subscribe']);
Route::get('/confirm/{sid}/{token}', ['as' => 'newsletter-confirm', 'uses' => 'LeadController@confirm']);

Route::get('/Artisan', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
