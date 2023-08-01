<div class="bg-white p-2">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="card rounded-0">
                <div class="card-header  bg-white ">
                    <i class="fa-solid fa-list"></i>
                    قائمة الفصل
                </div>
                <div class="card-body">
                    <form action="post" wire:submit.prevent="add">
                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="level">المرحلة الدراسية

                                <span class="float-start">
                                    @error('levels_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="levels_id" class="form-select pe-5 rounded-0">
                                <option selected> اختر المرحلة الدراسية </option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="classes"> الصف

                                <span class="float-start">
                                    @error('classes_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="classes_id" class="form-select pe-5 rounded-0">
                                <option selected> اختر الصف </option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="shift"> الفترة الدراسية
                                <span class="float-start">
                                    @error('shifts_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="shifts_id" class="form-select pe-5 rounded-0">
                                <option selected> اختر الفترة الدراسية </option>
                                @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="section"> القسم
                                <span class="float-start">
                                    @error('sections_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="sections_id" class="form-select pe-5 rounded-0">
                                <option selected> اختر القسم </option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="group"> المجموعة
                                <span class="float-start">
                                    @error('groups_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="groups_id" class="form-select pe-5 rounded-0">
                                <option selected> اختر المجموعة
                                </option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>

                        </div>


                        <button type="submit" class="btn btn-primary">اختر الفصل</button>
                    </form>
                </div>
            </div>
        </div>

        @php
            $serial = ($students->currentpage() - 1) * $students->perpage() + 1;
        @endphp
    <div class="col-xs-12 col-sm-12 col-md-10">
        <button class="btn btn-danger text-white" wire:click.prevent="exportData()">
            <i class="fa-solid fa-download" ></i>
        </button>
        <table class="table table-bordered">
            <thead>
                <th>no</th>
                <th>اسم الطالب</th>
                <th>رقم الطالب</th>
            </thead>
            <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$serial}}</td>
                            <td>{{SystemInfo::get_full_student_name($student->id) }}  </td>
                            <td>{{$student->studentInfo->father->number }}-{{$student->studentInfo->id }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
