<?php

use App\Models\Department;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\auth\profileController;


// Route::get('/', function(){
//     return view('employees.index');
// });
//        esm el folder
Route::prefix('employees')->group(function () {
    // middleware
    Route::middleware("auth")->group(function () {     //  esm el func       el route ay esm 3ady
        Route::get('/index', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');

        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::get('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });
});

Route::prefix('user')->group(function () {
    // 3shan ma'drsh akhleh yrouh lel login whoua 3amel logon aslun
    // Route::middleware("guest")->group(function () { //esm el func       el route ay esm 3ady
    Route::get('/register', [AuthController::class, 'show_register'])->name('show_register')->middleware("auth");
    Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware("auth");

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'store_login'])->name('store_login');

    // });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('departments')->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get('/index', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('departments.show');
        Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });
});

Route::prefix("profile")->name("profile.")->group(function () {

    Route::get("/", [ProfileController::class, 'index'])->name("index");
    Route::post("/changeImage", [profileController::class, 'changeImage'])->name("changeImage");
    Route::post("/changeData", [profileController::class, 'changeData'])->name("changeData");
    Route::post("/changePassword", [profileController::class, 'changePassword'])->name("changePassword");
    Route::post("/deleteAccount", [profileController::class, 'deleteAccount'])->name("deleteAccount");

});
