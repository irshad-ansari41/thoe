<ul id="menu" class="page-sidebar-menu">
    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li <?= (Request::is('admin/setting') || Request::is('admin/setting/header_menu') || Request::is('admin/setting/footer_menu') || Request::is('admin/setting/footer') || Request::is('admin/setting/ordering') || Request::is('admin/setting/fordering') ? 'class="active"' : '') ?>>

        <a href=javascript:void(0);>
            <i class="livicon" data-name="wrench" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">General Settings</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/setting') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Logos
                </a>
            </li>

            <li <?= (Request::is('admin/setting/header_menu') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/header_menu') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Header Menu
                </a>
            </li>
            <li <?= (Request::is('admin/setting/ordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/ordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Header Menu - Ordering
                </a>
            </li>
            <li <?= (Request::is('admin/setting/footer_menu') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/footer_menu') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Footer Menu
                </a>
            </li>
            <li <?= (Request::is('admin/setting/fordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/fordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Footer Menu - Ordering
                </a>
            </li>

            <li <?= (Request::is('admin/setting/footer') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/footer') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Footer Setting
                </a>
            </li>

        </ul>
    </li>

    <li <?= (Request::is('admin/setting/banner_slider') || Request::is('admin/setting/feature_slider') || Request::is('admin/setting/bannerodering') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Home</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/setting/banner_slider') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/banner_slider') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Banner Sliders
                </a>
            </li>

            <li <?= (Request::is('admin/setting/bannerodering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/bannerodering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Banner Sliders - Ordering
                </a>
            </li>
            
            <li <?= (Request::is('admin/invest/*') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/invest/1/edit') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Why Invest
                </a>
            </li>
        </ul>
    </li>

    <li {!! (( Request::is('admin/about') ||  Request::is('admin/about/create')) || Request::is('admin/about/*')  ? 'class="active"' : '') !!}>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">About</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/about') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/about') }}">
                    <i class="fa fa-angle-double-right"></i>
                    About List
                </a>
            </li>
            <li {!! (Request::is('admin/about/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/about/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New About
                </a>
            </li>
        </ul>
    </li>

    
    <li {!! (( Request::is('admin/features') ||  Request::is('admin/feature/create')) || Request::is('admin/feature/*')  ? 'class="active"' : '') !!}>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">Feature</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/feature') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/feature') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Feature List
                </a>
            </li>
            <li {!! (Request::is('admin/feature/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/feature/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Feature
                </a>
            </li>
        </ul>
    </li>




    <li <?= (Request::is('admin/content') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18"
               data-loop="true"></i>
            <span class="title">Static Pages</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/content') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/content') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Contents
                </a>
            </li>
        </ul>
    </li>

    <li <?= (Request::is('admin/properties/projects') || Request::is('admin/properties/amenities') || Request::is('admin/properties/categories') || Request::is('admin/properties/near') || Request::is('admin/properties/list') || Request::is('admin/properties/gallery') || Request::is('admin/setting/projectordering') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="map" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
               data-loop="true"></i>
            <span class="title">Properties</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">

            <li <?= (Request::is('admin/properties/projects') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/projects') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Projects by area
                </a>
            </li>

            <li <?= (Request::is('admin/setting/projectordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/projectordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Projects by area - Ordering
                </a>
            </li>

            <li <?= (Request::is('admin/properties/amenities') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/amenities') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Amenities
                </a>
            </li>

            <li <?= (Request::is('admin/properties/categories') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/categories') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Property Types
                </a>
            </li>

            <li <?= (Request::is('admin/properties/near') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/near') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Near By Places
                </a>
            </li>

            <li <?= (Request::is('admin/properties/list') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/list') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Properties
                </a>
            </li>

            <li <?= (Request::is('admin/properties/gallery') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/gallery') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Property Galleries
                </a>
            </li>
        </ul>
    </li>

    <li <?= (Request::is('admin/properties/units') || Request::is('admin/properties/unitsfloor') || Request::is('admin/properties/unitsfeature') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="doc-portrait" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
               data-loop="true"></i>
            <span class="title">Property Units</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/properties/units') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/units') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Units
                </a>
            </li>

            <li <?= (Request::is('admin/properties/unitsfloor') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/unitsfloor') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Unit Floors
                </a>
            </li>

            <li <?= (Request::is('admin/properties/unitsfeature') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/unitsfeature') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Unit Features
                </a>
            </li>

        </ul>
    </li>

    <li <?= (Request::is('admin/properties/construction') || Request::is('admin/properties/medias') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="shield" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">Construction Updates</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/properties/construction') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/construction') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Construction Updates
                </a>
            </li>

            <li <?= (Request::is('admin/properties/medias') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/properties/medias') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Construction Update Galleries
                </a>
            </li>
        </ul>
    </li>

    <li <?= (Request::is('admin/news') || Request::is('admin/setting/pressordering') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="move" data-c="#ef6f6c" data-hc="#ef6f6c" data-size="18"
               data-loop="true"></i>
            <span class="title">News</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/news') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/presscategory') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Press Category
                </a>
            </li>
            <li <?= (Request::is('admin/news') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/news') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Press Release
                </a>
            </li>
            <li <?= (Request::is('admin/setting/pressordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/pressordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Press Release - Ordering
                </a>
            </li>
        </ul>
    </li>

    <li <?= (Request::is('admin/events') || Request::is('admin/setting/eventordering') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="calendar" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">Events</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/events') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/events') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Events
                </a>
            </li>
            <li <?= (Request::is('admin/setting/eventordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/eventordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Events - Ordering
                </a>
            </li>
        </ul>
    </li>

    <li <?= (Request::is('admin/events/gallery') || Request::is('admin/events/videos') || Request::is('admin/setting/videoordering') || Request::is('admin/setting/imagealbumordering') || Request::is('admin/events/videos') || Request::is('admin/setting/imagethumbordering') ? 'class="active"' : '') ?>>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">Media</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?= (Request::is('admin/events/gallery') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/events/gallery') }}">
                    <i class="fa fa-angle-double-right"></i>
                    <span class="title">Image Galleries</span>

                </a>
            </li>
            <li <?= (Request::is('admin/setting/imagealbumordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/imagealbumordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Image Album Galleries - Ordering
                </a>
            </li>
            <li <?= (Request::is('admin/setting/imagethumbordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/imagethumbordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Image Gallery - Thumbnail images - Ordering
                </a>
            </li>

            <li <?= (Request::is('admin/events/videos') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/events/videos') }}">
                    <i class="fa fa-angle-double-right"></i>
                    <span class="title">Video Galleries</span>

                </a>
            </li>

            <li <?= (Request::is('admin/setting/videoordering') ? 'class="active"' : '') ?>>
                <a href="{{ URL::to('admin/setting/videoordering') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Video Galleries - Ordering
                </a>
            </li>
        </ul>
    </li>

    <!-- Offer -->
    <li <?= (Request::is('admin/offer*') ? 'class="active"' : '') ?>>
        <a href="{{ URL::to('admin/offer') }}">
            <i class="livicon" data-name="mail" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
               data-loop="true"></i>
            <span class="title">Offers</span>
        </a>
    </li>

    <!-- Contact Us -->
    <li <?= (Request::is('admin/contact*') ? 'class="active"' : '') ?>>
        <a href="{{ URL::to('admin/contact/1/edit') }}">
            <i class="livicon" data-name="mail" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
               data-loop="true"></i>
            <span class="title">Contact Page</span>
        </a>
    </li>

    <li <?= (Request::is('admin/meta/list') ? 'class="active"' : '') ?>>
        <a href="{{ URL::to('admin/meta/list') }}">
            <i class="livicon" data-name="seotools" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">SEO Tools</span>
        </a>
    </li>
    <li <?= (Request::is('admin/url-redirect/list') ? 'class="active"' : '') ?>>
        <a href="{{ URL::to('admin/url-redirect/list') }}">
            <i class="livicon" data-name="seotools" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">URL Redirects</span>
        </a>
    </li>

    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
        <a href=javascript:void(0);>
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>

    <!-- Menus generated by CRUD generator -->
    @includeIf('admin/layouts/menu')
</ul>
