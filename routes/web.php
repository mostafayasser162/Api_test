<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Models\Department;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Route::get('/', function(){
//     return view('employees.index');
// });
    //        esm el folder
Route::prefix('employees')->group(function(){ //  esm el func       el route ay esm 3ady
Route::get('/index', [EmployeeController::class , 'index'])->name('employee.index');
Route::get('/create',[EmployeeController::class ,'create'])->name('employee.create');
Route::post('/store',[EmployeeController::class ,'store'])->name('employee.store');


Route::get('/edit/{id}',[EmployeeController::class ,'edit'])->name('employee.edit');
Route::get('/show/{id}',[EmployeeController::class ,'show'])->name('employee.show');
Route::post('/update/{id}',[EmployeeController::class ,'update'])->name('employee.update');
Route::get('/destroy/{id}',[EmployeeController::class ,'destroy'])->name('employee.destroy');
});

Route::prefix('departments')->group(function(){
    Route::get('/index', [DepartmentController::class , 'index'])->name('departments.index');
    Route::get('/create',[DepartmentController::class ,'create'])->name('departments.create');
    Route::post('/store',[DepartmentController::class ,'store'])->name('departments.store');
    Route::get('/edit/{id}',[DepartmentController::class ,'edit'])->name('departments.edit');
    Route::get('/show/{id}',[DepartmentController::class ,'show'])->name('departments.show');
    Route::post('/update/{id}',[DepartmentController::class ,'update'])->name('departments.update');
    Route::get('/destroy/{id}',[DepartmentController::class ,'destroy'])->name('departments.destroy');
    });

