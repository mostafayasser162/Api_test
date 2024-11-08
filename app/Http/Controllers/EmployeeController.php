<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view("employees.index", compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = DB::table('departments')->get();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|max:20|min:3|unique:employees,name",
            'salary' => "required|numeric",
            'department' => "required|numeric",
        ]);
        Employee::create([
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'department_id' => $request->input('department'),
            // 'table name' => $request->input('name fel html'),
            // Add other fields as needed
        ]);
        return redirect()->route('employee.index')->with('done', 'added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::with('department')->find($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = DB::table('departments')->get();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => "required|max:20|min:3",
            'salary' => "required|numeric",
            'department' => "required|numeric",
        ]);
        $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->salary = $request->salary ;
            $employee->department_id = $request->department;
            // $employee->column name in db = $request->name fel html ;
            $employee->save();

        return redirect()->route('employee.index')->with('done', 'updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('done', 'deleted successfully ');
    }
}
