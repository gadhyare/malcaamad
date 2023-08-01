<div>
    <div class="card border-0 p-3 shadow-lg" >
        @if (Session::has('status'))
            <div class="alert alert-success text-center ">{{ Session::get('status') }}</div>
        @endif

        <span>
            <a href="{{route('fathers.index')}}" class="btn btn-warning float-end mb-3 mx-2 py-1 ">
                <small> <i class="fa-solid fa-plus"></i> <span>اضافة طالب جديد </span></small>
            </a>

            <a href="{{route('students.list')}}" class="btn btn-success float-end mb-3 mx-2 py-1 ">
                <small> <i class="fa-solid fa-list"></i> <span>  قائمة الفصل   </span></small>
            </a>

            <a href="{{route('students.upgrade')}}" class="btn bg-dark text-white float-end mb-3 mx-2 py-1 ">
                <small> <i class="fa-solid fa-upload"></i> <span>  تصعيد الفصل   </span></small>
            </a>
        </span>

        @php
            $serial = ($students->currentpage() - 1) * $students->perpage() + 1;
        @endphp
        {{-- Show all expenses type list --}}
        <x-table :headers="[
            '#',
            'الاسم',
            'الرقم العائلي',
            'الجنس',
            'العنوان',
            'المدينة',
            'الهواتف',
            'الصورة',
            'العمليات',
            'التعديل',
            'الحذف',
        ]">

            @foreach ($students as $student)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ SystemInfo::get_full_student_name($student->id) }} </td>
                    <td>{{ $student->family_number->number }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <img  src="{{ url('storage/uploads/images/students/'.$student->photo) }}" class="rounded-circle shadow-lg" style="width:30px; height: 30px"/>


                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="border-0 dropdown-toggle" type="button" id="dropdownMenuButton{{ $student->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-check-double"></i> <span>العمليات</span>
                            </button>
                            <ul class="dropdown-menu text-end px-2" aria-labelledby="dropdownMenuButton{{ $student->id }}">
                              <li class="px-2">

                                    <span class="text-white  shadow p-1 pe-auto dropdown-item"
                                    wire:click="updateRec({{ $student->id }})" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" >التعديل</span>

                              </li>
                              <li><a class="dropdown-item" href="{{route('students.surrent.info.pdf' , $student->id)}}"> طباعة </a></li>
                              <li><a class="dropdown-item" href="{{route('strurel.index' , $student->id)}}"> أقرباء للطالب </a></li>
                              <li><a class="dropdown-item" href="{{route('helth.record' , $student->id)}}"> السجل الطبي   </a></li>
                              <li><a class="dropdown-item" href="{{route('school.record' , $student->id)}}"> السجل الدراسي   </a></li>
                              <li><a class="dropdown-item" href="{{route('student.attachment' , $student->id)}}">  مرفقات الطالب </a></li>
                            </ul>
                          </div>
                        </td>
                    <td>

                    </td>
                    <td>



                    </td>
                </tr>
            @endforeach
        </x-table>


        {{ $students->links() }}
    </div>
</div>
