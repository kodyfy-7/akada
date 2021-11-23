<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', [App\Http\Controllers\TimeTableController::class, 'index'])->name('welcome');*/

Route::get('/', function(){
    return view('welcome');
});

Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
/*Route::match(['get', 'post'], 'login', function(){
    return redirect('/');
});

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});*/
// Admin routes
Route::prefix('admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Users\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');  

    Route::resource('/classrooms', App\Http\Controllers\Users\Admin\ClassroomController::class);
    
    Route::get('/data-per-class', [App\Http\Controllers\Users\Admin\ClassroomController::class, 'get_data_per_class'])->name('get.data.per.class');

    Route::post('/subjects-per-class', [App\Http\Controllers\Users\Admin\ClassroomController::class, 'save_subject'])->name('classrooms.save.subject');

    Route::resource('/subjects', App\Http\Controllers\Users\Admin\SubjectController::class);

    Route::resource('/timetables', App\Http\Controllers\Users\Admin\TimetableController::class);

    Route::get('/time-data-per-class', [App\Http\Controllers\Users\Admin\TimetableController::class, 'get_time_data_per_class'])->name('get.time.data.per.class');

    Route::resource('/employees', App\Http\Controllers\Users\Admin\EmployeeController::class);

    Route::get('/admissions', [App\Http\Controllers\Users\Admin\AdmissionController::class, 'index'])->name('admission.index');

    Route::post('/admissions', [App\Http\Controllers\Users\Admin\AdmissionController::class, 'process_admission'])->name('process_admission');
    
    Route::get('/student-profile', [App\Http\Controllers\Users\Admin\StudentController::class, 'profile'])->name('student.profile');
    
    Route::get('/settings', [App\Http\Controllers\Users\Admin\SettingController::class, 'index'])->name('settings.index');
    
    Route::post('/year-upgrade', [App\Http\Controllers\Users\Admin\SettingController::class, 'year_upgrade'])->name('year.upgrade');
    
    Route::post('/admission-status', [App\Http\Controllers\Users\Admin\SettingController::class, 'admission_status'])->name('admission.status');
    
    Route::post('/year-settings', [App\Http\Controllers\Users\Admin\SettingController::class, 'year_settings'])->name('year.settings');
    
    Route::post('/result-status', [App\Http\Controllers\Users\Admin\SettingController::class, 'result_status'])->name('result.status');
});

// Teacher routes
Route::prefix('teacher')->group(function(){
    Route::get('/', [App\Http\Controllers\Users\Teacher\TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [App\Http\Controllers\Auth\TeacherLoginController::class, 'login'])->name('teacher.login.submit');  

    Route::resource('/attendance', App\Http\Controllers\Users\Teacher\AttendanceController::class);

    Route::get('/subject-result', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'result'])->name('subject-result');

    Route::get('/subject-result-per-class', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'get_result_per_class'])->name('get.result.per.class');

    Route::post('/subject-result-per-class', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'store'])->name('subject.result.per.class');

    Route::get('/subject-total-result-per-class', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'get_total_result_per_class'])->name('get.total.result.per.class');

    Route::get('/subject-total-result-per-class/all', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'get_total_result_per_class_all'])->name('get.total.result.per.class.all');

    Route::post('/subject-total-result-per-class/all', [App\Http\Controllers\Users\Teacher\SubjectResultController::class, 'sum_subject_total_per_class'])->name('sum.subject.total.per.class');

    Route::get('/classroom-result', [App\Http\Controllers\Users\Teacher\ClassroomResultController::class, 'result'])->name('classroom-result');

    Route::get('/classroom-result/{result_slug}', [App\Http\Controllers\Users\Teacher\ClassroomResultController::class, 'show'])->name('classroom-result.show');
    
    Route::post('/compile-result-for-student', [App\Http\Controllers\Users\Teacher\ClassroomResultController::class, 'update_result'])->name('update.result');

});

// Student routes
Route::prefix('student')->group(function(){
    Route::get('/', [App\Http\Controllers\Users\Student\StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'login'])->name('student.login.submit');  

    Route::get('/timetable', [App\Http\Controllers\Users\Student\TimetableController::class, 'index'])->name('student.timetable');

    Route::get('/result', [App\Http\Controllers\Users\Student\ResultController::class, 'index'])->name('get.my.result');

    Route::get('/result/class', [App\Http\Controllers\Users\Student\ResultController::class, 'get_my_result_per_class'])->name('get.my.result.per.class');

    Route::get('/transactions', [App\Http\Controllers\Users\Student\TransactionController::class, 'index'])->name('my.transaction');

    Route::post('/deposit', [App\Http\Controllers\Users\Student\TransactionController::class, 'deposit'])->name('transaction.deposit');

    Route::post('/withdraw', [App\Http\Controllers\Users\Student\TransactionController::class, 'withdraw'])->name('transaction.withdraw');

    Route::post('/fee/payment', [App\Http\Controllers\Users\Student\TransactionController::class, 'fee_payment'])->name('fee.payment');


});
