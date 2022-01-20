<nav class=" navbar navbar-expand-lg mainNav navbar-light bg-light ">


    <div class="logoNav">
        <a class="navbar-brand" href="#">Navbar</a>
    </div>

    <div class="searchNav d-flex">

       @include('layouts.headerCategoriesFilter')

        <div class="search" method="post" >
            <input type="text" class="search_query" name="search_query" placeholder="Search..." autocomplete="off" />
            <ul class="results" >

            </ul>
        </div>

    </div>

    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav ">



                <li class="nav-item dropdown w-100">
                    <a class="nav-link bellNotificationContainer" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="far fa-bell bellNotificationIcon"></i>

                        <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications()->count() }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <span class="dropdown-item dropdown-header">{{ auth()->user()->unreadNotifications()->count() }} Notifications</span>
                        <div class="dropdown-divider"></div>

                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <a class="dropdown-item" href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">
                                <i class="fas fa-envelope mr-2"></i>
                                <h6 class="text-bold text-danger">{{ $notification->data['title'] }}</h6>
                                <p class="text-muted"> {{ $notification->data['body'] }} </p>
                            </a>
                        @empty
                        @endforelse


                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile.show' , auth()->user()) }}" class="dropdown-item dropdown-footer">See All Notifications</a>

                    </div>
                  </li>

                <li class="nav-item active  w-100">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="6" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13" />
                            <path d="M15 6h6m-3 -3v6" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item active  w-100">
                    <a class="nav-link" href="{{ route('wishlist.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stars" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17.8 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                            <path d="M6.2 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                            <path d="M12 9.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="#">

                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                        </svg>
                    </a>
                </li>



            </ul>
        @endauth
    </div>


</nav>
