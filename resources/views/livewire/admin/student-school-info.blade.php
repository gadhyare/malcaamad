<div>
    <div class="card border-0 p-3 shadow-lg col-md-9">
        @if (Session::has('status'))
            <div class="alert alert-success text-center ">{{ Session::get('status') }}</div>
        @endif





        @php
            $serial = ($students->currentpage() - 1) * $students->perpage() + 1;
        @endphp
        {{-- Show all expenses type list --}}
        <x-table :headers="['#',    'المرحلة الدراسية'  ,'الفصل'  ,'المجموعة'  ,'الفترة'  ,'القسم'  ,'تاريخ التسجيل'  ,'الخصم' , 'الحالة'     ,  'التعديل' , 'الحذف' ]">

            @foreach ($students as $student)
                <tr wire:key="student-{{ $student->id }}">
                    <td>{{ $serial++ }}</td>
                    <td>{{ $student->levels->name }}</td>
                    <td>{{ $student->classes->name }}</td>
                    <td>{{ $student->groups->name }}</td>
                    <td>{{ $student->shifts->name }}</td>
                    <td>{{ $student->sections->name }}</td>
                    <td>{{ $student->registered_date }}</td>
                    <td>{{ $student->discount }}</td>

                    <td>{{ $student->active == 1 ? 'مفعل' : 'غير مفعل' }}</td>

                    <td>
                        <small><i class="fa-solid fa-pen  bg-success  text-white  shadow p-1"
                                wire:click="updateRec({{ $student->id }})" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></i></small>
                    </td>
                    <td>


                        <x-delete-confirm btnTitle="حذف" recId="{{ $student->id }}">
                            [{{ $student->id}}]
                        </x-delete-confirm>

                    </td>
                </tr>
            @endforeach
        </x-table>



        {{ $students->links() }}
    </div>
</div>
