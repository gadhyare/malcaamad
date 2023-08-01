<div class="container my-3 pt-3">
    @if ($message_error != '')
        <div class="alert alert-danger text-center botder-0 fw-bold">
            {{$message_error}}
        </div>
    @endif

    @if ($message_success != '')
    <div class="alert alert-success text-center botder-0 fw-bold">
        {{$message_success}}
    </div>
@endif
    <form method="POST" >
        @csrf
        <div class="card shadow-lg rounded-0 border-0">
            <div class="container px-5 text-danger fw-bold">
                اسم الطالب:

                @if ($name )
                        {{$name->name }} {{$name->father->name}} - {{$name->father->number}}
                @endif
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 ">
                    <div class="card rounded-0 border p-2">
                        <div class="card-header rounded-0 text-white title">

                            <i class="fa-solid fa-paper-plane"></i>
                            <span>
                                بيانات الاختبار
                            </span>
                        </div>
                        <div class="card-body  ">
                            <div class="form-group"><label for="students_info_id"> رقم الطالب   </label>
                                <span class="float-start">
                                    @error('students_info_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>

                                <input name="students_info_id" id="students_info_id" class="form-control rounded-0 "
                                    wire:model="students_info_id">

                            </div>


                                <div class="form-group"><label for="levels"> اختر المرحلة </label>
                                    <span class="float-start">
                                        @error('levels')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>

                                    <select name="levels" id="levels" class="form-control rounded-0 "
                                        wire:model="levels">
                                        <option selected>اختر المرحلة</option>
                                        @foreach ($getAllLevels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group"><label for="classes_id"> الصف الدراسي </label>
                                    <span class="float-start">
                                        @error('classes_id')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>
                                    <select name="classes_id" id="classes_id" class="form-control rounded-0 "
                                        wire:model="classes_id">
                                        <option selected> اختر الصف الدراسي </option>
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="subjects_distributions_id"> المادة </label>
                                    <span class="float-start">
                                        @error('subjects_distributions_id')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>

                                    <select name="subjects_distributions_id"
                                        id="subjects_distributions_id" class="form-control rounded-0 "
                                        wire:model="subjects_distributions_id">
                                        <option selected> اختر المادة </option>
                                        @foreach ($subjects_distributions as $subjects_distribution)
                                            <option value="{{ $subjects_distribution->id }}">
                                                {{ $subjects_distribution->subjects->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="shifts_id"> الفترة </label>
                                    <span class="float-start">
                                        @error('shifts_id')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>
                                    <select name="shifts_id"
                                        id="shifts_id" class="form-control rounded-0 " wire:model="shifts_id">
                                        <option selected> اختر الفترة الدراسية </option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}">
                                                {{ $group->name }}</option>
                                        @endforeach
                                    </select></div>
                                <div class="form-group"><label for="groups_id"> المجموعة </label>
                                    <span class="float-start">
                                        @error('groups_id')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>
                                    <select name="groups_id" id="groups_id" class="form-control rounded-0 "
                                        wire:model="groups_id">
                                        <option selected> اختر المجموعة </option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}">
                                                {{ $shift->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="sections_id"> القسم </label>
                                    <span class="float-start">
                                        @error('sections_id')
                                            <div class="bg-danger text-white px-2">
                                                مطلوب
                                            </div>
                                        @enderror
                                    </span>

                                    <select name="sections_id"
                                        id="sections_id" class="form-control rounded-0 " wire:model="sections_id">
                                        <option selected> اختر القسم </option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">
                                                {{ $section->name }}</option>
                                        @endforeach
                                    </select></div>


                            <button type="submit" wire:click.prevent="add_new_exam_for_student" class="btn title  text-white col-12 m-auto rounded-0">
                                اضافة الاختبار
                            </button>


                            <br>
                            @if ($active)
                            <button type="submit" wire:click.prevent="getDate" class="btn btn-primary  text-white col-12 m-auto rounded-0">
                                 جلب نتائج الطالب
                            </button>
                            @endif
                        </div>


                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="card p-2 shadow-none border-0">
                        <table class="table table-bordered text-center   border  m-auto w-100">
                            <tbody>

                                <tr class="title text-white">
                                    <td class="text-white text-center border  text-dark p-2"> أعمال السنة 1</td>
                                    <td class="text-white text-center border  text-dark p-2"> الاختبار النصفي</td>
                                    <td class="text-white text-center border  text-dark p-2"> أعمال السنة 2</td>
                                    <td class="text-white text-center border  text-dark p-2">  الاختبار النهائي </td>
                                    <td class="text-white text-center border  text-dark p-2"> الحضور</td>
                                    <td class="text-white text-center border  text-dark p-2"> المجموع </td>
                                </tr>
                            </tbody>
                            <tbody>

                                <tr class="title">

                                    <td class="py-1">
                                        <input type="text" wire:model="qu1"
                                            class="form-control py-0 rounded-0 text-center @error('qu1') bg-danger @enderror ">
                                    </td>
                                    <td class="py-1">
                                        <input type="text" wire:model="ex1"
                                            class="form-control py-0 rounded-0 text-center  @error('ex1') bg-danger @enderror "">
                                    </td>
                                    <td class="py-1">
                                        <input type="text" wire:model="qu2"
                                            class="form-control py-0 rounded-0 text-center  @error('qu2') bg-danger @enderror "">
                                    </td>
                                    <td class="py-1">
                                        <input type="text" wire:model="ex2"
                                            class="form-control py-0 rounded-0 text-center  @error('ex2') bg-danger @enderror "">
                                    </td>
                                    <td class="py-1">
                                        <input type="text" wire:model="att"
                                            class="form-control py-0 rounded-0 text-center  @error('att') bg-danger @enderror "">
                                    </td>
                                    <td class="py-1">
                                        <input type="text" wire:model="total"
                                            class="form-control py-0 rounded-0 text-center  bg-white" disabled>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</form>
</div>
