<div>
    <div class="page" id="dashboard">
        <div class="bg-white rounded-lg shadow">
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
                            <td><img class="w-35 rounded-circle " src="{{ $user->avatarUrl() }}" alt="avatarUrl"></td>
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
        </div>
    </div>
</div>


