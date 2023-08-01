<div class="container">
    <div class="card col-xs-12 col-sm-12 col-md-5 m-auto alert alert-info shadow-lg">
        @error('logo')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
    @enderror
        <div class="card-body p-5 text-center">
            <label for="logo">
                <i class="fa-solid fa-cloud-arrow-up" style="font-size: 48px"></i>
                <div class="my-2">
                    اضغط هنا لاختيار الملف
                </div>
            </label>
            <input type="file"  id="logo" class="d-none" accept="image/png, image/gif, image/jpeg" wire:model="logo" >
            <button class="w-100 m-auto btn btn-primary" wire:click.prevent="uploadlogo">
                upload
            </button>
        </div>
    </div>



    <br>
    <div class="card text-center border-0 p-2 my-3" style="background-color: #F0F1F3 !important">
        <img src="{{url('storage/images/'.$info->logo)}}" alt="{{$info->name}}" class=" m-auto" style="height: 200px;width:200px ;" >
    </div>
</div>
