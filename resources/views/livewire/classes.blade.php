<div class="container bg-white p-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header bg-gray-dark text-white">
                    <i class="fa-solid fa-list"></i>
                    <span>
                        قائمة الفصول
                    </span>
                </div>
                <div class="card-body">
                    <form method="post" class="fw-bold">
                        @csrf
                        <div class="form-group my-2">
                            <label for="name"> الصف </label>
                            <input type="text" name="name" id="name" class="form-control bg-white"
                                wire:model.defer="name">
                            @error('name')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="levels_id"> المرحلة الدراسية </label>
                            <select name="levels_id" id="levels_id" name="levels_id" class="form-control bg-white"
                                wire:model.defer="levels_id">
                                <option selected> اختر المرحلة الدراسية</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}"> {{ $level->name }} </option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control bg-white">
                            @error('levels_id')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="active">الحالة</label>
                            <select name="active" id="active" class="form-control bg-white"
                                wire:model.defer="active">
                                <option value="1">مفعل</option>
                                <option value="2">غير مفعل</option>
                            </select>
                            @error('active')
                                <small><i class="text-danger">{{ $message }}</i></small>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-success-dark @if ($updateId) bg-primary-dark @endif text-white   shadow-lg float-end"
                            wire:click.prevent="add">
                            <i class="fa fa-solid fa-add"></i>
                            <span>
                                {{ $btnTitle }} صف
                            </span>
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
            <a href="{{route('classes.print')}}" class="btn btn-danger">print</a>
            @php
                $serial = ($classes->currentpage() - 1) * $classes->perpage() + 1;
            @endphp
            {{-- Show all expenses type list --}}
            <x-table :headers="['#', 'الصف', 'المرحلة الدراسية', 'الحالة', 'التعديل', 'الحذف']">
                @foreach ($classes as $classe)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $classe->name }}</td>
                        <td>{{ $classe->levels->name }}</td>
                        <td>{{ $classe->active == 1 ? 'مفعل' : 'غير مفعل' }}</td>
                        <td>
                            <button class="btn bg-success-dark text-white  px-2 py-0 shadow-lg rounded-0">
                                <i class="fa-solid fa-pencil"
                                    wire:click="updateRec({{ $classe->id }})"></i></button>
                        </td>
                        <td>
                            <button class="btn bg-danger-dark text-white  px-2 py-0 shadow-lg rounded-0"
                                wire:click="deleteConfirmation({{ $classe->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            {{ $classes->links() }}
        </div>
    </div>
</div>
