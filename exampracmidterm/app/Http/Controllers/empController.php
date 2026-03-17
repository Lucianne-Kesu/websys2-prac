<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class empController extends Controller
{
    public function index() 
    {
        $employees = DB::table('employees')->get();
        return view('employees',['employees'=>$employees]);
    }

    public function store(Request $request) 
    {
       $request->validate([
            'employee_id' => 'required|unique:employees',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required'
        ]);

        DB::table('employees')->insert([
            'employee_id' => $request->employee_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'department' => $request->department,
        ]);
        return redirect()->back()->with('success', 'User Registered');
    }

    public function destroy($id)
     {
        DB::table('employees')->where('id',$id)->delete();
        return redirect()->back();
     }
     public function timeIn(Request $request) {
    $now = now();
    $timeString = $now->format('H:i:s');
    $type = ($now->hour < 12) ? 'am' : 'pm';
    $status = 'regular';

    // Requirement (iv): Detect tardiness
    if ($type == 'am' && $timeString > '08:00:00') {
        $status = 'late';
    } elseif ($type == 'pm' && $timeString > '13:00:00') {
        $status = 'late';
    }

    // Requirement (iii): Check if already logged for today/type
    $exists = DB::table('logs')
        ->where('employee_id', $request->employee_id)
        ->where('log_date', $now->format('Y-m-d'))
        ->where('type', $type)
        ->exists();

    if ($exists) {
        return redirect()->back()->with('error', 'Already logged for this session.');
    }

    DB::table('logs')->insert([
        'employee_id' => $request->employee_id,
        'timein' => $timeString,
        'type' => $type,
        'status' => $status,
        'log_date' => $now->format('Y-m-d')
    ]);

    return redirect()->back();
}
}
