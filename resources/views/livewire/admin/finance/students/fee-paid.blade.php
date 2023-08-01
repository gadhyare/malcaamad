<div class="container-fluid py-3">
    <div class="container-fluid mb-3">
        <a href="{{route('fees.feedelete_for_class')}}" class="btn bg-primary-dark text-white rounded-1 shadow-lg py-1 px-3">

            <i class="fa-solid fa-trash"></i>
            <span>
                تحديث معلومات الرسوم
            </span>
        </a>
    </div>
    @php $i = 1 @endphp
    <table class="table  border border-light rounded" id="myTable" style="border-spacing: 0px;">
        <thead  >
            <tr>
                <th class="py-3 bg-gray-dark text-white text-center ">م</th>
            <th class="py-3 bg-gray-dark text-white text-center ">الاسم</th>
            <th class="py-3 bg-gray-dark text-white text-center ">الرقم العائلي</th>
            <th class="py-3 bg-gray-dark text-white text-center ">المرحلة الدراسية</th>
            <th class="py-3 bg-gray-dark text-white text-center ">الصف</th>
            <th class="py-3 bg-gray-dark text-white text-center ">الفترة</th>
            <th class="py-3 bg-gray-dark text-white text-center ">المجموعة</th>
            <th class="py-3 bg-gray-dark text-white text-center ">القسم</th>
            <th class="py-3 bg-gray-dark text-white text-center ">جهة الدفع</th>
            <th class="py-3 bg-gray-dark text-white text-center ">الدورة المالية</th>
            <th class="py-3 bg-gray-dark text-white text-center ">المطلوب</th>
            <th class="py-3 bg-gray-dark text-white text-center "> دفع الرسوم </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($infos as $info)
                <tr>
                    <td class="bg-white ">
                        {{$i++}}
                    </td>
                    <td class="bg-white ">
                        {{ SystemInfo::get_full_student_name($info->studentInfo->id) }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->studentInfo->family_number->fnumber }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->levels->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->classes->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->shifts->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->groups->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->sections->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->feestypes->name }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->from }} -{{ $info->to }}
                    </td>
                    <td class="bg-white ">
                        {{ $info->want }}$
                    </td>
                    <td class="bg-white ">
                        <a href="{{route('fees.fee-paidtracking' , ['id'=>$info->id , 'stu_id'=>$info->studentInfo->id])}}" target="__blank" class="btn btn-warning shadow-md py-0">
                            <small style="font-size: 10px;">
                                <i class="fa-solid fa-dollar"></i>
                            <span>
                                <small>
                                    دفع الرسوم
                                </small>
                            </span>
                            </small>
                        </a>


                        <button   class="btn bg-danger-dark text-white shadow-md py-0" wire:click="confrimDalete({{$info->id}})">
                            <small style="font-size: 10px;">
                                <i class="fa-solid fa-trash"></i>
                            <span>
                                <small>
                                  حذف
                                </small>
                            </span>
                            </small>
                        </button>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
</div>
