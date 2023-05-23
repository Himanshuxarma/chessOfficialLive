<header class="noFixMenu menu_right without_user_menu">
    <div class="topWrapFixed"></div>
    <div class="topWrap">
        <div class="mainmenu_area">
            <div class="main with_logo_left">
                <div class="logo logo_left">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/front/images/185x33.png')}}" class="logo_main" alt="">
                        <img src="{{asset('assets/front/images/185x33.png')}}" class="logo_fixed" alt="">
                        <span class="logo_slogan"></span>
                    </a>
                </div>
                <div class="search" title="Open/close search form">
                    <div class="searchForm">
                        <form method="get" class="search-form" action="javascript:void();">
                            <button type="submit" class="searchSubmit" title="Start search">
                                <span class="icoSearch"></span>
                            </button>
                            <input type="text" class="searchField" placeholder="Search &hellip;" value="" name="s"
                                title="Search for:" />
                        </form>
                    </div>
                    <div class="ajaxSearchResults"></div>
                </div>
                <a href="javascript:void();" class="openResponsiveMenu">Menu</a>
                <nav role="navigation" class="menuTopWrap d-flex align-items-center topMenuStyleLine">
                    <ul id="mainmenu" class="">
                        <li
                            class="{{Request::path() =='/' ? 'current-menu-ancestor' : ''}} menu-item  menu-item-has-children">
                            <a href="{{url('/')}}">Home</a>
                        </li>

                        <li
                            class="{{Request::path() == 'course' ? 'current-menu-ancestor' : '' }} menu-item menu-item-has-children">
                            <a title="Layouts and hovers" href="{{route('courseList')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                Courses
                            </a>

                        </li>
                        <li
                            class="{{Request::path() =='faqs' ? 'current-menu-ancestor' : ''}} menu-item menu-item-has-children">
                            <a title="Layouts and hovers" href="{{route('faqsDeatail')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                Faq
                            </a>

                        </li>
                        <li
                            class="{{Request::path()== 'pages/about-us' ? 'current-menu-ancestor' : ''}} menu-item menu-item-has-children">
                            <a title="Layouts and hovers" href="{{route('about.us')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                About-Us
                            </a>

                        </li>

                    </ul>
					<div class="country-wrap">
						<div class="selected-country"><img alt="" src="assets/front/image/countries/ind.png">India</div>
						<div class="country-listing">
							<ul>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
								<li><img alt="" src="assets/front/image/countries/ind.png">India</li>
							</ul>
						</div>
				</div>
                </nav>

				

            </div>
		
        </div>
    </div>
</header>
