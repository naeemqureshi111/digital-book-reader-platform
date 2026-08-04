<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolClass; // Assuming you have a model for classes
class UserController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        $subjects = Subject::all();
        return view('author', compact('subjects'));
    }

    // Display all users
  public function index()
{
    // Load all users with subjects and questions
    $users = User::with(['subject', 'questions'])->get();

    $totalUsers = User::count();
    $totalClasses = SchoolClass::count();  // Assuming SchoolClass is the correct model
    $totalSubjects = Subject::count();

    $totalAdminQuestions = Question::whereNotNull('admin_id')->count();
    $totalUserQuestions = Question::whereNotNull('user_id')->count();

    return view('admin-dashboard', compact(
        'users',
        'totalUsers',
        'totalClasses',
        'totalSubjects',
        'totalAdminQuestions',
        'totalUserQuestions'
    ));
}


    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8',
            'mobile'     => ['required', 'digits:10'],
            'subject_id' => 'required|integer'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'mobile'     => $request->mobile,
            'subject_id' => $request->subject_id
        ]);

        return redirect()->route('admin-dashboard')->with('success', 'User created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $subjects = Subject::all();
        return view('edit-author', compact('user', 'subjects'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $id,
            'mobile'     => ['required', 'digits:10'],
            'subject_id' => 'required|integer',
            'password'   => 'nullable|min:8'  // Optional password update
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->mobile     = $request->mobile;
        $user->subject_id = $request->subject_id;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin-dashboard')->with('success', 'User updated successfully!');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin-dashboard')->with('success', 'User deleted successfully!');
    }
}
