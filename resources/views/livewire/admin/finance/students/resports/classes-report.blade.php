<div class="bg-white p-2">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="card rounded-0">

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


                        <div class="form-group my-2 fw-bold">
                            <label class="container px-0 py-2" for="group"> جهة الدفع
                                <span class="float-start">
                                    @error('feestypes_id')
                                        <div class="bg-danger text-white px-2">
                                            مطلوب
                                        </div>
                                    @enderror
                                </span>
                            </label>

                            <select class="form-select rounded-0 px-5 bg-light my-1" wire:model="feestypes_id">
                                <option selected> اختر جهة الدفع </option>
                                @foreach ($feestypes as $feestype)
                                    <option value="{{ $feestype->id }}"> {{ $feestype->name }} </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="from">
                                من تاريخ
                            </label>
                            <span class="float-start">
                                @error('from')
                                    <div class="bg-danger text-white px-2">
                                        مطلوب
                                    </div>
                                @enderror
                            </span>
                            <input type="date" id="from" wire:model="from" class="form-control rounded-0 alert alert-info py-2 my-2">
                        </div>

                        <div class="form-group">
                            <label for="to">
                                حتى تاريخ
                            </label>
                            <span class="float-start">
                                @error('to')
                                    <div class="bg-danger text-white px-2">
                                        مطلوب
                                    </div>
                                @enderror
                            </span>
                            <input type="date" id="to" wire:model="to"  class="form-control rounded-0 alert alert-info py-2 my-2">
                        </div>


                    </form>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-10">

            <div class="container fw-bold text-center" wire:loading>
                <img src="{{asset('/images/loading-loading-forever.gif')}}" alt="loading" style="width:50px; height:50px">
        </div>
        <br>
        <br>
        @php $i = 1 ; @endphp
        <table class="table table-striped" >
            <thead>
                <th class="py-3 bg-gray-dark text-center border-0 text-white">#</th>
                <th class="py-3 bg-gray-dark text-center border-0 text-white"> اسم الطالب </th>
                <th class="py-3 bg-gray-dark text-center border-0 text-white"> رقم الرصيد </th>
                <th class="py-3 bg-gray-dark text-center border-0 text-white"> التاريخ </th>
                <th class="py-3 bg-gray-dark text-center border-0 text-white"> جهة الدفع </th>

                <th class="py-3 bg-gray-dark text-center border-0 text-white"> الخصم </th>
                <th class="py-3 bg-gray-dark text-center border-0 text-white"> المبلغ </th>
            </thead>
        <tbody>
            @foreach ($feetrans as $feetran)
                <tr>
                    <td> {{$i++}}</td>
                    <td> {{$feetran->invoices->studentInfo->name}} {{$feetran->invoices->studentInfo->father->name}}  </td>
                    <td> {{$feetran->invoices->id}} </td>
                    <td> {{$feetran->paid_date}} </td>
                    <td> {{$feetran->invoices->feestypes->name}} </td>
                    <td> {{$feetran->descount}} </td>
                    <td> {{$feetran->amount}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
