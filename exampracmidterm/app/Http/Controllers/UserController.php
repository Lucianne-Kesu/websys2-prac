<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function form1()
     {
        return view('form1');
     }

     public function form1send(Request $request) 
     {
      $input = $request->num1;
      $position = $request->num2;
      $text = $request->text1;
      $ogArr = $request->ogArr;
      $submitted = $request->submitted;

      return view('form1')->with(['input' => $input, 'position' => $position, 'text' => $text, 'submitted' => $submitted, 'ogArr' => $ogArr]);
     }
     public function store(Request $request) {
    $request->validate([
        'employee_id' => 'required|unique:employees',
        'firstname'   => 'required',
        'lastname'    => 'required',
        'department'  => 'required|in:IT,Math',
        'photo'       => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);
    // Logic to save employee...
}
}

