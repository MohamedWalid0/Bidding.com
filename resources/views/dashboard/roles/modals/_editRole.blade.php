<div class="modal fade" id="modal-editRole-{{ $role->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit : {{ $role->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('roles.update' , $role) }}" method="POST">

                <div class="modal-body">
                    @csrf

                    <input type="hidden" value="{{ $role->id }}" name="role_id">

                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $role->name }}" name="role_name">
                    </div>
                    <div class="row ml-4">
                        @foreach ( \App\Models\Permission::all() as $permission)
                            @php  $x = uniqid('' , false); @endphp
                            <div class="form-check col-3">
                                <input class="form-check-input" type="checkbox" name="abilities[]"
                                       id="checkbocroles_{{ $x  }}"
                                       value="{{ $permission->id }}"
                                       @if (in_array($permission->id , ( $role->permissions->pluck('id')->toArray() ?? []) , true ))
                                       checked=""
                                       @endif id="checkbocroles">
                                <label class="form-check-label" for="checkbocroles_{{ $x }}">
                                    {{ $permission->description }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @if ($errors->updateRole->any())
                        @foreach ($errors->updateRole->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
