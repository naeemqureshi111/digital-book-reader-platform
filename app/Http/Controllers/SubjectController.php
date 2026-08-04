<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('show-subject', compact('subjects'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:subjects,name',
    ]);

    Subject::create($request->only('name'));

    return redirect()->route('show-subject')->with('success', 'Subject created successfully.');
}

public function edit($id)
{
    $subject = Subject::findOrFail($id);
    return view('edit-subject', compact('subject'));
}

public function update(Request $request, $id)
{
    $subject = Subject::findOrFail($id);

    // Validate the request
    $request->validate([
        'name' => 'required|unique:subjects,name,' . $id,
    ]);

    // Update the subject
    $subject->name = $request->name;
    $subject->save();

    return redirect()->route('show-subject')->with('success', 'Subject updated successfully!');
}

public function destroy($id)
{
    $subject = Subject::findOrFail($id);
    $subject->delete();

    return redirect()->route('show-subject')->with('success', 'Subject deleted successfully!');
}

 

   
}
