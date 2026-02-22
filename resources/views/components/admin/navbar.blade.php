<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('/admin/')}}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/admin/')}}/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('/admin/')}}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/admin/')}}/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link text-capitalize" href="#sidebarNews" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNews">
                        <i class="mdi mdi-newspaper"></i> <span data-key="t-news">News</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNews">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link text-capitalize" data-key="t-news-list"> News List </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-news-categories"> News Categories </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-news-comments"> News Comments </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-news-tags"> News Tags </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link text-capitalize" href="#sidebarBlogs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBlogs">
                        <i class="mdi mdi-file"></i> <span data-key="t-blogs">Blogs</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBlogs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link text-capitalize" data-key="t-blog-list"> Blog List </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-blog-categories"> Blog Categories </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-blog-comments"> Blog Comments </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-blog-tags"> Blog Tags </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link text-capitalize" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUsers">
                        <i class="mdi mdi-face-man"></i> <span data-key="t-users">Users</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link text-capitalize" data-key="t-members"> Members </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link text-capitalize" data-key="t-admins"> Admins </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="menu-title"><span data-key="t-site-configuration">Site Configuration</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link text-capitalize" href="widgets.html">
                        <i class="mdi mdi-web-sync"></i> <span data-key="t-web-sync">Website settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>