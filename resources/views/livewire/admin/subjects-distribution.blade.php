<div>
    <div class="card border-0 p-3 shadow-lg ">
        @if (Session::has('status'))
            <div class="alert alert-success text-center ">{{ Session::get('status') }}</div>
        @endif


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-header title px-3 text-white"> اضافة قريب للطالب </div>
                    <div class="card-body">

                        <form method="post" class="fw-bold"  wire:submit.prevent="checkOpration">
                            @csrf

                            <div class="form-group my-2">
                                <label for="subjects_id"> المادة </label>

                                <select name="subjects_id" id="subjects_id" name="subjects_id"
                                    class="form-control bg-white" wire:model="subjects_id">

                                    <option selected> اختر المادة</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control bg-white">
                                @error('subjects_id')
                                    <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="levels_id"> المرحلة الدراسية </label>

                                <select name="levels_id" id="levels_id" name="levels_id" class="form-control bg-white"
                                    wire:model="levels_id">

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
                                <label for="classes_id"> الصف الدراسي </label>

                                <select name="classes_id" id="classes_id" name="classes_id"
                                    class="form-control bg-white" wire:model="classes_id">

                                    <option selected> اختر الصف الدراسي</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}"> {{ $classe->name }} </option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control bg-white">
                                @error('classes_id')
                                    <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="max_mark">الدرجة العليا</label>
                                <input type="number" name="max_mark" id="max_mark" class="form-control bg-white" wire:model.defer="max_mark">
                            </div>

                            <div class="form-group">
                                <label for="min_mark">الدرجة الدنيا</label>
                                <input type="number" name="min_mark" id="min_mark" class="form-control bg-white" wire:model.defer="min_mark">
                            </div>
                            <div class="form-group mb-1">
                                <label for="rank">  الترتيب على الكشف  </label>
                                <input type="number" name="rank" id="rank" class="form-control bg-white" wire:model.defer="rank">
                            </div>
                            <button type="submit"
                            class="btn @if ($updateId) bg-success-dark @else bg-primary-dark @endif text-white   shadow-lg float-end">
                            <i class="fa fa-plus"></i>
                            {{ $btnTitle }} مستوى
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
                    $serial = ($SubjectsDistributions->currentpage() - 1) * $SubjectsDistributions->perpage() + 1;
                @endphp
                {{-- Show all expenses type list --}}
                <x-table :headers="[
                    '#',
                    'المادة',
                    'الدرجة العليا',
                    'الدرجة الدنيا',
                    'التعديل',
                    'الترتيب على الكشف',
                    'الحذف',
                ]">

                    @foreach ($SubjectsDistributions as $SubjectsDistribution)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $SubjectsDistribution->subjects->name }}</td>
                            <td>{{ $SubjectsDistribution->max_mark }}</td>
                            <td>{{ $SubjectsDistribution->min_mark }}</td>
                            <td>{{ $SubjectsDistribution->rank }}</td>
                            <td>
                                <button class="btn bg-success-dark text-white  px-2 py-0 shadow-lg rounded-0" wire:click="updateRec({{ $SubjectsDistribution->id }})"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-pencil  "> </i>
                                </button>
                            </td>
                            <td>
                                <button class="btn bg-danger-dark text-white  px-2 py-0 shadow-lg rounded-0"
                                wire:click="deleteConfirmation({{ $SubjectsDistribution->id }})">
                                <small>
                                    <i class="fa-solid fa-trash  "></i>
                                </small>
                            </button>
                        </tr>
                    @endforeach
                </x-table>
                {{ $SubjectsDistributions->links() }}
            </div>
        </div>
    </div>
</div>
