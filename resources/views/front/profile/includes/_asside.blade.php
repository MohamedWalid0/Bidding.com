<aside>
    <div class="col-sm-12 col-md-7 col-lg-4">

        <div class="bg-white rounded-lg shadow card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="text-center list-group-item">
                    <div class="user">
                        <div class="avatar-area">
                            <img src="https://i.pravatar.cc/150?img=3" alt="avtar" class="rounded-circle" width="70"
                                 height="70">
                            <div class="edit-avatar">
                                <a href="#" data-toggle="modal" data-target="#editPhoto">

                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mt-1">
                            <h5> {{$account->full_name}} </h5>
                            <p class="mt-0 text-muted"> {{$user->email}} </p>
                        </div>
                    </div>
                </li>


                <li>
                    <a href="{{ route('products.create') }}">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-gavel text-primary"></i>
                                <span class="ml-2">Add New Product</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#dashboard">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-tachometer-alt text-info"></i>
                                <span class="ml-2">Dashboard</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#PersonalData">
                        <div class="profile-tabs container-fluid">
                            <p>

                                <i class="fas fa-user-cog text-danger" ></i>
                                <span class="ml-2">Personal Data</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#MyBids">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-gavel text-warning"></i>
                                <span class="ml-2">My Bids</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#Notification">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-bell text-success"></i>
                                <span class="ml-2">Notifications</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#PersonalData">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-user-cog text-danger"></i>
                                <span class="ml-2">Personal Data</span>
                            </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#MyBids">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-gavel text-warning"></i>
                                <span class="ml-2">My Bids</span>
                            </p>
                        </div>
                    </a>
                </li>


            </ul>
        </div>


    </div>
</aside>
