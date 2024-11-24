<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class DataHandler extends Controller
{
    // public function insert() {
    //     return view('welcome')  ; 
    //  }
    function index()
    {

        $student = Student::all();
        $data = compact('student');

        return view('list')->with($data);
    }

    function create()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {
        $rulse = [
            "name" => "required",
            "email" => "required|email",
            "contact" => "required",
            "password" => "required",
            "gen" => "required",
            "image" => "required|mimes:png,jpeg|dimensions:minwidth,200px"
        ];
        if ($request->image != "") {
            $rulse['image'] = 'image';
        }
        $validatedata = Validator::make($request->all(), $rulse);
        if ($validatedata->fails()) {
            return redirect()->route('product')->withInput()->withErrors($validatedata);
        }
        // here we will insert student in database
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->contact = $request->contact;
        $student->gender = $request->gen;
        $student->save();
        if ($request->image != "") {
            // image code 
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();

            $imagename = time() . '.' . $ext;
            $image->move(public_path('uploads/stuimages'), $imagename);
            $student->image = $imagename;
            $student->save();
        }

        return redirect()->route('stulist')->with('success', 'Student Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $data = compact('student');
        return view('edit')->with($data);
    }
    public function update($id, Request $request)
    {
        $model = new Student();
        $student = Student::find($id);
        $rulse = [
            "name" => "required",
            "email" => "required|email",
            "contact" => "required",
            "password" => "required",
            "gen" => "required",
            "image" => "required|mimes:png,jpeg|dimensions:minwidth,200px"
        ];
        if ($request->image != "") {
            $rulse['image'] = 'image';
        }
        $validatedata = Validator::make($request->all(), $rulse);
        if ($validatedata->fails()) {
            return redirect()->route('updatestu', $student->id)->withInput()->withErrors($validatedata);
        }
        // here we will insert student in database

        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->contact = $request->contact;
        $student->gender = $request->gen;
        $student->save();
        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/stuimages' . $student->image));
            // image code 
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();

            $imagename = time() . '.' . $ext;
            $image->move(public_path('uploads/stuimages'), $imagename);
            $student->image = $imagename;
            $student->save();
        }

        return redirect()->route('stulist')->with('success', 'Student Updated Successfully');
    }
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return back();
    }
}
