<div class="modal fade" id="modal-{{ $property->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit : {{ $property->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('property.update' , $property)}}" method="post">
                <div class="modal-body">
                @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name"  value="{{ $property->name }}">
                    </div>

                    @if ($errors->updateProperty->any())
                        @foreach ($errors->updateProperty->all() as $error)
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
