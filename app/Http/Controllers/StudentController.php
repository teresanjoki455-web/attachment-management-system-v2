<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * 1. Show the registration page (Sign Up)
     */
    public function create()
    {
        return view('student.register');
    }

    /**
     * 2. Store a brand new account (Sign Up form submission)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/student/login')->with('success', 'Account created! Please log in.');
    }

    /**
     * 3. Student Dashboard Home View
     */
    public function dashboard()
    {
        return view('student.dashboard');
    }

    /**
     * 4. Profile Management View (Where they fill out course and skills)
     */
    public function showProfile()
    {
        $student = Student::find(session('student_id')) ?? new Student();
        return view('student.profile', compact('student'));
    }

    /**
     * 5. Save Profile Details (Course, Skills, CV)
     */
    public function saveProfile(Request $request)
    {
        $student = Student::find(session('student_id'));
        
        if ($student) {
            $cvPath = $student->cv;
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cvs', 'public');
            }

            $student->update([
                'phone' => $request->phone,
                'course' => $request->course,
                'skills' => $request->skills,
                'cv' => $cvPath,
            ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * 6. View Vacancies (The page that was working before!)
     */
    public function showVacancies()
    {
        return view('student.vacancies');
    }

    /**
     * 7. Submit Attachment Application (The one asking for Company & Position)
     */
    public function applyForJob(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
        ]);

       // Matched perfectly with your exact phpMyAdmin columns in the screenshot
       // dd(session('student_id')); 
        \Illuminate\Support\Facades\DB::table('applications')->insert([
           'student_id' => auth()->id() ?? session('student_id') ?? 1,
            'company_name' => $request->company_name,
            'job_title'    => $request->job_title,
            'status'       => 'Pending Review',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect('/student/track')->with('success', 'Application submitted successfully!');
    }

    /**
     * 8. Track Applications Grid (Displays Name, Company, Position, Status)
     */
    public function showApplications()
    {
        $applications = DB::table('applications')
        ->join('students', 'applications.student_id', '=', 'students.id')
        ->select(
            'applications.*',
            'students.name'
        )
        ->get();

     return view('student.track', compact('applications'));
    }

   /**
     * Display the Admin Dashboard View
     */
    public function adminDashboard()
    {
        // 🚨 SECURITY GATE: Check if the logged-in user is actually an admin!
        if (!session()->has('admin_logged_in') || session('is_admin') !== true) {
            // Block them and redirect directly to the secure sign-in page
            return redirect('/admin/login')->with('error', 'Unauthorized access! Admin credentials required.');
        }

        // If they pass the check, allow them to load the database registry rows
        $allApplications = \Illuminate\Support\Facades\DB::table('applications')->get();
        return view('admin.dashboard', compact('allApplications'));
    }
    /**
     * 10. Admin Status Updating
     */
    public function updateStatus(Request $request, $id)
    {
        $application = Application::find($id);

        if ($application) {
            $application->update([
                'status' => $request->status,
            ]);
        }

        return redirect('/admin/dashboard');
    }
 public function loginForm()
{
    return view('student.login');
}

public function login(Request $request)
{
    $student = DB::table('students')
        ->where('email', $request->username)
        ->orWhere('id', $request->username)
        ->first();

    if ($student && $request->password === $student->password) {

        session(['student_id' => $student->id]);

        return redirect('/student/dashboard');
    }

    return back()->with('error', 'Invalid Student ID/Email or Password.');
}
}
