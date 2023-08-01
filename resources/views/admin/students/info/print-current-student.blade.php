@extends('admin.layouts.loged-master-no-header') <!-- -no-header -->
@section('content')
<style>
    body{
        font-size:12px !important;
    }
</style>
    <div class="container-fluid my-2 py-2 print-section">
        <div class="row  ">
            <div class="col-4 ">
                <table class="table">
                    <tr>
                        <td class="border-0 mt-0 py-0"> {{ SystemInfo::setting('name') }} </td>
                    <tr>
                        <td class="border-0 mt-0 py-0"> {{ SystemInfo::setting('description') }} </td>
                    </tr>
                    <tr>
                        <td class="border-0 mt-0 py-0"> {{ SystemInfo::setting('address') }} </td>
                    </tr>
                    <tr>
                        <td class="border-0 mt-0 py-0"> {{ SystemInfo::setting('phones') }} </td>
                    </tr>
                    <tr>
                        <td class="border-0 mt-0 py-0"> {{ SystemInfo::setting('email') }} </td>
                    </tr>
                </table>
            </div>

            <div class="col-2 ">
                <img src="{{ url('storage/images/' . SystemInfo::setting('logo')) }}" alt="{{ SystemInfo::setting('name') }}"
                    class=" m-auto" style="height: 80px;width:80px ;">
            </div>
            <div class="col-6 ">

            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="text-center">
            معلومات الطالب
        </h4>
    </div>

    <div class="container">

        <table class="table">
            <tr>
                <td class="border">اسم الطالب : {{SystemInfo::get_full_student_name($id)}}</td>
                <td class="border"> الرقم العائلي   : {{ $students->family_number->number}}</td>
                <td class="border">   اسم الأم   : {{ $students->mother }}</td>
                <td class="border">   الجنس   : {{ $students->gender}}</td>
            </tr>

            <tr>
                <td class="border" > تاريخ الميلاد: {{$students->date_of_birth}} </td>
                <td class="border" > مكان الميلاد: {{$students->place_of_birth}} </td>
                <td class="border" >   الجنسية: {{$students->nationality}} </td>
                <td class="border" >   العنوان: {{$students->address}} </td>

            </tr>

            <tr>
                <td class="border" >  المدينة: {{$students->city}} </td>
                <td class="border" >  الهواتف: {{$students->phone}} </td>
                <td class="border" >  تاريخ التسجيل: {{$students->registration_date}} </td>
                <td class="border" >  فصيلة الدم: {{$students->blood_group}} </td>
            </tr>
        </table>
        <div class="container">
            <p>
                <i class="fa-solid fa-book"></i>
                المعلومات الدراسية للطالب
            </p>
            <table class="table ">
                <tr>
                    <td class="border">#</td>
                    <td class="border">المرحلة الدراسية</td>
                    <td class="border">الصف  </td>
                    <td class="border">الشعبة  </td>
                    <td class="border">القسم  </td>
                    <td class="border"> تاريخ التسجيل  </td>
                    <td class="border"> الخصم الدائم  </td>
                    <td class="border"> الحالة  </td>
                </tr>
                @foreach ($student_schools as $student_school)
                <tr>
                    <td class="border">#</td>
                    <td class="border">{{$student_schools->levels->name}}</td>
                    <td class="border">{{$student_schools->levels->classes}}</td>
                    <td class="border">{{$student_schools->levels->groups}}</td>
                    <td class="border">{{$student_schools->levels->shifts}}</td>
                    <td class="border">{{$student_schools->levels->sections}}</td>
                    <td class="border">{{$student_schools->registered_date}}</td>
                    <td class="border">{{$student_schools->discount}}</td>
                    <td class="border">{{$student_schools->active}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="container">
            <p>
                <i class="fa-solid fa-info"></i>

            </p>

            <table class="table">
                <tr>
                    <td>#</td>
                    <td>الاسم</td>
                    <td>صلة القرابة</td>
                    <td>درجة القرابة</td>
                    <td>العنوان</td>
                    <td>البريد الإلكتروني</td>
                    <td> الهواتف  </td>
                    <td> الحالة  </td>
                </tr>
                @foreach ($student_rels as $item)
                <tr>
                    <td>#</td>
                    <td>الاسم</td>
                    <td>صلة القرابة</td>
                    <td>درجة القرابة</td>
                    <td>العنوان</td>
                    <td>البريد الإلكتروني</td>
                    <td> الهواتف  </td>
                    <td> الحالة  </td>
                </tr>
                @endforeach
            </table>
        </div>


        <div class="container">
            <p>
                <i class="fa-solid fa-info"></i>
                معلومات أقرباء الطالب
            </p>

            <table class="table">
                <tr>
                    <td>#</td>
                    <td>الاسم</td>
                    <td>صلة القرابة</td>
                    <td>درجة القرابة</td>
                    <td>العنوان</td>
                    <td>البريد الإلكتروني</td>
                    <td> الهواتف  </td>
                    <td> الحالة  </td>
                </tr>
                @foreach ($student_rels as $item)
                <tr>
                    <td>#</td>
                    <td>الاسم</td>
                    <td>صلة القرابة</td>
                    <td>درجة القرابة</td>
                    <td>العنوان</td>
                    <td>البريد الإلكتروني</td>
                    <td> الهواتف  </td>
                    <td> الحالة  </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

