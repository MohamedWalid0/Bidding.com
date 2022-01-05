



    <!-- go to top button-->
    <div class="goToTop">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!-- end go to top button-->



    <!-- loading spinner-->

    <section id="loading">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
          </div>
    </section>

    <!-- end loading spinner-->




    <header id="header" class="header-3 sticky-menu mb-5 pb-5">


        <nav class=" navbar navbar-expand-lg mainNav navbar-light bg-light ">


            <div class="logoNav">
                <a class="navbar-brand" href="#">Navbar</a>
            </div>

            <div class="searchNav pb-2">

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
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" />
                                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" />

                                </svg>

                            </button>
                            <span class="bg-danger rounded-circle w-25  position-absolute text-center" id="notificationCount">{{ auth()->user()->unreadNotifications()->count() }}</span>
                            <div class="dropdown-menu mr-3" id="notificationList">
                                @forelse (auth()->user()->unreadNotifications as $notification)
                                    <a class="dropdown-item" href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">
                                        <h6 class="text-bold text-danger">{{ $notification->data['title'] }}</h6>
                                        <p class="text-muted"> {{ $notification->data['body'] }} </p>
                                    </a>
                                @empty
                                    <a class="dropdown-item" href="#">Notifications</a>
                                @endforelse
                            </div>
                        </div>



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
















    </header>



