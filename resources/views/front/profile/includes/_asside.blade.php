<aside class="mb-5">

    <div class="bg-white  shadow " >
        <ul class="list-group list-group-flush">
            <li class="text-center list-group-item mb-5">
                <div class="user">
                    <livewire:update-image :user='$user'>
                    <div class="">
                        <h5> {{$account->full_name}} </h5>

                        <?php $userRate = number_format($userRate) ?>
                        <div class="rating">
                            @for ($i = 1 ; $i<=$userRate ; $i++ )
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $userRate+1  ; $j<=5 ; $j++ )
                                <i class="fa fa-star "></i>
                            @endfor
                        </div>

                        @if ( $rateCount > 0)
                            <p class="my-0">  {{ $rateCount }}  Ratings </p>
                        @else
                            <p class="my-0">  No Ratings yet </p>
                        @endif

                        <p class="mt-0 text-muted"> {{$user->email}} </p>
                    </div>
                </div>
            </li>


            <li>
                {{-- <button class="sidebar-custom-btn sidebar-btn-7 ">
                    <span class="sidebar-btn-7-span"> --}}

                        <a href="{{ route('products.create') }}">
                            <div class="profile-tabs container-fluid">
                                <p>
                                    <i class="fas fa-gavel text-primary"></i>
                                    <span class="ml-2">Add New Product</span>
                                </p>
                            </div>
                        </a>
                    {{-- </span>
                </button> --}}
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
                <a href="#Reviews">
                    <div class="profile-tabs container-fluid">
                        <p>
                            <i class="fas fa-user-cog text-danger"></i>
                            <span class="ml-2">Reviews</span>
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



            <!-- Button trigger modal -->
            @if (request('user'))
                <li>
                    <a  type="button"  data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="profile-tabs container-fluid">
                            <p>
                                <i class="fas fa-star text-dark"></i>
                                <span class="ml-2">Rate User ?</span>
                            </p>
                        </div>
                    </a>
                </li>
            @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('users.rate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                @if ( request('user') )
                                    <div class="rating-css">
                                        <div class="star-icon">

                                            @if ($existsRate)
                                                @for ($i = 1 ; $i <= $existsRate->rate ; $i++)

                                                    <input type="radio" value="{{ $i }}" name="user_rating" checked id="rating{{ $i }}">
                                                    <label for="rating{{ $i }}" class="fa fa-star"></label>

                                                @endfor
                                                @for ($j = $existsRate->rate + 1 ; $j <= 5 ;$j++ )
                                                    <input type="radio" value="{{ $j }}" name="user_rating"  id="rating{{ $j }}">
                                                    <label for="rating{{ $j }}" class="fa fa-star"></label>

                                                @endfor

                                            @else

                                                <input type="radio" value="1" name="user_rating" checked id="rating1">
                                                <label for="rating1" class="fa fa-star" ></label>
                                                <input type="radio" value="2" name="user_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="user_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="user_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="user_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>

                                            @endif

                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="text-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Add Review</label>
                                        <textarea class="form-control"
                                        name="review"
                                        id="exampleFormControlTextarea1"
                                        rows="3">{{$existsRate->review->review ?? old('review')}}</textarea>
                                    </div>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>






            <!-- Button trigger modal -->
            <li>
                <a  type="button"  data-toggle="modal" data-target="#reportModel">
                    <div class="profile-tabs container-fluid">
                        <p>
                            <i class="fas fa-flag text-danger"></i>
                            <span class="ml-2">Report User ?</span>
                        </p>
                    </div>
                </a>
            </li>
            <!-- Modal -->
            <div class="modal fade" id="reportModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('users.report') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Are you sure to report {{ $user->account->full_name }}  ? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



















        </ul>
    </div>


</aside>
