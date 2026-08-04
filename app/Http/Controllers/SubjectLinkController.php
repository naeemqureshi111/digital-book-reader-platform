<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\SchoolClass; // or App\Models\StudentClass if that's your class table
use App\Models\SubjectLink;

class SubjectLinkController extends Controller
{
    public function generateLinks()
    {
        $subjects = Subject::all();
        $classes = SchoolClass::all(); // replace with your actual model name

        foreach ($subjects as $subject) {
            foreach ($classes as $class) {
                $exists = SubjectLink::where('subject_id', $subject->id)
                                     ->where('class_id', $class->id)
                                     ->first();
                if (!$exists) {
                    do {
                        $rand = rand(10000, 99999);
                    } while (SubjectLink::where('random_code', $rand)->exists());

                    SubjectLink::create([
                        'subject_id' => $subject->id,
                        'class_id' => $class->id,
                        'random_code' => $rand
                    ]);
                }
            }
        }

        return "✅ All subject-class links with unique random codes have been generated.";
    }
}
