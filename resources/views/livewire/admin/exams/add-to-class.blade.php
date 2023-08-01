<div id="app" class="container mt-1">
    <div class="card rounded-0 border-0 shadow-0">
        <div class="card-header bg-white"> اضافة اختبار</div>
        <div class="container m-auto py-3 text-dark bg-white   p-2 border-bottom">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="card shadow-0 rounded-0 border border-end-0   border-top-0 border-bottom-0">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" id="frm1">
                                <div class="form-group"><label for="lev_id"> اختر المرحلة </label>

                                    <select name="lev_id" id="lev_id" class="form-control rounded-0 "
                                        wire:model="levels">
                                        <option selected>اختر المرحلة</option>
                                        @foreach ($getAllLevels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group"><label for="dep_id"> الصف الدراسي </label>
                                    <select name="dep_id" id="dep_id" class="form-control rounded-0 "
                                        wire:model="classes_id">
                                        <option selected> اختر الصف الدراسي </option>
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="dep_id"> المادة </label> <select name="dep_id"
                                        id="dep_id" class="form-control rounded-0 "
                                        wire:model="subjects_distributions_id">
                                        <option selected> اختر المادة </option>
                                        @foreach ($subjects_distributions as $subjects_distribution)
                                            <option value="{{ $subjects_distribution->id }}">
                                                {{ $subjects_distribution->subjects->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="cls_id"> الفترة </label> <select name="cls_id"
                                        id="cls_id" class="form-control rounded-0 " wire:model="shifts_id">
                                        <option selected> اختر الفترة الدراسية </option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}">
                                                {{ $group->name }}</option>
                                        @endforeach
                                    </select></div>
                                <div class="form-group"><label for="grp_id"> المجموعة </label>
                                    <select name="grp_id" id="grp_id" class="form-control rounded-0 "
                                        wire:model="groups_id">
                                        <option selected> اختر المجموعة </option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}">
                                                {{ $shift->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="sec_id"> القسم </label> <select name="sec_id"
                                        id="sec_id" class="form-control rounded-0 " wire:model="sections_id">
                                        <option selected> اختر القسم </option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">
                                                {{ $section->name }}</option>
                                        @endforeach
                                    </select></div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9">
                    @if (count($students) > 0)

                    <span class="float-start">

                            <a href="{{route('students.list.export')}}" class="btn btn-danger shadow-lg">
                                تصدير ملف الطلبة
                            </a>

                    </span>

                    <br><br>
                    <form>
                        <label for="file" class="w-100 bg-info rounded-0 border-0 p-5 text-light fw-bold text-center h1"     >
                                <i class="fa-solid fa-upload fw-b"></i>
                        </label>
                        <input type="file" name="file" id="file" class="d-none">
                        <button class="btn btn-danger py-3 col-12 m-auto  shadow fw-bold">
                                <i class="fa-solid fa-arrow-up fw-bold"></i>
                                <span >  رفع  الملف   </span>
                        </button>
                    </form>
                    @else
                        <div class="alert alert-danger text-center">
                            لا توجد بيانات لعرضها
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
