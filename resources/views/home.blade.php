@extends('layouts.layout')

@section('title')
    Home
@endsection


@section('content')


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




    <header>

        <nav class=" navbar navbar-expand-lg mainNav navbar-light bg-light ">


            <div class="logoNav">
                <a class="navbar-brand" href="#">Navbar</a>
            </div>

            <div class="searchNav pb-2">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>

            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
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
                            <a class="nav-link" href="#">
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
            </div>


        </nav>

    </header>



    <section class="slider">

        <!-- Swiper slider -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slideContiner">
                        <div class="slideImageContiner">
                            <img src="{{ asset('img/home/slideshow-2.jpg') }}" alt="">
                        </div>
                        <div class="slideContentContiner">
                            <div class="slideContentOverlay">
                                <div class="slideContentContainer p-4">

                                    <h2>IBID De7k</h2>
                                    <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident</p>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Buy</button>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Details</button>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- end Swiper slider -->


    </section>


    <!-- slider categories overlay -->
    <section class="sliderOverlayContainer">
        <div class="sliderCategories pb-5 container">
            <div class="row">

                <div class="col-md-3 col-sm-6 px-0">
                    <div class="sliderCategoryImageContainer">
                        <img src="{{ asset('img/home/project-1.jpg ')}}" class="w-100" alt="">
                        <div class="categoryTitle py-4">
                            <p>New Arrivals</p>
                            <h5>Fashion</h5>
                            <div class="categoryTitleOverlay ">
                                <div >
                                    <p >Explore popular devices</p>
                                </div>
                                <div >
                                    <button class="btn btn-outline-light rounded-0">
                                        Shop Now
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 px-0">
                    <div class="sliderCategoryImageContainer">
                        <img src="{{ asset('img/home/project-8.jpg ')}}" class="w-100" alt="">
                        <div class="categoryTitle py-4">
                            <p>New Arrivals</p>
                            <h5>Fashion</h5>
                            <div class="categoryTitleOverlay ">
                                <div >
                                    <p >Explore popular devices</p>
                                </div>
                                <div >
                                    <button class="btn btn-outline-light rounded-0">
                                        Shop Now
                                    </button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 px-0">
                    <div class="sliderCategoryImageContainer">
                        <img src="{{ asset('img/home/project-7.jpg ')}}" class="w-100" alt="">
                        <div class="categoryTitle py-4">
                            <p>New Arrivals</p>
                            <h5>Fashion</h5>
                            <div class="categoryTitleOverlay ">
                                <div >
                                    <p >Explore popular devices</p>
                                </div>
                                <div >
                                    <button class="btn btn-outline-light rounded-0">
                                        Shop Now
                                    </button>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 px-0">
                    <div class="sliderCategoryImageContainer">
                        <img src="{{ asset('img/home/project-1.jpg ')}}" class="w-100" alt="">
                        <div class="categoryTitle py-4">
                            <p>New Arrivals</p>
                            <h5>Fashion</h5>
                            <div class="categoryTitleOverlay ">
                                <div >
                                    <p >Explore popular devices</p>
                                </div>
                                <div >
                                    <button class="btn btn-outline-light rounded-0">
                                        Shop Now
                                    </button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!--end  slider categories overlay -->



    <section class="latestActions">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Shop By Brand
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>



        <div class="latestActionsCategories">

            <div class="row ">

                <div class="col-md-6 px-0 wow fadeInLeft " data-wow-duration="2s">
                    <div class="category latestActionsCategoryOne my-2 mx-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Bullets Wireless </h3>
                            <p class="categoryCount">20 product</p>
                            <button class="viewMore my-4"> View More </button>
                        </div>
                    </div>
                    <div class="category latestActionsCategoryTwo my-2 mx-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Drones </h3>
                            <p class="categoryCount">20 product</p>
                            <button class="viewMore my-4"> View More </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 px-0 wow fadeInRight  " data-wow-duration="2s">
                    <div class="category latestActionsCategoryThree my-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Headphones </h3>
                            <p class="categoryCount">20 product</p>
                            <button class="viewMore my-4"> View More </button>
                        </div>
                    </div>
                    <div class="category latestActionsCategoryFour my-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Charger Wireless </h3>
                            <p class="categoryCount">20 product</p>
                            <button class="viewMore my-4"> View More </button>
                        </div>
                    </div>
                </div>

            </div>



        </div>



    </section>



    <!-- static categories -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Shop By Brand
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer">
            <div class="row mx-0 ">
                <div class="col-lg-3 col-sm-6  wow fadeInLeft" data-wow-duration="3s">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>


                <div class="col-lg-3 col-sm-6  wow fadeInLeft" data-wow-duration="1s">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="1s">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                    class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>


                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="3s">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- end static categories -->



    <!-- end recommended products -->

    <section class="my-5">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Shop By Brand
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>




        <div class="recommendedSection ">

            <div class="row px-0 mx-0 ">

                <div class="col-md-12 row py-4 px-0 mx-0">

                    <div class="col-md-3 col-sm-12  ">

                        <div class="sideCategory   text-center d-flex justify-content-center align-items-center">
                            <div class="py-4" >
                                <h3 >Hahah</h3>
                                <p> 8 products</p>
                                <button class="viewMore   my-4"> View More </button>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-9 col-sm-12 row m-0 ">

                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>








                    </div>


                </div>




            </div>




            <div class="row px-0 mx-0 ">

                <div class="col-md-12 row py-4 px-0 mx-0">

                    <div class="col-md-3 col-sm-12  ">

                        <div class="sideCategory   text-center d-flex justify-content-center align-items-center">
                            <div class="py-4" >
                                <h3 >Hahah</h3>
                                <p> 8 products</p>
                                <button class="viewMore   my-4"> View More </button>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-9 col-sm-12 row m-0 ">

                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-6 col-sm-6 d-flex  ">

                            <div class="productItemDetails p-4 m-1  row ">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100" alt="">
                                </div>
                                <div class="col-lg-8 col-md-12 mt-3">
                                    <h5>Galaxy s10+ Dual SIM</h5>
                                    <p class="my-2">Current bid : 100$</p>
                                    <div class="d-flex">
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-gavel"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="iconContainer mr-3 px-2 rounded-circle ">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>








                    </div>


                </div>




            </div>

        </div>




    </section>

    <!-- end recommended products -->











    <section class="my-5">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Categories
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>



        <div class=" owl-carousel owl-theme my-5">


            <div class="text-center">
                <div class=" p-3 ">
                    <img src="{{ asset('img/home/client-6.png') }}" class="rounded-circle " alt="">
                    <h4 class="my-3 text-dark ">Tablets</h4>
                </div>
            </div>

            <div class="text-center">
                <div class=" p-3 ">
                    <img src="{{ asset('img/home/client-4.png') }}" class="rounded-circle " alt="">
                    <h4 class="my-3 text-dark ">Phones</h4>
                </div>
            </div>

            <div class="text-center">
                <div class=" p-3 ">
                    <img src="{{ asset('img/home/client-1.png') }}" class=" rounded-circle " alt="">
                    <h4 class="my-3 text-dark ">Laptops</h4>
                </div>
            </div>

            <div class="text-center">
                <div class=" p-3 ">
                    <img src="{{ asset('img/home/client-9.png') }}" class=" rounded-circle " alt="">
                    <h4 class="my-3 text-dark ">Clothes</h4>
                </div>
            </div>

            <div class="text-center">
                <div class=" p-3 ">
                    <img src="{{ asset('img/home/client-1.png') }}" class=" rounded-circle " alt="">
                    <h4 class="my-3 text-dark ">shoes</h4>
                </div>
            </div>

        </div>



    </section>












    <!-- latest products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Latest Products
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer pb-5">
            <div class="mx-0 tesssst owl-carousel owl-theme">


                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                    class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>


                <div class=" p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- end latest products -->




    <!-- hot products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Hot Products
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer pb-5">
            <div class="mx-0 tesssst owl-carousel owl-theme">


                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                    class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

                <div class="p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>


                <div class=" p-2">

                    <div class="productsWrapper my-3">


                        <div class="productContainer pb-2">
                            <div class="productImageContainer">
                                <img src="{{ asset('img/home/mobile.jpg ')}}"
                                    onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                    onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                class="w-100" alt="">
                            </div>

                            <div class="productOptions ">

                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <div class="productBidTimer">

                                <div class="d-flex  text-center w-100 p-2">
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Days</p>
                                    </div>
                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Hours</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem rightBorder">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Minutes</p>
                                    </div>

                                    <div class="col-3 px-0 counterItem">
                                        <h6  class="text-primary my-0 pt-1">70</h6>
                                        <p class="text-muted">Seconds</p>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <footer class="productDetails text-center pb-2 pt-4">
                            <h5>Smartphone Earbuds</h5>
                            <p class="text-muted">
                                Current Bid :
                                <span class="text-primary"> 15,125.00$ </span>
                            </p>

                        </footer>

                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- end hot products -->








@endsection














