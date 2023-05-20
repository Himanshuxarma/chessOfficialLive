<?php 
$enquiry = Helper::getEnquiry();
$user = Helper::getUser();
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:voild(0);" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/admin/dashboard')}}" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="javascript:volid(0);" class="nav-link">Contact</a>
      </li> -->
    </ul>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="javascript:voild(0);" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:voild(0);">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{count($enquiry)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach($enquiry->take(2) as $data)
                <a href="javascript:voild(0);" class="dropdown-item">
                    <div class="media">
                        <img src="{{asset('/assets/admin/dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                               {{$data->full_name}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">{{$data->message}}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
               
                <div class="dropdown-divider"></div>
                <a href="javascript:voild(0);" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:voild(0);">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">1 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="javascript:voild(0);" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{count($enquiry)}} new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:voild(0);" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 1
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                
                <div class="dropdown-divider"></div>
                <a href="javascript:voild(0);" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="javascript:voild(0);" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:voild(0);">
                <img class="rounded-circle me-lg-2" src="/uploads/users/{{$user->user_image}}" alt="User Image" style="width: 30px; height: 30px;">

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('userProfile')}}" class="dropdown-item">My Profile</a>
                <a href="{{route('changePassword')}}" class="dropdown-item">Change Password</a>
                <a href="{{route('adminLogout')}}" class="dropdown-item">Log Out</a>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="javascript:voild(0);" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
