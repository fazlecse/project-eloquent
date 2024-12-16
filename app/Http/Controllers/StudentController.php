<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students = student::simplepaginate(4);
        // $students= student::find([2,4],['name','email']);
        // $students=student::count();
        // $students=student::where([
        //             ['city','Delhi'],
        //             ['age','>',19]
        //         ])->get();
        // $students=student::where('city','delhi')
        //                     ->orwhere('age','>',20)->get();
        // $students=student::whereCity('delhi')
        //                     ->whereAge(20)
        //                     ->select('name','email as User Email')
        //                     // ->dd();
        //                     // ->ddRawSql();
        //                     ->get();
        // return $students;
        return view('home', compact('students'));

        // foreach ($students as $student) {
        //     echo $student->name . "<br>";
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // simple way to save data in database
        // $student = new Student;

        // $student->name = $request->username;
        // $student->email = $request->useremail;
        // $student->age = $request->userage;
        // $student->city = $request->usercity;

        // $student->save();

        $request->validate([
            'username'=> 'required|string',
            'useremail'=> 'required|email',
            'userage'=> 'required|numeric',
            'usercity'=> 'required|alpha'
        ]);

        // mass data save to database
        student::create([
            'name'=> $request->username,
            'email'=> $request->useremail,
            'age'=> $request->userage,
            'city'=> $request->usercity,
        ]);

        return redirect()->route('student.index')
                        ->with('status', 'New User Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = student::find($id);
        return view('viewuser', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $users=student::find($id);
        return view('updateuser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // simple way to save data in database
        // $student=student::find($id);
        // $student->name = $request->username;
        // $student->email = $request->useremail;
        // $student->age = $request->userage;
        // $student->city = $request->usercity;
        // $student->save();

        $request->validate([
            'username'=> 'required|string',
            'useremail'=> 'required|email',
            'userage'=> 'required|numeric',
            'usercity'=> 'required|alpha'
        ]);

        $student=student::where('id',$id)
                        ->update([
                        'name'=> $request->username,
                        'email'=> $request->useremail,
                        'city' => $request->usercity,
                        'age' => $request->userage
        ]);

        return redirect()->route('student.index')
        ->with('status','User data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $student=student::find($id);
        // $student->delete();

        // student::destroy($id);
        
        student::truncate();

        return redirect()->route('student.index')
        ->with('status','User data deleted successfully');
    }
}
