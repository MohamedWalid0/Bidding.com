<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Roles</h3>
        <a data-target="#modal-create-role" data-toggle="modal" class="btn btn-sm btn-primary ml-auto"> Create New
            Role </a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Role Name</th>
                <th>Users#</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ( $roles as $role )


                <tr>
                    <td>
                        <p>
                            {{ $role->name }}
                        </p>
                    </td>

                    <td>
                        <p>
                            {{ $role->users_count }}
                        </p>
                    </td>

                    <td>
                        @can('update' , \App\Models\Role::class)
                            <button data-target="#modal-editRole-{{ $role->id }}" data-toggle="modal"
                                    class="btn btn-success btn-sm">
                                Edit <i class="fas fa-user-tag"></i>
                            </button>
                        @endcan
                        @can('delete' , \App\Models\Role::class)
                            <button data-target="#modal-deleteRole-{{ $role->id }}" data-toggle="modal"
                                    class="btn btn-danger btn-sm">
                                Delete <i class="fas fa-trash"></i>
                            </button>
                        @endcan
                    </td>

                </tr>



                @include('dashboard.roles.modals._editRole')
                @include('dashboard.roles.modals._deleteRole')


            @endforeach

            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
