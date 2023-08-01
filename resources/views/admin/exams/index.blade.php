@extends('admin.layouts.loged-master')
@section('content')
    <div class="container-fluid mt-5 px-0  m-atuo" >
        <div class="d-flex align-items-start   p-0 ">
            <div class="nav exams-section flex-column nav-pills p-0 border border-end-0 border-top-0 border-bottom-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link border-0 pe-1 ps-3 rounded-0 my-0 text-end  " id="v-pills-classes-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-classes" type="button" role="tab" aria-controls="v-pills-classes"
                    aria-selected="true"> اختبار جديد   </button>

                <button class="nav-link border-0 pe-1 ps-3 rounded-0 my-0 text-end active" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false"> العمل على اختبار </button>
                <button class="nav-link border-0 pe-1 ps-3 rounded-0 my-0 text-end " id="v-pills-messages-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">التقارير </button>
            </div>
            <div class="tab-content px-3 py-0 m-0 container" id="v-pills-tabContent">
                <div class="tab-pane fade  " id="v-pills-classes" role="tabpanel" aria-labelledby="v-pills-classes-tab">
                    @include('admin.exams.class-exam')
                 </div>
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    @include('admin.exams.reports')
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                    asdcasdc
                </div>
            </div>
        </div>
    </div>
@endsection
