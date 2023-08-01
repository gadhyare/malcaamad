<div class="bg-white p-2">
    <div class="conainer">

        @if (session()->has('errorIn'))
        <div class="alert alert-danger text-center rounded-0">
            {{ Session::get('errorIn') }}
        </div>

    @endif
    @if (session()->has('success'))
    <div class="alert alert-success text-center rounded-0">
        {{ Session::get('success') }}
    </div>

@endif
</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
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
                                        <div class="bg-danger-dark text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="levels_id" class="form-select pe-5 rounded-0 ">
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
                                        <div class="bg-danger-dark text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="classes_id" class="form-select pe-5 rounded-0 ">
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
                                        <div class="bg-danger-dark text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="shifts_id" class="form-select pe-5 rounded-0 ">
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
                                        <div class="bg-danger-dark text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="sections_id" class="form-select pe-5 rounded-0 ">
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
                                        <div class="bg-danger-dark text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>
                            <select wire:model="groups_id" class="form-select pe-5 rounded-0 ">
                                <option selected> اختر المجموعة
                                </option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>

                        </div>


                        <button type="submit" wire:click.prevent="add" class="btn bg-gray-dark text-white  rounded  shadow-lg ">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>
                                رفع الرسوم
                            </span>
                        </button>




                    </form>
                </div>
            </div>
        </div>

        @php
            $serial = ($students->currentpage() - 1) * $students->perpage() + 1;
        @endphp
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="container mb-1 px-0">
                <div class="float-end">
                    <span>
                        معلومات الدورة المالية الحالية
                    </span>
                    <input type="date" wire:model="billingsFrom" class="form-control rounded-0 my-1 bg-white py-1 border-0" disabled>
                    <input type="date" wire:model="billingsTo" class="form-control rounded-0 my-1 bg-white py-1 border-0" disabled>
                    <input type="hidden" wire:model="billingsId" class="form-control rounded-0 my-1 bg-white py-1 border-0" disabled>

                </div>



                <div class="float-start">

                    <span>
                        معلومات اضافية للرفع
                    </span>
                    <select class="form-select rounded-0 px-5 bg-light my-1"  wire:model="active">
                        <option value="1"> تفعيل الخصوم الدائمة </option>
                        <option value="2"> عدم تفعيل الخصوم الدائمة </option>
                    </select>
                    <span class="float-start">
                        @error('feestypes_id')
                            <div class="bg-danger-dark text-white px-2">
                                مطلوب
                            </div>
                        @enderror
                    </span>
                    <select class="form-select rounded-0 px-5 bg-light my-1" wire:model="feestypes_id">
                        <option selected> اختر جهة الدفع </option>
                        @foreach ($feestypes as $feestype)
                            <option value="{{ $feestype->id }}"> {{ $feestype->name }} </option>
                        @endforeach
                    </select>

                </div>


            </div>




            <table class="table table-bordered">
                <thead>
                    <th class="py-2 bg-success-dark text-white text-center border-0"> م </th>
                    <th class="py-2 bg-success-dark text-white text-center border-0">اسم الطالب</th>
                    <th class="py-2 bg-success-dark text-white text-center border-0">رقم الطالب</th>
                    <th class="py-2 bg-success-dark text-white text-center border-0">  الخصم الخاص بالطالب </th>
                    <th class="py-2 bg-success-dark text-white text-center border-0">  الرسوم المقررة على جهة الدفع     </th>
                    <th class="py-2 bg-success-dark text-white text-center border-0">  اجمالي المطلوب    </th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $serial }}</td>
                            <td>{{ $student->studentInfo->name }} {{ $student->studentInfo->father->name }}</td>
                            <td>
                                {{ $student->studentInfo->father->number }}-{{ $student->id }}</td>
                            <td>{{ $student->discount }} </td>
                            <td>{{ $amount  }} </td>
                            <td>
                                @if($feestypes_id !== null)
                                    @if($active ==1)
                                        {{ $amount - $student->discount }}
                                    @else
                                        {{ $amount }}
                                    @endif
                                    @else
                                    اختر جهة الدفع
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
