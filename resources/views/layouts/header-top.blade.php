<nav class=" navbar navbar-expand-lg mainNav  ">


    <div class="logoNav">
        <a class="navbar-brand" href="{{ route('home') }}">eBid</a>
    </div>

    <div class="searchNav d-flex">

       @include('layouts.headerCategoriesFilter')

        <div class="search" method="post" >
            <input type="text" class="search_query" name="search_query" placeholder="Search..." autocomplete="off" />
            <ul class="results" >

            </ul>
        </div>

    </div>

    <button class="navbar-toggler  border-dark"   type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars "></i>
        </span>
    </button>

    <div class=" collapse navbar-collapse " id="navbarSupportedContent">
        @auth
            <ul class="navbar-nav ">



                <li class="nav-item dropdown w-100">
                    <a class="nav-link bellNotificationContainer" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="far fa-bell bellNotificationIcon"></i>

                        <span class="badge badge-warning navbar-badge"id="notificationCount">{{ auth()->user()->unreadNotifications()->count() }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; width:350px" >
                        <span class="dropdown-item dropdown-header" >{{ auth()->user()->unreadNotifications()->count() }} Notifications</span>
                        <div class="dropdown-divider"></div>

                        <div id="notificationList">
                            @forelse (auth()->user()->unreadNotifications as $notification)
                                <a class="dropdown-item" href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">

                                    <div class="row">
                                        <div class="col-2 px-1">
                                            <img src="{{ $notification->data['image'] }}" class="rounded-circle w-100" alt="">
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-bold text-danger">{{ $notification->data['title'] }}</h6>
                                            <p class="text-muted" style="font-size:0.8rem;white-space: nowrap; overflow: hidden; text-overflow: ellipsis !important ;"> {{ $notification->data['body'] }} </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                            @endforelse
                        </div>


                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile.show' , auth()->user()) }}" class="dropdown-item dropdown-footer">See All Notifications</a>

                    </div>
                </li>


                <li class="nav-item active  w-100">


                    <a class="nav-link wishlistIconContainer" href="{{ route('wishlist.index') }}" >
                        <i class="far fa-star wishlistIcon"></i>
                        <span class="badge badge-warning  wishlistIconCount">{{ Auth::user()->wishlist->products()->count() }}</span>
                    </a>

                </li>

                <li class="nav-item w-100">

                    <a class=" nav-link" >

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" style="background: none;
                                                        color: inherit;
                                                        border: none;">
                                <i class="fas fa-sign-out-alt logoutIcon"></i>
                            </button>

                        </form>
                    </a>

                </li>



            </ul>
        @endauth
        @guest

            <ul class="navbar-nav ">


                <li class="nav-item w-100 registerBtnContainer ">

                    <a class=" nav-link " href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt "></i>
                    </a>

                </li>


                <li class="nav-item w-100 ">

                    <a class=" nav-link registerBtnContainer"  href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i>
                    </a>

                </li>



            </ul>
        @endguest

    </div>


</nav>
