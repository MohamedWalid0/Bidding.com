<div class="bg-white rounded-lg shadow">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h4>Personal Data</h4>

            @can('action' , \App\Models\User::class)
                <p>
                    <a href="#" data-toggle="modal" data-target="#exampleModal">
                        <button class="custom-btn btn-7 ">
                            <span class="btn-7-span">
                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                <span class="text-muted">Edit</span>
                            </span>
                        </button>
                    </a>
                </p>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <p class="text-muted">Name <span style="margin-left: 100px;">:</span></p>
            </div>
            <div class="col-8">
                <p class="font-weight-bold" style="margin-left: -75px;">{{ $account->full_name }}</p>
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
                    {{ $user->email }} </p>
            </div>
        </div>

    </div>
</div>
