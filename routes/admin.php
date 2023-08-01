<?php

use App\Http\Controllers\Admin\BillingCycleController;
use App\Http\Controllers\Admin\EmployeeSallaryController;
use App\Http\Livewire\Admin\Banks;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\ExamsController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\levelsController;
use App\Http\Controllers\Admin\ShiftsController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\FamilyNumberController;
use App\Http\Controllers\Admin\StrurelController;
use App\Http\Controllers\Admin\FeesTypeController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\AllowanceController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\ExpensessController;
use App\Http\Controllers\Admin\StudentsFeeController;
use App\Http\Controllers\Admin\FilesmanagerController;
use App\Http\Controllers\Admin\Students_infoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [AdminController::class, 'loginFrm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);



Route::group(['middleware' => 'AdminAuth'], function () {



    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['prefix' => '/admin/levels'], function () {
        Route::get('/index', [levelsController::class, 'index'])->name('levels.index');
    });


    Route::group(['prefix' => '/admin/classes'], function () {
        Route::get('/index', [ClassesController::class, 'index'])->name('classes.index');
        Route::get('/print', [ClassesController::class, 'print'])->name('classes.print');
    });


    Route::group(['prefix' => '/admin/groups'], function () {
        Route::get('/index', [GroupsController::class, 'index'])->name('groups.index');
    });


    Route::group(['prefix' => '/admin/shifts'], function () {
        Route::get('/index', [ShiftsController::class, 'index'])->name('shifts.index');
    });


    Route::group(['prefix' => '/admin/sections'], function () {
        Route::get('/index', [SectionsController::class, 'index'])->name('sections.index');
    });

    Route::group(['prefix' => '/admin/subjects'], function () {
        Route::get('/', [SubjectsController::class, 'index'])->name('subjects.index');
        Route::get('/distribution', [SubjectsController::class, 'distribution'])->name('subjects.distribution');
    });

    Route::group(['prefix' => '/admin/banks'], function () {
        Route::get('/index', [BanksController::class, 'index'])->name('banks.index');
    });



    Route::group(['prefix' => '/admin/expenses'], function () {
        Route::get('/', [ExpensessController::class, 'index'])->name('expenses.index');
        Route::get('/type', [ExpensessController::class, 'type'])->name('expenses.type');
        Route::get('/feestype', [ExpensessController::class, 'index'])->name('expenses.feestype');
    });



    Route::group(['prefix' => '/admin/employee'], function () {
        Route::group(['prefix' => '/allowance'], function () {
            Route::get('/', [AllowanceController::class, 'index'])->name('allowance.index');
            Route::get('/type', [AllowanceController::class, 'type'])->name('allowance.type');
        });
        Route::group(['prefix' => '/sallary'], function () {
            Route::get('/', [EmployeeSallaryController::class, 'index'])->name('sallary.index');
        });


        Route::get('/debt', [EmployeesController::class, 'debt'])->name('employee.debt');
        Route::get('/deduction', [EmployeesController::class, 'deduction'])->name('employee.deduction');

});


    Route::group(['prefix' => '/admin/finance/reports'  ], function () {
        Route::controller(BillingCycleController::class)->group(function () {
            Route::get('/',  'index')->name('finance.reports.index');
            Route::get('/by-billing-cycle',  'by_billing_cycle')->name('finance.reports.by-billing-cycle');
        });
    });



    Route::group(['prefix' => '/admin/fees'], function () {

        Route::controller(StudentsFeeController::class)->group(function () {

            Route::get('/',  'index')->name('fees.index');
            Route::get('/type',  'types')->name('fees.type');
            Route::get('/feesvalue',  'feesvalue')->name('fees.feesvalue');
            Route::get('/billing-cycle',  'billing_cycle')->name('fees.billing_cycle');
            Route::get('/feeclasstran',  'feeclasstran')->name('fees.feeclasstran');
            Route::get('/fee-delete-for-class',  'feedelete_for_class')->name('fees.feedelete_for_class');
            Route::get('/fee-paid',  'feepaid')->name('fees.feepaid');
            Route::get('/fee-paid-tracking/{id}/{stu_id}',  'feepaidtracking')->name('fees.fee-paidtracking');
            Route::get('/fee-paid-tracking-pdf/{id}/{stu_id}',  'feepaidtracking_pdf')->name('fees.fee-paidtracking-pdf');
            Route::get('/fee-paid-tracking-pdfs/{id}/{stu_id}',  'pdfMake')->name('fees.fee-generate-pdf');
            Route::get('/fee-paid-pdf/{id}/{stu_id}',  'printStudentInfo')->name('fees.fee-paid-pdf');




            Route::get('/index-report', 'index_report')->name('fees.index-report');
            Route::get('/class-report', 'class_report')->name('fees.class-report');
        });


    });



    Route::group(['prefix' => '/admin/family-number'], function () {
        Route::get('/', [FamilyNumberController::class, 'index'])->name('fathers.index');
    });



    Route::group(['prefix' => '/admin/settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('/manage-logo', [SettingsController::class, 'manageLogo'])->name('settings.manage_logo');
    });

    Route::group(['prefix' => '/admin/filesmanager'], function () {
        Route::get('/', [FilesmanagerController::class, 'index'])->name('filesmanager.index');
    });



    Route::group(['prefix' => '/admin/students'], function () {
        Route::get('/info', [Students_infoController::class, 'index'])->name('students.info');
        Route::get('/current-student-info-print/{id}', [Students_infoController::class, 'printStudentInfo'])->name('students.surrent.info.pdf');
        Route::get('/student-upgrade', [Students_infoController::class, 'upgrade'])->name('students.upgrade');
        Route::get('/student-list', [Students_infoController::class, 'list'])->name('students.list');
        Route::get('/student-list-export', [Students_infoController::class, 'list'])->name('students.list.export');
        Route::get('/register/{fat_id}', [Students_infoController::class, 'register'])->name('students.register');
        Route::get('/strurel/{id}', [StrurelController::class, 'index'])->name('strurel.index');
        Route::get('/helth-record/{id}', [Students_infoController::class, 'helth_record'])->name('helth.record');
        Route::get('/school-record/{stu_id}', [Students_infoController::class, 'school_record'])->name('school.record');
        Route::get('/attachment/{stu_id}', [Students_infoController::class, 'student_attachment'])->name('student.attachment');
    });



    Route::group(['prefix' => '/admin/employees'], function () {
        Route::get('/index', [EmployeesController::class, 'index'])->name('employees.index');
        Route::get('/info', [EmployeesController::class, 'info'])->name('employees.info');
        Route::get('/info/register', [EmployeesController::class, 'register'])->name('employees.register');
        Route::get('/info/update/{id}', [EmployeesController::class, 'update'])->name('employees.update');
        Route::get('/attachment/{emp_id}', [EmployeesController::class, 'attachments'])->name('employees.attachment');
        Route::get('/jobs/{emp_id}', [EmployeesController::class, 'jobs'])->name('employees.jobs');

        Route::get('/sections', [EmployeesController::class, 'sections'])->name('employees.sections');
        Route::get('/levels', [EmployeesController::class, 'levels'])->name('employees.levels');
        Route::get('/finance/{emp_id}', [EmployeesController::class, 'finance'])->name('employees.finance');
    });


    Route::group(['prefix' => '/admin/exams'], function () {
        Route::get('/index', [ExamsController::class, 'index'])->name('exams.index');
        Route::get('/student/pdf/{students_info_id}/{classes_id}', [ExamsController::class, 'studentToPdf'])->name('exams.student.pdf');
    });
});
