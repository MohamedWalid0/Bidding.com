
<div class="modal fade" id="modal-{{ $product->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit : {{ $product->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{route('product.update' , $product->id)}}" method="post">
                @method('PATCH')
                <div class="modal-body">
                    @csrf

                    {{-- <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <input type="hidden" value="{{ $user->role_id }}" name="current_role_id" > --}}

                    <p>Current Status : {{ $product->status }}</p>

                    <div class="form-group">
                        <label for="subCategory">Name</label>
                        <select class="custom-select my-1 mr-sm-2" name="status" id="inlineFormCustomSelectPref">
                            @foreach ($avilableStatus as $status )
                                <option value="{{$status}}"
                                @if ($status == $product->status) selected @endif>
                                {{$status}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- @foreach ($roles as $role )
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

                    @endforeach --}}



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
