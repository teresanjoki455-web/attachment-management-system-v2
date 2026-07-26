<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function postVacancy()
    {
         // Fetch the data
        $dbvacancies = DB::table('vacancies')->get();

         // Open the correct view with underscore, passing the data
        return view('company.post_vacancy', compact('dbvacancies')); 
    
         
    }


    public function applicants()
    {
        $applications = DB::table('applications')->get();

     return view('company.applicants', compact('applications'));
    }
  public function login(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Find company by email only
    $company = DB::table('companies')
        ->where('email', $request->email)
        ->first();
        dd($company);

    // Check if company exists and password matches
    if ($company && Hash::check($request->password, $company->password)) {

        session([
            'company_id' => $company->id
        ]);

        return redirect('/company/dashboard');
    }

    return back()->with('error', 'Invalid email or password.');
}

    public function viewStudentProfile($id)
    {
        /**
         * Display the profile of a specific student applicant.
         */
        // 1. Fetch the student's details from the 'students' table using their ID
        $student = DB::table('students')->where('id', $id)->first();

     // 2. If the student doesn't exist in the database, show a 404 error page
     if (!$student) {
        abort(404, 'Student profile not found.');
     }
     // 3. Define $user as well, in case your student view file uses $user
        $user = $student;

     // 4. Pass the student data to a blade view file named 'company/student-profile.blade.php'
     return view('student.profile', compact('student'));
    }
}    
