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
    Route::get('/careers-at-azizi', ['as' => 'careers-at-azizi', 'uses' => 'PageController@careersAtAzizi']);
    Route::any('/media-center', ['as' => 'mediacenter', 'uses' => 'PageController@mediacenter']);

    Route::any('/search', ['as' => 'search', 'uses' => 'SearchController@index']);

    Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@about_thoe']);
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
    Route::post('/contact-send', ['as' => 'contact.send', 'uses' => 'ContactController@sendContact']);

    Route::get('/events', ['as' => 'events.index', 'uses' => 'EventController@index']);
    Route::get('/events/{slug}', ['as' => 'events.details', 'uses' => 'EventController@details']);

    Route::get('/csu', ['as' => 'csu.index', 'uses' => 'ConstructionEmailerController@index']);
    Route::post('/csu', ['as' => 'csu.csusend', 'uses' => 'ConstructionEmailerController@csusend']);

    Route::get('/csu-emailer', ['as' => 'csu.csu-emailer', 'uses' => 'ConstructionEmailerController@frm_csu_emailer']);
    Route::post('/csu-emailer', ['as' => 'csu.send-emailer', 'uses' => 'ConstructionEmailerController@send_csu_emailer']);
    Route::get('/csu-emailer-clients/{id}', ['as' => 'csu.csu-emailer-clients', 'uses' => 'ConstructionEmailerController@send_csu_emailer_bulk']);
    //Constrction Emailer 
    Route::any('/news-pr', ['as' => 'news-pr.index', 'uses' => 'NewsPRController@index']);
    Route::get('/news-pr/{slug}', ['as' => 'news-pr.details', 'uses' => 'NewsPRController@details']);
    Route::get('/media-gallery', ['as' => 'media-gallery.index', 'uses' => 'MediaGalleryController@index']);
    Route::get('/image-gallery', ['as' => 'image-gallery.index', 'uses' => 'MediaGalleryController@image_gallery']);
    Route::get('/image-gallery/{gallery}', ['as' => 'image-gallery.index', 'uses' => 'MediaGalleryController@view_image']);
    Route::get('/video-gallery', ['as' => 'video-gallery.index', 'uses' => 'MediaGalleryController@video_gallery']);
    Route::get('/video-gallery/{gallery}', ['as' => 'video-gallery.index', 'uses' => 'MediaGalleryController@view_video']);
    Route::any('/interviews', ['as' => 'interviews.index', 'uses' => 'InterviewsController@index']);

    Route::get('/survey', ['as' => 'survey.index', 'uses' => 'SurveyController@index']);
    Route::post('/survey', ['as' => 'survey.store', 'uses' => 'SurveyController@store']);
    Route::any('/survey-report', ['as' => 'survey.report', 'uses' => 'SurveyController@report']);

    Route::get('/quick-survey-lp', ['as' => 'quick-survey.lp', 'uses' => 'QuickSurveyController@indexlp']);
    Route::get('/quick-survey', ['as' => 'quick-survey.index', 'uses' => 'QuickSurveyController@index']);
    Route::get('/quick-survey', ['as' => 'quick-survey.index', 'uses' => 'QuickSurveyController@index']);
    Route::post('/quick-survey', ['as' => 'quick-survey.store', 'uses' => 'QuickSurveyController@store']);
    Route::any('/quick-survey-report', ['as' => 'quick-survey.report', 'uses' => 'QuickSurveyController@report']);

    Route::get('/online-payments', ['as' => 'payment.index', 'uses' => 'PaymentController@index']);
    Route::post('/online-payments', ['as' => 'payment.confirmation', 'uses' => 'PaymentController@confirmation']);
    Route::any('/online-payments/response', ['as' => 'payment.response', 'uses' => 'PaymentController@response']);
    Route::any('/online-payments/cancel', ['as' => 'payment.cancel', 'uses' => 'PaymentController@cancel']);

    Route::get('/online-payment-payfort', ['as' => 'payment-payfort.index', 'uses' => 'PaymentControllerPayFort@index']);
    Route::post('/online-payment-payfort', ['as' => 'payment-payfort.confirmation', 'uses' => 'PaymentControllerPayFort@confirmation']);
    Route::post('/online-payment-payfort/send', ['as' => 'payment-payfort.send', 'uses' => 'PaymentControllerPayFort@send_PayFort_Gateway']);
    Route::any('/online-payment-payfort/response', ['as' => 'payment-payfort.response', 'uses' => 'PaymentControllerPayFort@response']);
    Route::any('/online-payment-payfort/cancel', ['as' => 'payment-payfort.cancel', 'uses' => 'PaymentControllerPayFort@cancel']);

    Route::get('/construction-updates', ['as' => 'construction.updates', 'uses' => 'ConstructionController@index']);
    //Route::get('/construction-updates', ['as' => 'community.updates', 'uses' => 'ConstructionController@community']);
    Route::get('/construction-updates/{projects}', ['as' => 'community-area.updates', 'uses' => 'ConstructionController@properties']);
    Route::get('/construction-updates/{projects}/{property}', ['as' => 'community-area.updates', 'uses' => 'ConstructionController@property']);
    Route::post('/constructiondownload', ['as' => 'constructiondownload', 'uses' => 'ConstructionController@constructiondownload']);

    Route::get('/dubai', ['as' => 'azizi.properties', 'uses' => 'PropertyController@index']);
    Route::get('/dubai/meydan', ['as' => 'community.properties', 'uses' => 'PropertyController@community']);
    Route::get('/dubai/meydan/{projects}', ['as' => 'community-area.properties', 'uses' => 'PropertyController@projects']);
    Route::get('/dubai/meydan/{projects}/{property}', ['as' => 'community-area.properties', 'uses' => 'PropertyController@property']);
    Route::get('/dubai/{area}', ['as' => 'area.properties', 'uses' => 'PropertyController@projects']);

    /* End Landing Pages */
    Route::get('/lp/dubai/meydan/{projects}/{property}', ['as' => 'community-area.properties', 'uses' => 'PropertyController@lp_property']);
    Route::get('/lp/dubai/{area}/{property}', ['as' => 'meydan.properties', 'uses' => 'PropertyController@lp_property']);
    /* End Landing Pages */


    Route::get('/dubai/{area}/{property}', ['as' => 'meydan.properties', 'uses' => 'PropertyController@property']);
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
    Route::get('/demomenu', ['as' => 'demomenu', 'uses' => 'DemoController@index']);
    Route::get('/form-referral', ['as' => 'form-referral.index', 'uses' => 'FormReferralController@index']);
    Route::post('/form-referral', ['as' => 'form-referral.send', 'uses' => 'FormReferralController@send']);
    Route::get('/ips-form', ['as' => 'ips.index', 'uses' => 'IPSController@index']);
    Route::post('/ips-send', ['as' => 'ips.send', 'uses' => 'IPSController@send']);
    Route::get('/ips-thank-you', ['as' => 'ips.thankyou', 'uses' => 'IPSController@ips_thankyou']);
    Route::get('/ips-lists', ['as' => 'ips.lists', 'uses' => 'IPSController@ipslists']);
    Route::get('/send-emailer', ['as' => 'ips.sendEmailer', 'uses' => 'IPSController@sendEmailer']);

    Route::get('/cityscape-abudhabi', ['as' => 'cityscape.index', 'uses' => 'CityScapeController@index']);
    Route::post('/cityscape-send', ['as' => 'cityscape.send', 'uses' => 'CityScapeController@send']);
    Route::get('/cityscape-thank-you', ['as' => 'cityscape.thank-you', 'uses' => 'CityScapeController@thankyou']);

//Offers
    //Route::get('/offers', ['as' => 'cityscape.offers', 'uses' => 'OfferController@index']);
    //Route::get('/offers/cityscape-abudhabi', ['as' => 'cityscape.citiscape', 'uses' => 'OfferController@cityscape_abudhabi']);
    //Route::get('/offers/ips', ['as' => 'cityscape.ips', 'uses' => 'OfferController@ips']);
    //Route::get('/uk-offers', ['as' => 'cityscape.ukoffers', 'uses' => 'OfferController@uk_event']);
    //Route::get('/diamond-week-offers', ['as' => 'cityscape.diamond-week-offers', 'uses' => 'OfferController@Diamond_Week']);
    //Route::get('/adha-offers', ['as' => 'cityscape.adha-offers', 'uses' => 'OfferController@Adha_Offers']);
    Route::get('/offers-weeks', ['as' => 'cityscape.offers-week', 'uses' => 'OfferController@offers_Week']);
    Route::get('/launching-berton-by-azizi', ['as' => 'cityscape.berton-offers', 'uses' => 'OfferController@Berton_offers']);
    Route::get('/creek-views', ['as' => 'cityscape.creek-views', 'uses' => 'OfferController@Creek_Views']);


    //Route::get('/devs', ['as' => 'devs', 'uses' => 'TestController@index']);
    Route::get('/devs', ['as' => 'devs', 'uses' => 'TestController@mtest']);
    //Route::get('/home-one', ['as' => 'HomeOne', 'uses' => 'TestController@home_one']);
    //Route::get('/home-two', ['as' => 'HomeTwo', 'uses' => 'TestController@home_two']);
    //Route::get('/home-three', ['as' => 'HomeThree', 'uses' => 'TestController@home_three']);
    //Route::get('/home-four', ['as' => 'HomeFour', 'uses' => 'TestController@home_four']);
    //Route::get('/mobile-one', ['as' => 'MobileOne', 'uses' => 'TestController@mobile_one']);
    Route::get('/mobile-two', ['as' => 'MobileTwo', 'uses' => 'TestController@mobile_two']);


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
        return redirect('https://azizidevelopments.com/offers');
    });
    //End Page Redirect Section
});


Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));
Route::get('en', array('as' => 'home.en', 'uses' => 'HomeController@index'));
Route::get('ar', array('as' => 'home.ar', 'uses' => 'HomeController@index'));
Route::get('cn', array('as' => 'home.cn', 'uses' => 'HomeController@index'));


/* Custom */
Route::post('/cache-page', 'CacheController@store');
Route::any('/cache-clear', 'CacheController@index');
//Route::get('/delete-session', 'CacheController@delete_session_views');
Route::post('/save-meta', 'MetaController@save');

/* End Landing Pages */
Route::get('lp/diamond-week-offers', ['as' => 'cityscape.lp-diamond-week-offers', 'uses' => 'OfferController@Lp_Diamond_Week']);
Route::get('lp/adha-offers', ['as' => 'cityscape.lp-adha-offers', 'uses' => 'OfferController@Lp_Adha']);
/* End Landing Pages */

/* Lead */

Route::any('/save-lead-wdoors', ['as' => 'save-lead-wdoors', 'uses' => 'OtherLeadController@save_lead_wdoors']);
Route::any('/save-lead', ['as' => 'save-lead', 'uses' => 'LeadController@save_lead']);
Route::any('/save-lead-salesforace', ['as' => 'save-lead-salesforace', 'uses' => 'LeadController@save_lead_salesforace']);
Route::any('/push-lead', ['as' => 'push-lead', 'uses' => 'LeadController@push_lead']);
Route::any('/push-lead/import', ['as' => 'push-lead-import', 'uses' => 'LeadController@import_leads']);
Route::post('/subscribe', ['as' => 'newsletter-subscribe', 'uses' => 'LeadController@subscribe']);
Route::get('/confirm/{sid}/{token}', ['as' => 'newsletter-confirm', 'uses' => 'LeadController@confirm']);
//Route::get('/sent-emails', ['as' => 'sent-emails', 'uses' => 'LeadController@sendmail']);
//Route::get('/sent-emails/{propertyslug}', ['as' => 'view-emails', 'uses' => 'LeadController@Thankyou_preview']);
Route::get('/sent-emails/{propertyslug}/{fullname}/{email}', ['as' => 'view-emails', 'uses' => 'LeadController@Thankyou_preview']);
Route::get('/sent-emails/{fullname}/{email}', ['as' => 'view-emails', 'uses' => 'LeadController@Thankyou_preview']);
//Route::get('import-SF-leads',['as' => 'import-SF-leads', 'uses' => 'LeadController@import_SF_leads']);

Route::get('/Artisan', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
