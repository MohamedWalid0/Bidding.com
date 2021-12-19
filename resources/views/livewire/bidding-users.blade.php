<div>
    <div class="page" id="dashboard">
        <div class="bg-white rounded-lg shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Bids</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark bg-custom">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Bid Cost</th>
                    </tr>
                    </thead>
                    <tbody>
               @forelse ($product->hot_users as $user )
               <tr class="text-center">
                <th scope="row"> {{$loop->iteration}} </th>
                <td>{{$user->account->full_name}}</td>
                <td> {{$user->bid->cost}} </td>
                </tr>

               @empty

               @endforelse

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
