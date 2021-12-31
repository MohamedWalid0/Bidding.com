
<div class="modal fade" id="modal-{{ $user->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit : {{ $user->account->full_name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('roles.user.update') }}" method="post">

                <div class="modal-body">
                    @csrf

                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <input type="hidden" value="{{ $user->role_id }}" name="current_role_id" >

                    <p>Current Role : {{ $user->role->name }}</p>


                    @foreach ($roles as $role )



                        <div class="form-check">
                            <input class="form-check-input mt-2" id="user{{ $user->id }}-role{{ $role->id }}" value="{{ $role->id }}" name="role_id" type="radio"
                                @if ($user->role_id == $role->id)
                                    disabled
                                @endif
                            >
                            <label class="form-check-label pt-0 mt-0" for="user{{ $user->id }}-role{{ $role->id }}">

                                @if ($user->role_id == $role->id)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @else
                                    <span class="badge ">{{ $role->name }}</span>

                                @endif

                            </label>
                        </div>



                    @endforeach



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
