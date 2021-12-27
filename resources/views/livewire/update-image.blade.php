<div>
    @if ($isAuth)
        <div class="avatar-area auth-avatar"
        x-data="{imagePreview: '{{$imageSrc}}' }">
            <input wire:model='image' type="file" x-ref="image"
            x-on:change="
                const reader = new FileReader();
                reader.onload = (event) => {
                    imagePreview = event.target.result;
                };
                reader.readAsDataURL($refs.image.files[0]);
            ">
            <img x-bind:src=" imagePreview ? imagePreview :  'https://i.pravatar.cc/150?img=3' " alt="avtar"
            class="rounded-circle" width="70"
                height="70"
                x-on:click="$refs.image.click()">
            <div class="edit-avatar">
                <a href="#">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </div>
        </div>
    @else
    <div class="avatar-area ">
        <img src="{{$imageSrc}}" alt="avtar"
        class="rounded-circle" width="70"
            height="70">
    </div>
    @endif

</div>
