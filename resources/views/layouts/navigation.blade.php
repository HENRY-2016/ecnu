
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
    <div class="logo d-flex align-items-center">
        <span class="d-none d-lg-block title-name">{{trans_choice('general.appName',0)}}</span>
    </div>
    <a href="{{url('/components/dashboard')}}"><i class="bi bi-list toggle-sidebar-btn"></i></a>
</div><!-- End Logo -->


<nav class="header-nav ms-auto" >
    <ul class="d-flex align-items-center">


    <li class="nav-item dropdown">

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Category 1</span>
            </a><!-- End Profile Iamge Icon -->
    
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org1',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org1',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org2',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org2',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org3',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org3',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org4',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org4',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org5',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org5',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org6',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org6',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
            </ul><!-- End Home Dropdown Items -->
        </li><!-- End Home Nav -->
        

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Category 2</span>
            </a><!-- End Profile Iamge Icon -->
    
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org7',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org7',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org8',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org8',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org9',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org9',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org10',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org10',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org11',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org11',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org12',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org12',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
            </ul><!-- End Home Dropdown Items -->
        </li><!-- End Home Nav -->
        

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Category 3</span>
            </a><!-- End Profile Iamge Icon -->
    
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org13',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org13',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org14',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org14',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('components/orgs/view',['organization'=>trans_choice('general.org15',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org15',1)}}</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org16',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org16',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org17',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org17',1)}}</span>
                    </a>
                </li>
                
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{url('components/orgs/view',['organization'=>trans_choice('general.org18',1)])}}">
                    <i class="bi bi-forward"></i>
                    <span>{{trans_choice('general.org18',1)}}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
            </ul><!-- End Home Dropdown Items -->
        </li><!-- End Home Nav -->
        

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Stock</span>
            </a><!-- End Profile Iamge Icon -->
    
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center " href="{{route('asset.index')}}">
                    <i class="bi bi-forward"></i>
                    <span>Assets</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{route('supplier.index')}}">
                    <i class="bi bi-forward"></i>
                    <span>Suppliers</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>
            </ul><!-- End Home Dropdown Items -->
        </li><!-- End Home Nav -->

    <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{asset('assets/img/male.png')}}" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::User()->name}}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <span>Logged In As</span>
            <h6>{{Auth::User()->FName}} {{Auth::User()->name}}</h6>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item d-flex align-items-center" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    {{ __('Log Out') }}
                </a>
            
            </form>
        </li>

        </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
