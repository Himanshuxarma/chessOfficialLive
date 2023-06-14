<?php 
$settings = App\Helpers\Helper::getSettings();?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('adminHome')}}" class="brand-link">
                 @php
                 $logo = !empty($settings) && !empty($settings->back_logo) ? $settings->back_logo : 'Chess Official';
                @endphp
        <img src="/uploads/settings/{{$logo}}" alt="{{$logo}}" width="100%" >
        <span class="brand-text"></span>
    </a>
    <div class="sidebar">
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{url('/admin/dashboard')}}" class="nav-link  @yield('dashboard_select')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/users')}}" class="nav-link @yield('users_select')">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Customer Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/page')}}" class="nav-link @yield('page_select')">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            CMS Pages Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/banners')}}" class="nav-link @yield('banner_select')">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            Banner Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/enquiries')}}" class="nav-link @yield('contact_select')">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            Enquiry Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/course')}}" class="nav-link @yield('course_select')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                         Courses Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/country')}}" class="nav-link @yield('country_select')">
                        <i class="nav-icon fa fa-flag"></i>
                        

                        <p>
                         Country Manager
                        </p>
                    </a>
                </li>

                <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              <i class="nav-icon fab fa-first-order"></i>
              <p>
                Order Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/demo')}}" class="nav-link @yield('demo_select')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demo Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/buycourse')}}" class="nav-link @yield('buycourse_select')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Course</p>
                </a>
              </li>
            </ul>
          </li>
                 <li class="nav-item">
                    <a href="{{url('/admin/testimonial')}}" class="nav-link @yield('testimonial_select')">
                        <i class="nav-icon fa fa-quote-left"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/faqs')}}" class="nav-link @yield('faqs_select')">
                        <i class="nav-icon fa fa-question-circle"></i>
                        <p>
                             FAQ Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/offers')}}" class="nav-link @yield('offers_select')">
                        <i class="nav-icon fa fa-gift"></i>
                        <p>
                             Offer Management
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{url('/admin/setting')}}" class="nav-link @yield('setting_select')">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Site Settings
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
