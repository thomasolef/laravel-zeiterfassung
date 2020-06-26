<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Time;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $employees = Employee::all();

    return view('welcome',
[
    'employees' => $employees
]);
});

Route::post('/', function(Request $request) {


        $employee = Employee::where('id', $request->id)->first();

        $checked_in_time = Time::where('status', 'checked-in')->where('employee_id', $employee->id)->first();

        if($checked_in_time){

            $checked_in_time->status="checked-out";
            $checked_in_time->end=now();
            $checked_in_time->save();

            return redirect()->back()->with('success','Check-Out erfolgreich!');
        }
  
        $time = new Time;

            $time->fill([
                'personalnummer' => $employee->personalnummer,
                'employee_id' => $employee->id,
                'start' => now(),
                'employee' => $employee->name,
            ]);

            $time->save();
   
        return redirect()->back()->with('success','Check-In erfolgreich!');


});
