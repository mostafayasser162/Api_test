<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = DB::table('departments')->get();
        return view('departments.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:50|min:3|unique:departments,name",
            'title' => "required|string|min:5",
        ]);
        //  model name
        Department::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
         // 'table name' => $request->input('name fel html'),
        ]);
        return redirect()->route('departments.index')->with('done', ' Department added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findorFail($id) ;
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findorFail($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|max:50|min:3",
            'title' => "required|string|min:5",
        ]);
        $department = Department::findorFail($id);
        $department->name = $request->name;
        $department->title = $request->title;
        $department->save();
        return redirect()->route('departments.index')->with('done', ' Department updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $department = Department::findorFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('done', ' Department deleted successfully ');
    }
}
