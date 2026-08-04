<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Instruction;

class InstructionController extends Controller

{
    
    public function index()
{
    $instructions = Instruction::with('subject', 'class')->get();
    return view('show-instruction', compact('instructions'));
}

    public function create()
{
    $subjects = Subject::all();
    $classes = SchoolClass::all(); // rename to match your class table

    return view('instruction', compact('subjects', 'classes'));
}

public function store(Request $request)
{
    $request->validate([
        'subject_id' => 'required|exists:subjects,id',
        'class_id' => 'required|exists:classes,id',
        'content' => 'required|string',
    ]);

    Instruction::updateOrCreate(
        ['subject_id' => $request->subject_id, 'class_id' => $request->class_id],
        ['content' => $request->content]
    );

    return redirect()->back()->with('success', 'Instruction saved successfully.');
}

public function edit($id)
{
    $instruction = Instruction::findOrFail($id);
    $subjects = Subject::all();
    $classes = SchoolClass::all();
    return view('edit-instruction', compact('instruction', 'subjects', 'classes'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'subject_id' => 'required|exists:subjects,id',
        'class_id' => 'required|exists:classes,id',
        'content' => 'required|string',
    ]);

    $instruction = Instruction::findOrFail($id);
    $instruction->update([
        'subject_id' => $request->subject_id,
        'class_id' => $request->class_id,
        'content' => $request->content
    ]);

    return redirect()->route('instructions.index')->with('success', 'Instruction updated successfully.');
}
public function destroy($id)
{
    $instruction = Instruction::findOrFail($id);
    $instruction->delete();

    return redirect()->back()->with('success', 'Instruction deleted successfully.');
}


}
