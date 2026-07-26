<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 1. Homepage Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/student/login');
});

// 2. Student Authentication Routes
Route::get('/student/login', [StudentController::class, 'loginForm']);
Route::post('/student/login', [StudentController::class, 'login']);

// 3. Student Dashboard & Profile Routes
Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
Route::get('/student/profile', [StudentController::class, 'showProfile']);
Route::post('/student/profile', [StudentController::class, 'saveProfile']);

// 4. Vacancies & Attachment Application Routes
Route::get('/student/vacancies', [StudentController::class, 'showVacancies']);
Route::get('/student/register', [StudentController::class, 'create']);
Route::post('/student/register', [StudentController::class, 'applyForJob']);
Route::get('/student/track', [StudentController::class, 'showApplications']);

// 5. Admin Management Routes
Route::get('/admin/dashboard', [StudentController::class, 'adminDashboard']);
Route::post('/admin/applications/{id}/status', [StudentController::class, 'updateStatus']);

// Admin Login View Route
Route::get('/admin/login', function() {
    return view('admin.login');
});

// Admin Login Submission Action Route
Route::post('/admin/login', function(\Illuminate\Http\Request $request) {
    if ($request->email === 'admin@nita.go.ke' && $request->password === 'admin123') {
        session([
            'admin_logged_in' => true,
            'is_admin' => true,
            'admin_name' => 'System Administrator'
        ]);
        return redirect('/admin/dashboard');
    }
    return redirect()->back()->with('error', 'Invalid administrative credentials.');  

});
Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
Route::get('/company/post-vacancy', [CompanyController::class, 'postVacancy'])->name('company.post_vacancy');
Route::get('/company/applicants', [CompanyController::class, 'applicants'])->name('company.applicants');

Route::post('/company/post-vacancy', function (Request $request) {
    // Validate that the fields are filled
    $request->validate([
        'title' => 'required',
        'duration' => 'required',
        'location' => 'required',
        'description' => 'required',
    ]);

    // Insert directly into our fresh database table row layout
    DB::table('vacancies')->insert([
        'title' => $request->input('title'),
        'duration' => $request->input('duration'),
        'location' => $request->input('location'),
        'description' => $request->input('description'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect()->back()->with('success', 'Vacancy published to the student portal successfully!');
});

// Company Login Routes
Route::get('/company/login', function () {
    return view('company.login');
});

Route::post('/company/login', [CompanyController::class, 'login']);

// Define this route in routes/web.php
Route::get('/company/applicants/{id}/profile', [CompanyController::class, 'viewStudentProfile'])
     ->name('company.student.profile');