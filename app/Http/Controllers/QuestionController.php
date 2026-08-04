<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Chapter;
use App\Models\User;
use App\Models\SchoolClass;
class QuestionController extends Controller
{
    public function setupForm()
{
    $classrooms = SchoolClass::all();
    $subjects = Subject::all(); // Only for admin

    return view('show-class-subject', compact('classrooms', 'subjects'));
}
public function showChapterForm()
{
    $classId = session('classroom_id');
    $subjectId = session('subject_id');

    if (!$classId || !$subjectId) {
        return redirect()->route('questions.setup')->with('error', 'Please select class and subject first.');
    }

    $chapters = Chapter::where('classroom_id', $classId)
                       ->where('subject_id', $subjectId)
                       ->get();

    return view('select-chapter', compact('chapters'));
}
public function storeChapterSession(Request $request)
{
    $request->validate([
        'chapter_id' => 'required|exists:chapters,id',
    ]);

    session(['chapter_id' => $request->chapter_id]);

    return redirect()->route('quest'); // Now go to the form
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

    return redirect()->route('chapter');
}


public function store(Request $request)
{
   $request->validate([
    'question_text' => 'required|string|max:100',
    'option_a' => 'required|string|max:25',
    'option_b' => 'required|string|max:25',
    'option_c' => 'required|string|max:25',
    'option_d' => 'required|string|max:25',
    'correct_option' => 'required|in:A,B,C,D',
    'image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:1024', // 1MB

]);



    $data = [
        'question_text' => $request->question_text,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_option' => $request->correct_option,
        'classroom_id' => session('classroom_id'),
        'subject_id' => session('subject_id'),
        'chapter_id' => session('chapter_id'),
    ];

    // Check if image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Get image dimensions
        list($width, $height) = getimagesize($image);
        if ($width > 280 || $height > 245) {
            return redirect()->back()->withErrors(['image' => 'Image must not exceed 280px width and 245px height.']);
        }

        // Save image to public/uploads/questions/
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/questions'), $imageName);

        $data['image_photo_url'] = 'uploads/questions/' . $imageName;
    }

    // Set user/admin ID
    if (auth()->guard('admin')->check()) {
        $data['admin_id'] = auth()->guard('admin')->id();
    } else {
        $data['user_id'] = auth()->id();
    }

    // Create question record
    Question::create($data);

    return redirect()->back()->with('success', 'Question Successfully added.');
}

public function edit($id)
{
    $question = Question::findOrFail($id);

    if (auth()->guard('admin')->check()) {
        return view('edit-question', compact('question'));
    }

    if (auth()->guard('web')->check()) {
        if ($question->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        return view('edit-question', compact('question'));
    }

    return redirect()->route('login')->with('error', 'Please login');
}


public function destroy($id)
{
    $question = Question::findOrFail($id);

    // Check permissions
    if (auth()->guard('admin')->check()) {
        // Admin can delete any question
        // No restrictions
    } elseif (auth()->guard('web')->check()) {
        // Users can delete only their own questions
        if ($question->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }
    } else {
        return redirect()->back()->with('error', 'Unauthorized');
    }

    // Delete image if exists
    if (!empty($question->image_photo_url) && file_exists(public_path($question->image_photo_url))) {
        unlink(public_path($question->image_photo_url));
    }

    $question->delete();

    return redirect()->back()->with('success', 'Question deleted successfully.');
}


    // Show grouped counts of questions by classroom and subject
    public function showQuestions(Request $request, $user_id = null)
    {
        if (auth()->guard('admin')->check()) {
            // Admin viewing specific user's questions summary
            if ($user_id) {
                $counts = Question::select('classroom_id', 'subject_id','chapter_id', \DB::raw('count(*) as total'))
                    ->where('user_id', $user_id)
                    ->groupBy('classroom_id', 'subject_id','chapter_id')
                    ->get();
            } else {
                // Admin viewing their own questions summary
                $adminId = auth()->guard('admin')->id();
                $counts = Question::select('classroom_id', 'subject_id','chapter_id', \DB::raw('count(*) as total'))
                    ->where('admin_id', $adminId)
                    ->groupBy('classroom_id', 'subject_id','chapter_id')
                    ->get();
            }
        } else {
            // User viewing their own questions summary
            $userId = auth()->id();
            $counts = Question::select('classroom_id', 'subject_id','chapter_id', \DB::raw('count(*) as total'))
                ->where('user_id', $userId)
                ->groupBy('classroom_id', 'subject_id','chapter_id')
                ->get();
            $user_id = $userId; // for Blade to generate links properly
        }

        $classrooms = SchoolClass::all();
        $subjects = Subject::all();
        $chapters = Chapter::all();

        return view('show-question', compact('counts', 'classrooms', 'subjects', 'chapters','user_id'));
    }

    // Show questions filtered by classroom and subject, optionally filtered by user_id
    public function showQuestionsByClassAndSubjectAndChapter(Request $request, $classroomId, $subjectId,$chapterId)
    {
        if (auth()->guard('admin')->check()) {
            $userId = $request->query('user_id');

            if ($userId) {
                // Admin viewing a user's questions
                $questions = Question::where('user_id', $userId)
                    ->where('classroom_id', $classroomId)
                    ->where('subject_id', $subjectId)
                    ->where('chapter_id', $chapterId)
                    ->get();
            } else {
                // Admin viewing their own questions
                $questions = Question::where('admin_id', auth()->guard('admin')->id())
                    ->where('classroom_id', $classroomId)
                    ->where('subject_id', $subjectId)
                     ->where('chapter_id', $chapterId)
                    ->get();
            }
        } else {
            // User viewing their own questions
            $questions = Question::where('user_id', auth()->id())
                ->where('classroom_id', $classroomId)
                ->where('subject_id', $subjectId)
                 ->where('chapter_id', $chapterId)
                ->get();
        }

        $classroom = SchoolClass::findOrFail($classroomId);
        $subject = Subject::findOrFail($subjectId);
        $chapter = Chapter::findOrFail($chapterId);

        return view('questions-list', compact('questions', 'classroom', 'subject','chapter'));
    }
public function update(Request $request, $id)
{
   $request->validate([
    'question_text' => 'required|string|max:100',
    'option_a' => 'required|string|max:25',
    'option_b' => 'required|string|max:25',
    'option_c' => 'required|string|max:25',
    'option_d' => 'required|string|max:25',
    'correct_option' => 'required|in:A,B,C,D',
    'image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:1024', // 1MB

]);


    $question = Question::findOrFail($id);

    // 🔒 Authorization Check
    if (auth()->guard('admin')->check()) {
        // Admin can edit any question — no restriction
    } elseif (auth()->guard('web')->check()) {
        if ($question->user_id != auth()->id()) {
            abort(403, 'Unauthorized: You can only update your own questions.');
        }
    } else {
        abort(403, 'Unauthorized access');
    }

    // 🖼️ Image handling
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        [$width, $height] = getimagesize($image);

        if ($width > 280 || $height > 245) {
            return redirect()->back()->withErrors(['image' => 'Image must not exceed 280px width and 245px height.']);
        }

        // Delete old image if it exists
        if ($question->image_photo_url && file_exists(public_path($question->image_photo_url))) {
            unlink(public_path($question->image_photo_url));
        }

        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/questions'), $filename);
        $question->image_photo_url = 'uploads/questions/' . $filename;
    }

    // ✏️ Update question data
    $question->question_text = $request->question_text;
    $question->option_a = $request->option_a;
    $question->option_b = $request->option_b;
    $question->option_c = $request->option_c;
    $question->option_d = $request->option_d;
    $question->correct_option = $request->correct_option;
    $question->save();

    // ✅ Redirect to question list for the same class + subject
    $routeParams = [
        'classroom' => $question->classroom_id,
        'subject' => $question->subject_id,
        'chapter' => $question->chapter_id,
    ];

    // 👤 If admin updated a user question, preserve user_id in redirect
    if ($question->user_id && auth()->guard('admin')->check()) {
        return redirect()
            ->route('questions.byClassSubjectChapter', $routeParams + ['user_id' => $question->user_id])
            ->with('success', 'Question updated successfully.');
    }

    return redirect()
        ->route('questions.byClassSubjectChapter', $routeParams)
        ->with('success', 'Question updated successfully.');
}
public function getQuizData(Request $request, $classId, $subjectName, $chapterId)
{
    $subject = Subject::whereRaw('LOWER(name) = ?', [strtolower($subjectName)])->first();

    if (!$subject) {
        return response()->json(['error' => 'Subject not found'], 404);
    }

    $questions = Question::where('subject_id', $subject->id)
        ->where('classroom_id', $classId)
        ->where('chapter_id', $chapterId)
        ->whereNotNull('image_photo_url')
        ->where('image_photo_url', '!=', '')
        ->whereRaw("image_photo_url NOT LIKE '%default.jpg%'")
        ->inRandomOrder()
        ->limit(10)
        ->get();

    if ($questions->count() < 10) {
        $additional = Question::where('subject_id', $subject->id)
            ->where('classroom_id', $classId)
            ->where('chapter_id', $chapterId)
            ->whereNotIn('id', $questions->pluck('id'))
            ->inRandomOrder()
            ->limit(10 - $questions->count())
            ->get();

        $questions = $questions->merge($additional);
    }

    return response()->json($questions->map(function ($q) {
        return [
            'question' => $q->question_text,
            'options' => [$q->option_a, $q->option_b, $q->option_c, $q->option_d],
            'answer' => $q->correct_option,
            'image' => $q->image_photo_url ? asset($q->image_photo_url) : null,
        ];
    }));
}

}