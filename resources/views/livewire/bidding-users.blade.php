<div>
    <div class="page" id="dashboard">
        {{-- <div class="bg-white rounded-lg shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Bids</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table">
                    <thead class=" bg-custom" style="background-color: #389EFF;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">bidder</th>
                        <th scope="col">Name</th>
                        <th scope="col">Bid Cost</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($product->hot_users as $user )
                        <tr animate-move wire:key="{{ $user->id }}" class="text-center text-dark table-{{ $colors[$loop->index] }}">

                            <th scope="row">
                                <p class="mt-4">
                                    {{$loop->iteration}}
                                </p>
                            </th>
                            <td><img class=" rounded-circle " src="{{ $user->avatarUrl() }}" alt="avatarUrl"></td>
                            <td>
                                <div class="mt-4">
                                    {{$user->account->full_name}}
                                </div>
                            </td>
                            <td>
                                <p class="mt-4">
                                    {{$user->bid->cost}}
                                </p>
                            </td>

                            <td>
                                <p class="mt-4">
                                    {{$user->bid->updated_at->diffForHumans()}}
                                </p>
                            </td>
                        </tr>

                    @empty

                    @endforelse

                    </tbody>
                </table>


            </div>
        </div> --}}


            <h4 class="mb-1 table-head">Top Bids</h4>


            <div class="table-responsive">

              <table class="table table-striped custom-table">
                <thead>
                  <tr class="text-center" style="font-size: 20px;">

                    <th scope="col">#</th>
                    <th scope="col">Bidder</th>
                    <th scope="col">Name</th>
                    <th scope="col">Bid Cost</th>
                    <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($product->hot_users as $user )
                    <tr scope="row"  animate-move wire:key="{{ $user->id }}"
                        class="text-center @if($loop->iteration !== 1 && $isClosed) opacity-50 @endif">
                        <td class="padd-top">
                            <small style="font-size:13px"
                            class="badge bg-primary">{{$this->str_ordinal($loop->iteration)}}</small>
                        </td>
                        <td>
                        <img class="rounded-circle mx-2" src="{{ $user->avatarUrl() }}" alt="avatarUrl">
                        </td>
                        <td class="padd-top">
                        <a href="#">  {{$user->account->full_name}}</a>
                        @if ($loop->iteration == 1 && $isClosed)
                                  <small style="font-weight:800; color:white; font-size:13px"
                         class="badge bg-success">Winner!</small>
                        @endif

                        </td>
                        <td class="padd-top">{{$user->bid->cost}}LE</td>
                        <td class="padd-top">{{$user->bid->updated_at->diffForHumans()}}</td>
                    </tr>
                  @empty

                  @endforelse
                </tbody>
              </table>
            </div>
    </div>
</div>


