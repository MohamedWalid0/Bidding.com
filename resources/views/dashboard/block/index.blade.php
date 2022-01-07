@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
    <a href="{{ route('category.index') }}">categories</a>
    <li class="breadcrumb-item active"></li>
@endsection


@section('css')
    <link rel="stylesheet" href=" {{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')




    <div class="card">
        <div class="card-header  ">
            <h3 class="card-title">Blocked Users</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>user name</th>
                    <th>actions</th>
                    <th>blocked by</th>
                    <th>block date</th>

                </tr>
                </thead>
                <tbody>

                @foreach ( $users as $user )

                    <tr>
                        <td>
                            <p>
                                {{ $user->account->full_name }}

                            </p>
                        </td>


                        <td>


                            @if (in_array( $user->id  , $userBlocks) )
                                @can('create' , \App\Models\BlockUser::class)
                                    <button data-target="#modal-unBlock-{{ $user->id }}" data-toggle="modal"
                                            class="btn btn-danger btn-sm">
                                        Unblock <i class="fas fa-ban"></i>
                                    </button>
                                @endcan
                            @else
                                @can('update' , \App\Models\BlockUser::class)
                                    <button data-target="#modal-block-{{ $user->id }}" data-toggle="modal"
                                            class="btn btn-light btn-sm">
                                        Block <i class="fas fa-ban"></i>
                                    </button>
                                @endcan
                            @endif


                        </td>


                        <td>
                            {{-- <p> {{  $user->block->admin_id ?? 0  }} </p> --}}
                            <p> {{  $user->block->user_admin->account->full_name ?? ''  }} </p>

                        </td>


                        <td>
                            <p> {{  $user->block->created_at ?? ''  }} </p>

                        </td>


                    </tr>
                    @include('dashboard.block.modals._blockUserModal')
                    @include('dashboard.block.modals._unBlockUserModal')



                @endforeach


                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->











@endsection



@section('scripts')


    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }} "></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>


@endsection
