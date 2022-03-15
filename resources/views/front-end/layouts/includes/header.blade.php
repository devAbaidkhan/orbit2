<header class="header bg-dark ans-header">
    <nav class="navbar navbar-static-top navbar-expand-lg header-sticky ans-navbar">
        <div class="container-fluid">
            <button onclick="openNav()" id="nav-icon4" type="button" class="navbar-toggler">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div id="ans-mySidenav" class="ans-sidenav nav-d-none-large">
                <div class="ans-sidebar-logo-section">
                    <div class="">
                        <img src="{{asset('images/logo/logo.png')}}" width="150px" alt="aaa" class="ans-sidebar-logo">
                        <span class="ans-sidebar-logo-tagline-name">Hello <b>Hamza Azmat</b></span><br><span class="ans-sidebar-logo-tagline">Have a nice day!</span>
                    </div>
                </div>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    @if(@auth()->user()->hasRole('company'))

                    @endif

                    <li class="nav-item dropdown">
                        @if(auth()->user()->hasRole('company'))
                        <a href="{{route('company.dashboard')}}" class="nav-link">Dashboard</a>
                        <a class="btn btn-white btn-md nav-link" href="{{route('jobs.create')}}">Post a job</a>
                    @endif
                        @if(auth()->user()->hasRole('staff'))
                                <a href="{{route('staff.dashboard')}}" class="nav-link">Dashboard</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}">About Us</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="">Terms & Conditions</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="">Privacy Policy</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="{{url('dashboard/contact-us')}}">Contact Us</a>
                      </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST" id="logout_form">
                            @csrf
                            <button class="dropdown-item" type="submit" id="logout">Logout</button>
                        </form>
                    </li>
                </ul>
                <div class="ans-sidebar-orbit-logo-sec">
                    <img src="images/logo/WorkOrBit-icon.png" class="ans-sidebar-orbit-logo">
                    <p>Help Us to Complete your Profile</p>
                    <a href="#">15% remaining</a>
                </div>
            </div>
            <a href="#" class="ans-header-logo-back">
                <span class="fa fa-arrow-left"></span>
            </a>
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{asset('images/logo/logo.png')}}" alt="logo" width="200px" height="30px;">
            </a>










            <!--/* lad-->
            <div class="navbar-collapse collapse justify-content-end nav-d-none-small">
                <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        @if(@auth()->user()->hasRole('company'))

                        @endif


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="fas fa-chevron-down fa-xs"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item" >
                                <form action="{{route('logout')}}" method="POST" id="logout_form">
                                        @csrf
                                    <button class="dropdown-item" type="submit" id="logout">Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="add-listing">
                @if(auth()->user()->hasRole('company'))
                    <div class="login d-inline-block me-4">
                        <a href="{{route('company.dashboard')}}">Dashboard</a>
                    </div>
                    <a class="btn btn-white btn-md" href="{{route('jobs.create')}}"> <i class="fas fa-plus-circle"></i>Post a job</a>
                @endif
                    @if(auth()->user()->hasRole('staff'))
                        <div class="login d-inline-block me-4">
                            <a href="{{route('staff.dashboard')}}">Dashboard</a>
                        </div>

                    @endif

            </div>
        </div>
    </nav>
</header>
