<div class="card">
    <div class="card-header  ">
        <h3 class="card-title">Users</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>user name</th>
                    <th>current role</th>
                    <th>actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user )

                    <form action="{{ route('roles.user.update') }}" method="post">
                        @csrf

                        <tr>
                            <td>
                                <p>
                                    {{ $user->account->full_name }}
                                </p>
                            </td>
                            <td>
                                <span class="badge bg-primary"> <i class="fas fa-user-shield"></i> {{ $user->role->name }}</span>

                            </td>

                            <td>
                                @can('update' , \App\Models\Role::class)
                                    <button data-target="#modal-{{ $user->id }}" data-toggle="modal"  class="btn btn-warning btn-sm" >
                                        Modify Role <i class="fas fa-user-cog"></i>
                                    </button>
                                @endcan
                            </td>

                        </tr>
                    </form>

                    @include('dashboard.roles.modals._modifyUserRole')


                @endforeach

            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->



@include('dashboard.roles.modals._RoleModalCreate')
