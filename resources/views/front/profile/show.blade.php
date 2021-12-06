<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
          crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}"/>
    @livewireStyles
    <title>eBid</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mr-auto navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="my-2 form-inline my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="my-2 btn btn-outline-success my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<section class="mt-5">

    <div class="container">
        <div class="row">
        @include('front.profile.includes._asside')
        <!-- start right side -->
            <div class="col-lg-8 ">

                <div class="mb-3 row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="p-4 text-center bg-white rounded-lg shadow">
                                <i class="fas fa-trophy text-muted icon-style"></i>
                                <h1 class="mt-2">86</h1>
                                <h3 class="text-muted">Items Won</h3>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="p-4 text-center bg-white rounded-lg shadow">
                                <i class="fas fa-gavel text-warning icon-style"></i>
                                <h1 class="mt-2">86</h1>
                                <h3 class="text-warning">Active Bids</h3>


                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="p-4 text-center bg-white rounded-lg shadow">
                                <i class="fas fa-star text-danger icon-style"></i>
                                <h1 class="mt-2">86</h1>
                                <h3 class="text-danger">Favorites</h3>


                            </div>
                        </div>
                    </div>

                </div>

                <!-- start Dashboard Link -->
                <div class="page" id="dashboard">
                    <div class="bg-white rounded-lg shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4>Purchasing</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <!-- end Dashboard Link -->


                <!-- start Personal Data Link -->
                <div class="page" id="PersonalData">
                    <div class="bg-white rounded-lg shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4>Personal Data</h4>

                                <p>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal">
                                        <i class="far fa-edit" style="cursor: pointer;"></i>
                                        <span class="text-muted">Edit</span>
                                    </a>

                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted">Name <span style="margin-left: 100px;">:</span></p>
                                </div>
                                <div class="col-8">
                                    <p class="font-weight-bold" style="margin-left: -75px;">{{$account->full_name}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted">Location <span style="margin-left: 84px;">:</span></p>
                                </div>
                                <div class="col-8">
                                    <p class="font-weight-bold" style="margin-left: -75px;"> {{$account->address}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted">Phone <span style="margin-left: 100px;">:</span></p>
                                </div>
                                <div class="col-8">
                                    <p class="font-weight-bold" style="margin-left: -75px;">
                                         (+20){{$account->phone}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted">Email <span style="margin-left: 108px;">:</span></p>
                                </div>
                                <div class="col-8">
                                    <p class="font-weight-bold" style="margin-left: -75px;">
                                    {{$user->email}} </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end Personal Data Link -->


                <!-- start My Bids Link -->
                <div class="page" id="MyBids">
                    <div class="bg-white rounded-lg shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4>My Bids</h4>

                                <p>
                                    <i class="far fa-edit" style="cursor: pointer;"></i>
                                    <span class="text-muted">Edit</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end My Bids Link -->

                <!-- start Notification Link -->
                <div class="page" id="Notification">
                    <div class="mb-2 bg-white rounded-lg shadow">
                        <div class="card-body">
                            <p class=" card-text"><i class="fas fa-bell text-success fa-lg"></i>
                                <span class="ml-2"> With supporting text below as a natural lead-in to additional content.</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-2 bg-white rounded-lg shadow">
                        <div class="card-body">
                            <p class=" card-text"><i class="fas fa-bell text-success fa-lg"></i>
                                <span class="ml-2"> With supporting text below as a natural lead-in to additional content.</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-2 bg-white rounded-lg shadow">
                        <div class="card-body">
                            <p class=" card-text"><i class="fas fa-bell text-success fa-lg"></i>
                                <span class="ml-2"> With supporting text below as a natural lead-in to additional content.</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-2 bg-white rounded-lg shadow">
                        <div class="card-body">
                            <p class=" card-text"><i class="fas fa-bell text-success fa-lg"></i>
                                <span class="ml-2"> With supporting text below as a natural lead-in to additional content.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end Notification Link -->


            </div>
            <!-- end right side -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:update-profile >

                </div>
                </div>
            </div>
        </div>


    <!-- Modal For Edit profile Photo -->
    <div class="modal fade" id="editPhoto" tabindex="-1" aria-labelledby="editPhoto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Edit Photo </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">

                            <label class="text-center custom-file-upload">
                                <input type="file"/>
                                <i class="fas fa-camera"></i>
                            </label>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</section>


<script src="https://ninja-bag.site/fhost/d-mode.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
@livewireScripts
{{-- <script src="{{asset('js/home/jquery-3.5.1.min.js')}}"></script> --}}
<script >
    $(document).ready(function(){
            window.livewire.on('ProfileUpdated',()=>{

                setTimeout(function(){ $(".alert-success").fadeOut('fast');
                }, 3000); // 3 secs
            });

    });

</script>
</body>

</html>
