<div class="container bg-white p-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header bg-gray-dark text-white">
                    <i class="fa-solid fa-list"></i>
                    <span>
                        قائمة المجموعات
                    </span>

                </div>
                <div class="card-body">
                    <form method="post" class="fw-bold" wire:submit.prevent="checkOpration">
                @csrf
                <div class="form-group my-2">

                    <label for="name"> المجموعة </label>
                    <input type="text" name="name" id="name" class="form-control bg-white"
                        wire:model.defer="name">
                    @error('name')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="active">الحالة</label>
                    <select name="active" id="active" class="form-control bg-white" wire:model.defer="active">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                    @error('active')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>

                <button type="submit"
                class="btn @if ($updateId) bg-success-dark @else bg-primary-dark @endif text-white   shadow-lg float-end">
                <i class="fa fa-plus"></i>
                {{ $btnTitle }} مجموعة
            </button>
            @if ($updateId)
                <button type="submit" class="btn bg-danger-dark text-white   shadow-lg float-start"
                    wire:click.prevent="cancel">
                    <span>
                        تراجع
                    </span>
                </button>
            @endif
            </form>
        </div>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-8">
        @php
            $serial = ($groups->currentpage() - 1) * $groups->perpage() + 1;
        @endphp
        {{-- Show all expenses type list --}}
        <x-table :headers="['#', 'المجموعة', 'الحالة', 'التعديل', 'الحذف']">

            @foreach ($groups as $group)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->active == 1 ? 'مفعل' : 'غير مفعل' }}</td>
                    <td>
                        <button class="btn bg-success-dark text-white  px-2 py-0 shadow-lg rounded-0" wire:click="updateRec({{ $group->id }})"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-pencil  "> </i>
                        </button>
                    </td>
                    <td>
                        <button class="btn bg-danger-dark text-white  px-2 py-0 shadow-lg rounded-0"
                        wire:click="deleteConfirmation({{ $group->id }})">
                        <small>
                            <i class="fa-solid fa-trash  "></i>
                        </small>
                    </button>

                    </td>
                </tr>
            @endforeach
        </x-table>
        {{ $groups->links() }}
    </div>
</div>
