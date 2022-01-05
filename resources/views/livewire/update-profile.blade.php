<div>
    <form wire:submit.prevent="edit">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" wire:model.lazy="name" name="name"
                   value="{{old('name') ?? $name}}">
            @error('name')
            <small class="form-text text-danger">{{$message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" wire:model.lazy="email" name="email"
                   value="{{old('email') ?? $email}}">
            @error('email')
            <small class="form-text text-danger">{{$message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" wire:model.lazy="phone" name="phone"
                   value="{{old('phone') ?? $phone}}">
            @error('phone')
            <small class="form-text text-danger">{{$message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Location</label>
            <input type="text" class="form-control" wire:model.lazy="address" name="address"
                   value="{{old('address') ?? $address}}">
            @error('address')
            <small class="form-text text-danger">{{$message }}</small>
            @enderror
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save <i class="fas fa-share-square"></i>
            </button>
        </div>
    </form>

    {{-- @if (session()->has('message'))
    <div  style="bottom: -16px; left:0; font-weight:600; z-index:9999999;"
     class="alert alert-success position-fixed w-25">
        {{session('message')}}
    </div>
    @endif --}}
</div>
