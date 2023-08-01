<div class="sidebar" id="side_bav">
    <div class="header-box px-3 pt-3 pb-4">
        <h1 class="fs-4">
            <span class="bg-dark text-white rounded shadow px-2 me-2">CL</span>
            <span class="text-white">Coding League</span>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                <i class="fa fa-stream"></i>
            </button>
        </h1>
    </div>
    <ul class="list-unstyled px-2">
        <li class="px-2">
            <a href="" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-house"></i> <span>الرئيسية</span>
            </a>
        </li>

        <li class="px-2">
            <a href="{{ route('fathers.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-feather"></i> <span>الآباء</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('students.info') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-graduation-cap"></i> <span>الطلبة</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('levels.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-level-up"></i> <span>المراحل الدراسية</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('classes.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-puzzle-piece"></i> <span>المستويات</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('groups.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-layer-group"></i> <span>الشعب</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('shifts.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-brands fa-swift"></i> <span>الفترات</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('sections.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-snowflake"></i> <span>الأقسام</span>
            </a>
        </li>


    </ul>
    <hr class="text-light" />
    <ul class="list-unstyled px-2">

        <li class="px-2">
            <a href="{{ route('subjects.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-book-open-reader"></i> <span>المواد</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('exams.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-vials"></i> <span>الاختبارات</span>
            </a>
        </li>

        <li class="px-2">
            <a href="{{ route('employees.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-user-doctor"></i> <span>الموظفين</span>
            </a>
        </li>
        <li class="px-2">
            <a href="" class="nav-link dropdown-toggle px-sm-0 px-1 text-white  " id="dropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-wallet"></i> <span>المالية</span>
            </a>

            <ul class="dropdown-menu text-small   shadow text-end" aria-labelledby="dropdown" id="sub-menu">
                <li>
                    <a class="dropdown-item text-white" href="{{ route('fees.billing_cycle') }}">
                        <i class="fa fa-list"></i> <span> الدورة المالية </span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-white" href="{{ route('fees.index') }}">
                        <i class="fa fa-list"></i> <span> مالية الطلبة </span>
                    </a>
                </li>
                <li><a class="dropdown-item text-white" href="{{ route('sallary.index') }}">
                        <i class="fa fa-list"></i> <span> مالية الموظفين </span> </a>
                </li>
                <li><a class="dropdown-item text-white" href="{{ route('employee.debt') }}">
                        <i class="fa fa-list"></i> <span> طلب سلفة لموظف   </span> </a>
                </li>
                <li><a class="dropdown-item text-white" href="{{ route('employee.deduction') }}">
                    <i class="fa fa-list"></i> <span>   العقويات المالية لموظف   </span> </a>
            </li>


                <li><a class="dropdown-item text-white" href="{{ route('expenses.index') }}">
                        <i class="fa fa-list"></i> <span> المصروفات </span></a></li>
                <li><a class="dropdown-item text-white" href="{{ route('allowance.index') }}">
                        <i class="fa fa-list"></i> <span> العلاوات </span></a></li>
                <li><a class="dropdown-item text-white" href="{{ route('finance.reports.index') }}">
                        <i class="fa fa-list"></i> <span> التقارير المالية </span> </a></li>

            </ul>

        </li>
        <li class="px-2">
            <a href="{{ route('banks.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-bank"></i> <span> الخزينة </span>
            </a>
        </li>
        <li class="px-2">
            <a href="" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-users"></i> <span>الأعضاء</span>
            </a>
        </li>
    </ul>

    <hr class="text-light" />
    <ul class="list-unstyled px-2">
        <li class="px-2">
            <a href="" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-comment"></i> <span>التنبيهات</span>
            </a>
        </li>
        <li class="px-2">
            <a href="" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-list-ol"></i> <span>المهام</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('filesmanager.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-folder-open"></i> <span>مدير الملفات</span>
            </a>
        </li>
        <li class="px-2">
            <a href="{{ route('settings.index') }}" class="text-decoration-none pz-3 py-2 d-block text-white">
                <i class="fa-solid fa-gear"></i> <span>الإعدادات</span>
            </a>
        </li>

    </ul>
</div>
