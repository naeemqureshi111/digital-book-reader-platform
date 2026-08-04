<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminorUserMiddleware;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\InstructionController;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Instruction;
use App\Models\SubjectLink;
use App\Http\Controllers\SubjectLinkController;


//public 
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login-data', [LoginController::class, 'login'])->name('login-data');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');

// This sends the email with reset link
Route::post('/reset-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// This shows the reset form with token
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

// This handles the form submission
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');



//fronted
Route::get('/{subjectName}/{randomCode}/{classId}', function ($subjectName, $randomCode, $classId) {
    $subject = DB::table('subjects')->where('name', $subjectName)->first();

    if (!$subject) {
        return view('index', [
            'subjectName' => '',
            'classId' => '',
            'instruction' => null,
            'error' => 'Invalid subject name.'
        ]);
    }

    $link = SubjectLink::where('subject_id', $subject->id)
                      ->where('class_id', $classId)
                      ->where('random_code', $randomCode)
                      ->first();

    if (!$link) {
        return view('index', [
            'subjectName' => '',
            'classId' => '',
            'instruction' => null,
            'error' => 'Invalid random code or class ID.'
        ]);
    }



    // ✅ Fetch the instruction
    $instruction = Instruction::where('subject_id', $subject->id)
                              ->where('class_id', $classId)
                              ->first();

    return view('index', [
        'subjectName' => $subject->name,
        'classId' => $classId,
        'instruction' => $instruction,
        'error' => null
    ]);
})->where([
    'subjectName' => '[A-Za-z0-9_-]+',
    'randomCode' => '[A-Za-z0-9]+',
    'classId' => '[0-9]+',
]);

Route::get('/Quiz/first-page/{subjectName}/{classId}', function ($subjectName, $classId) {
    return view('Quiz.first-page', compact('subjectName', 'classId'));
});
Route::get('/Quiz/chapters/{subjectName}/{classId}', function ($subjectName, $classId) {
    $subject = Subject::where('name', $subjectName)->first();

    $chapters = collect();
    if ($subject) {
        $chapters = Chapter::where('subject_id', $subject->id)
            ->where('classroom_id', $classId)
            ->orderBy('id')
            ->get();
    }

    return view('Quiz.chapters', compact('chapters', 'subjectName', 'classId'));
});

Route::get('/quiz-data/{classId}/{subjectName}/{chapterId}', [QuestionController::class, 'getQuizData']);


Route::get('/Quiz/page1/{subjectName}/{classId}/{chapterId}', function ($subjectName, $classId, $chapterId) {
    // First, get subject_id from subject name
    $subject = DB::table('subjects')->where('name', $subjectName)->first();

    if (!$subject) {
        return "Invalid subject";
    }

    // Then fetch questions using correct column names
    $questions = DB::table('questions')
        ->where('subject_id', $subject->id)
        ->where('classroom_id', $classId)
        ->where('chapter_id', $chapterId)
        ->get();

    return view('Quiz.page1', [
        'subjectName' => $subjectName,
        'classId' => $classId,
        'chapterId' => $chapterId,
        'questions' => $questions
    ]);
});


Route::get('/Quiz/page2/{subjectName}/{classId}/{chapterId}', function ($subjectName, $classId, $chapterId) {
    return view('Quiz.page2', compact('subjectName', 'classId', 'chapterId'));
});

Route::get('/quiz/backpage', function () {
    return view('Quiz.backpage');
})->name('quiz.backpage');




//admin
Route::middleware([AdminMiddleware::class])->group(function () {

//author
Route::get('/author', [UserController::class, 'showRegisterForm'])->name('author');
Route::get('/admin-dashboard', [UserController::class, 'index'])->name('admin-dashboard');
Route::post('/add-author', [UserController::class, 'store'])->name('register');
Route::get('authors/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('authors/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('authors/{id}', [UserController::class, 'destroy'])->name('users.destroy');



// subject
Route::get('/subject', function () {
    return view('subject');
})->name('subject');
Route::get('/show-subject', [SubjectController::class, 'index'])->name('show-subject');
Route::post('/add-subject', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

//class
Route::get('/class', function () {
    return view('class');
})->name('class');
Route::get('/show-class', [SchoolClassController::class, 'index'])->name('show-class');
Route::post('/add-class', [SchoolClassController::class, 'store'])->name('classes.store');
Route::get('/classes/{class}/edit', [SchoolClassController::class, 'edit'])->name('classes.edit');
Route::put('/update-class/{id}', [SchoolClassController::class, 'update'])->name('update-class');
Route::delete('/classes/{id}', [SchoolClassController::class, 'destroy'])->name('classes.destroy');


//chapters
 Route::get('chapter-form', function () {
    return view('chapter');
})->name('chapt');
    Route::get('/chapter', [ChapterController::class, 'setupForm'])->name('chapters.setup');
    Route::post('/chapt-form', [ChapterController::class, 'handleSetup'])->name('chapters.handleSetup');
    Route::post('/chapters', [ChapterController::class, 'store'])->name('chapters.store');
 Route::get('/chapters/{id}/edit', [ChapterController::class, 'edit'])->name('chapters.edit');
Route::get('/show-chapter/{user_id?}', [ChapterController::class, 'showChapters'])->name('show-chapter');
Route::get('/subject/chapters/{classroom}/{subject}', [ChapterController::class, 'showChaptersByClassAndSubject'])->name('chapters.byClassSubject');


Route::put('/chapters/{id}', [ChapterController::class, 'update'])->name('chapters.update');
Route::delete('/chapters/{id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');



//instructions
Route::get('/instruction', [InstructionController::class, 'create'])->name('instructions.create');
Route::post('/instructions', [InstructionController::class, 'store'])->name('instructions.store');
Route::get('/show-instruction', [InstructionController::class, 'index'])->name('instructions.index');

Route::get('/instructions/create', [InstructionController::class, 'create'])->name('instructions.create');
Route::post('/instructions', [InstructionController::class, 'store'])->name('instructions.store');
Route::get('/instructions/{id}/edit', [InstructionController::class, 'edit'])->name('instructions.edit');
Route::put('/instructions/{id}', [InstructionController::class, 'update'])->name('instructions.update');
Route::delete('/instructions/{id}', [InstructionController::class, 'destroy'])->name('instructions.destroy');


});


//admin&user both
Route::middleware([AdminorUserMiddleware::class])->group(function () {
    Route::get('open-form', function () {
    return view('question');
})->name('quest');
 Route::get('/question', [QuestionController::class, 'setupForm'])->name('questions.setup');
Route::post('/question-form', [QuestionController::class, 'handleSetup'])->name('questions.handleSetup');
    // Store a new question
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

// Show questions grouped by class & subject (for admin or user)
Route::get('/show-question/{user_id?}', [QuestionController::class, 'showQuestions'])->name('show-question');

// Show questions filtered by classroom and subject (with optional user_id query param)
Route::get('/questions/{classroom}/{subject}/{chapter}', [QuestionController::class, 'showQuestionsByClassAndSubjectAndChapter'])->name('questions.byClassSubjectChapter');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

Route::get('/select-chapter', [QuestionController::class, 'showChapterForm'])->name('chapter');
Route::post('/store-chapter-session', [QuestionController::class, 'storeChapterSession'])->name('questions.storeChapterSession');

});

Route::get('/clear', function() {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'Cleared!';
});

// Add temporarily in web.php
Route::get('/fix-session', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Session fixed';
});



Route::get('/generate-links', [SubjectLinkController::class, 'generateLinks']);

