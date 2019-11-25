<!-- Main Header / Header Style Two-->
<header class="main-header header-style-two">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">

                <div class="logo-outer">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            
                            <img alt="logo" src="{{asset('assets/images/logo/1512057079483688018.png') }}" 
                            alt="Thoe Developments" title="Azzi Developments" />
                        </a>
                        
                        
                    </div>
                </div>

                <div class="header-upper-right clearfix">

                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" 
                                data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    @if(!empty($Menus)) @foreach($Menus as $menus)
                                    <li class="current {{ $menus->slug }} dropdown">
                                        <a href="{{ $menus->slug }}">{{$menus->title_en}}</a>
                                        <ul>
                                            <?php  
                                                $sql = " SELECT DISTINCT * FROM thoe_live_db.tbl_menu Where parent_id =". $menus->id ." And status = '1' And type = '1' ";
                                                $subMenus = DB::select($sql);
                                            ?>
                                            @if(!empty($subMenus)) @foreach($subMenus as $Submenus)
                                            <li><a href="{{ $Submenus->slug }}">{{$Submenus->title_en}}</a></li>
                                            @endforeach @endif
                                        </ul>
                                    </li>
                                    @endforeach @endif
                                    <li class="current home dropdown"><a href="contact.html">Careers</a></li>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->

                        <!--Social Links-->


                    </div>

                </div>

            </div>
        </div>
    </div>

</header>
<!--End Main Header -->
