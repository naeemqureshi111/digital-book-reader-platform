<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\User;
use App\Models\SchoolClass;

class ChapterController extends Controller
{
   public function setupForm()
{
    $classrooms = SchoolClass::all();
    $subjects = Subject::all(); // Only for admin

    return view('show-class-subject-chapter', compact('classrooms', 'subjects'));
}
public function handleSetup(Request $request)
{
    $request->validate([
        'classroom_id' => 'required',
        'subject_id' => auth()->guard('admin')->check() ? 'required' : '',
    ]);

    session([
        'classroom_id' => $request->classroom_id,
        'subject_id' => auth()->guard('admin')->check() 
            ? $request->subject_id 
            : auth()->user()->subject_id,
    ]);

    return redirect()->route('chapt');
}


public function store(Request $request)
{
    $request->validate([
    'name' => 'required|string|max:255|unique:chapters,name',
]);
    $data = [
        'name' => $request->name,
        'classroom_id' => session('classroom_id'),
        'subject_id' => session('subject_id'),
    ];
    // Set user/admin ID
    if (auth()->guard('admin')->check()) {
        $data['admin_id'] = auth()->guard('admin')->id();
    } else {
        $data['user_id'] = auth()->id();
    }

    // Create question record
    Chapter::create($data);

    return redirect()->back()->with('success', 'Chapter Successfully added.');
}

public function edit($id)
{
    $chapter = Chapter::findOrFail($id);

    if (auth()->guard('admin')->check()) {
        return view('edit-chapter', compact('chapter'));
    }

    if (auth()->guard('web')->check()) {
        if ($chapter->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        return view('edit-chapter', compact('chapter'));
    }

    return redirect()->route('login')->with('error', 'Please login');
}


public function destroy($id)
{
    $chapter = Chapter::findOrFail($id);

    // Check permissions
    if (auth()->guard('admin')->check()) {
        // Admin can delete any question
        // No restrictions
    } elseif (auth()->guard('web')->check()) {
        // Users can delete only their own questions
        if ($chapter->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }
    } else {
        return redirect()->back()->with('error', 'Unauthorized');
    }

   
    $chapter->delete();

    return redirect()->back()->with('success', 'Chapter deleted successfully.');
}


    // Show grouped counts of questions by classroom and subject
    public function showChapters(Request $request, $user_id = null)
    {
        if (auth()->guard('admin')->check()) {
            // Admin viewing specific user's questions summary
            if ($user_id) {
                $counts = Chapter::select('classroom_id', 'subject_id', \DB::raw('count(*) as total'))
                    ->where('user_id', $user_id)
                    ->groupBy('classroom_id', 'subject_id')
                    ->get();
            } else {
                // Admin viewing their own questions summary
                $adminId = auth()->guard('admin')->id();
                $counts = Chapter::select('classroom_id', 'subject_id', \DB::raw('count(*) as total'))
                    ->where('admin_id', $adminId)
                    ->groupBy('classroom_id', 'subject_id')
                    ->get();
            }
        } else {
            // User viewing their own questions summary
            $userId = auth()->id();
            $counts = Chapter::select('classroom_id', 'subject_id', \DB::raw('count(*) as total'))
                ->where('user_id', $userId)
                ->groupBy('classroom_id', 'subject_id')
                ->get();
            $user_id = $userId; // for Blade to generate links properly
        }

        $classrooms = \App\Models\SchoolClass::all();
        $subjects = \App\Models\Subject::all();

        return view('show-chapter', compact('counts', 'classrooms', 'subjects', 'user_id'));
    }

    // Show questions filtered by classroom and subject, optionally filtered by user_id
    public function showChaptersByClassAndSubject(Request $request, $classroomId, $subjectId)
    {
        if (auth()->guard('admin')->check()) {
            $userId = $request->query('user_id');

            if ($userId) {
                // Admin viewing a user's questions
                $chapters = Chapter::where('user_id', $userId)
                    ->where('classroom_id', $classroomId)
                    ->where('subject_id', $subjectId)
                    ->get();
            } else {
                // Admin viewing their own questions
                $chapters = Chapter::where('admin_id', auth()->guard('admin')->id())
                    ->where('classroom_id', $classroomId)
                    ->where('subject_id', $subjectId)
                    ->get();
            }
        } else {
            // User viewing their own questions
            $chapters = Chapter::where('user_id', auth()->id())
                ->where('classroom_id', $classroomId)
                ->where('subject_id', $subjectId)
                ->get();
        }

        $classroom = \App\Models\SchoolClass::findOrFail($classroomId);
        $subject = \App\Models\Subject::findOrFail($subjectId);

        return view('chapters-list', compact('chapters', 'classroom', 'subject'));
    }
public function update(Request $request, $id)
{
    $request->validate([
       'name' => 'required|string|max:255|unique:chapters,name',
    ]);

    $chapter = Chapter::findOrFail($id);

    // 🔒 Authorization Check
    if (auth()->guard('admin')->check()) {
        // Admin can edit any question — no restriction
    } elseif (auth()->guard('web')->check()) {
        if ($chapter->user_id != auth()->id()) {
            abort(403, 'Unauthorized: You can only update your own chapters.');
        }
    } else {
        abort(403, 'Unauthorized access');
    }

    
    // ✏️ Update question data
    $chapter->name = $request->name;
    $chapter->save();

    // ✅ Redirect to question list for the same class + subject
    $routeParams = [
        'classroom' => $chapter->classroom_id,
        'subject' => $chapter->subject_id,
    ];

    // 👤 If admin updated a user question, preserve user_id in redirect
    if ($chapter->user_id && auth()->guard('admin')->check()) {
        return redirect()
            ->route('chapters.byClassSubject', $routeParams + ['user_id' => $chapter->user_id])
            ->with('success', 'Chapter updated successfully.');
    }

    return redirect()
        ->route('chapters.byClassSubject', $routeParams)
        ->with('success', 'Chapter updated successfully.');
}
}