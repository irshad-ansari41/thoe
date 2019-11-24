@extends('layouts/default')

@section('title')
About us
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <ul>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Home</a></li>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">News & PR</a></li>
        </ul>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title">The Heart of Europe</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <article class="article article--list article--details">
                                <div class="article__body">
                                    <p><strong>All The Heart of Europe’s hotels, palaces, villas, vessels and underwater living experiences are inspired by iconic European experiences and culture. 4,000+ units tailored for the most refined vacationers and staycationers. With breath-taking entertainment, beaches, pools, snow streets, yacht culture and culinary delights. Along with the perfect climate, breathtaking natural beauty and a wealth of cultural prestige.</strong></p>
                                    <p>
                                        The four-bedroom, two-bathroom home offers 1,978 square feet of living space and a spacious backyard designed for entertaining.
                                        Elegance, sophistication and innovation without equal. A vision that redefines exceptional living. Welcome to The Heart of Europe: the world’s most inspirational luxury destination with sustainability and innovation at its core.
                                    </p><img src="<?=asset('frontend-assets/media-demo/banner/banner-1.jpg')?>" alt="">
                                    <p>Their proximity to so many world-famous attractions would be reason alone to invest. Yet The Floating Seahorse Villas’ true allure is a unique world first – an authentic luxury underwater living experience. Connected to Honeymoon island by floating jetties, the Signature Edition of The Floating Seahorse Villa is designed especially for families with children and groups of friends. Extending over 4,000 square feet across three levels, each will be home to enviable special features, state-of-the-art technology and outdoor climate-controlled areas. But the crowning glory is undoubtedly the underwater level and its wide views onto coral reefs full of beauty and life.</p>
                                    <blockquote>&ldquo;A feat of innovation achieved by a marriage of engineering and imagination; The Floating Seahorse Villas are breathtakingly unique home from which to enjoy the best The Heart of Europe has to offer.&rdquo; Josef Kleindienst.</blockquote>
                                    <p>The ambience will be refined and exclusive, with carefully curated events – including extraordinary Swedish Midsummer, National Day, St Martin’s Day, Walpurgis Eve, Saint Lucia, and crayfish parties. The calendar will also pay homage to the country’s increasingly-popular film, music, and arts scene. And naturally, restaurants will take their lead from Sweden’s exciting cuisine, with delicacies such as sour herring, meatballs, Raggmunkar, toast Skagen, smörgåsbord, mouth-watering crayfish, hot mulled wine, Snaps, and Glὃgg.</p>
                                    <ul>
                                        <li>Main Europe</li>
                                        <li>Sweden</li>
                                        <li>Floating Seahorse</li>
                                        <li>Germany</li>
                                        <li>St. Petersberg</li>
                                        <li>Switzerland</li>
                                        <li>Floating Lido</li>
                                    </ul>
                                    <p>Innovative sustainability features will be embedded in the beautiful design. And the Island’s public spaces will brim with the country’s rich cultural heritage. Traditional carnivals, Christmas markets, Schützenfest, wine festivals, and internationally-acclaimed Oktoberfest will draw crowds from across the Heart of Europe. National and regional cuisines will also star, as expert chefs plate up the finest examples of Eintopf, Bratwurst, and Spätzle; accompanied by vintage Schnaps and Glühwein and the finest German beers and wines.</p>
                                </div>
                                <div class="article__footer">
                                    <div class="social social--article"><span>Share on social:</span><a href="#" class="social__item"><i class="fa fa-facebook"></i></a><a href="#" class="social__item"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- END site-->
            </div>
            <!-- END Site-->
            <!-- BEGIN SIDEBAR-->
            <div class="sidebar">
                <div class="widget js-widget widget--sidebar">
                    <div class="widget__header">
                        <h2 class="widget__title"> </h2>
                        <h5 class="widget__headline"> </h5>
                        <a class="widget__btn js-widget-btn widget__btn--toggle">View More</a>
                    </div>
                    <div class="widget__content">
                        <!-- BEGIN ARTICLE CATEGORIES-->
                        <div class="article-categories">
                            <div class="article-categories__list js-categories-article">
                                <ul>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">About THOE</a></li>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">About The World</a></li>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">About Developer</a></li>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">Chairman's Message</a></li>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">Management Team</a></li>
                                    <li class="article-categories__item"><a href="#" class="article-categories__name">Awards</a></li>
                                </ul>
                            </div>
                            <!-- end of block .article-categories__list-->
                        </div>
                        <!-- END ARTICLE CATEGORIES-->
                    </div>
                </div>
                <!-- END SIDEBAR-->
            </div>
            <!-- END SIDEBAR-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop


@section('footer_scripts')

@stop

