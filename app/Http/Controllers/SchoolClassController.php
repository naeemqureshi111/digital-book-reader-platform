<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        return view('show-class', compact('classes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:classes,name',
    ]);

    SchoolClass::create($request->only('name'));

    return redirect()->route('show-class')->with('success', 'Class created successfully.');
}


    public function edit($id)
{
    $class = SchoolClass::findOrFail($id);
    return view('edit-class', compact('class'));
}


    public function update(Request $request, $id)
{
    $class = SchoolClass::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255|unique:classes,name,' . $id,
    ]);

    $class->update([
        'name' => $request->name,
    ]);

    return redirect()->route('show-class')->with('success', 'Class updated successfully.');
}



   public function destroy($id)
{
    $class = SchoolClass::findOrFail($id);
    $class->delete();

    return redirect()->route('show-class')->with('success', 'Class deleted successfully.');
}

}
