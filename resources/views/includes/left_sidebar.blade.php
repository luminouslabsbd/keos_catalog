<div class="leftside-menu">
        <a href="{{route("home")}}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm.png" alt="" height="50">
            </span>
        </a>
        <a href="{{route('home')}}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo-dark.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm_dark.png" alt="" height="50">
            </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar="">
            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="{{route("home")}}" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Dashbaord </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route("modifyDocx")}}" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Modify Docx </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

</div>
