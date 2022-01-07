<div class="modal fade" id="modal-editRole-{{ $role->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit : {{ $role->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('roles.update') }}" method="POST">

                <div class="modal-body">
                    @csrf

                    <input type="hidden" value="{{ $role->id }}" name="role_id">

                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $role->name }}" name="role_name">
                    </div>


                    <div class="row">
                        @foreach ( config('abilities') as $ability => $desc)
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="abilities[]"
                                           value="{{ $ability }}"
                                           @if (in_array($ability , ( $role->abilities ?? []) , true ))
                                           checked=""
                                        @endif id="checkbocroles">
                                    <label class="form-check-label" for="#checkbocroles">
                                        {{ $desc }}
                                    </label>
                                </div>
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
