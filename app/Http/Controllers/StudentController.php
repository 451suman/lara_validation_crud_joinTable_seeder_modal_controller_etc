<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class StudentController extends Controller
{
    public function showUser()
    {
        // $students = DB::table('students')->where('age','>',65)->get();
        // $students = DB::table('students')->where('age','>',65)->where('city','=','bhaktapur')->get();
        // $students = DB::table('students')->where('age','>',65)->orWhere('city','=','bhaktapur')->get();
        // $students = DB::table('students')->get();
        // $students = DB::table('students')->orderBy('name')->Paginate(10);
        $students = DB::table('students')->orderBy('name')->Paginate(10);

        // return $students;
        // dd($students);
       return view('/studentDetail',['data'=>$students]); 
      
    }
    public function singlestudent(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first(); //where is only 1 row we use first 
    
        return view('/singleStudent', ['data' => $student]);
    }
    
    public function addstudent(Request $request )
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:30 ',
            'email' => 'required|email',
            'age' => 'required|numeric |min:0',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^\d{10}$/|numeric',
            'password' => 'required| max:10|min:8',
        ]);
        $student = DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
            'address' => $request->address, // Add a value for the 'address' column
            'phone' => $request->phone, // Add a value for the 'address' column
            'password' => $request->password, // Add a value for the 'address' column
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($student){
            
            return redirect('/')->with('success','Student add Sucessfull');
        }
        else{
            return redirect()->back();
        }
    }
    // public function addstudent()
    // {
    //     $student = DB::table('students')->insert([
    //         'name' => 'suman mushyakhwo',
    //         'email' => '2n@gmail.com',
    //         'age' => '21',
    //         'city' => 'Bhaktapur',
    //         'address' => 'Some Address', // Add a value for the 'address' column
    //         'phone' => '21651651561561', // Add a value for the 'address' column
    //         'password' => '21651651561561', // Add a value for the 'address' column
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);
    
    //     return redirect('/');
    // }
    
 
    public function deletestudent(string $id)
    {
        $affectedRows = DB::table('students')
                    ->where('id', $id)
                    ->delete();

    if ($affectedRows > 0) {
        return redirect('/')->with('success', 'Student deleted successfully');
    } else {
        return redirect('/')->with('error', 'No student found with the specified ID');
    }
    }
    
   
    public function updatepage(string $id){
        $student = DB::table('students')->where('id',$id)->first();
        // $student = DB::table('students')->find($id);
        // return $student;
        return view('/updatestudent', ['data' => $student]);
        // return view('updatestudent',compact('student'));
    }




    public function updatestudent(Request $request,$id)
    {
        $affectedRows = DB::table('students')
                        ->where('id', $id)
                        ->update([
                            'name' => $request->name,
                        'email' => $request->email,
                        'age' => $request->age,
                        'city' => $request->city,
                        'address' => $request->address, // Add a value for the 'address' column
                        'phone' => $request->phone, // Add a value for the 'address' column
                        'password' => $request->password, // Add a value for the 'address' column
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
    
        if ($affectedRows > 0) {
            // Update was successful
            return redirect('/')->with('success', 'Student updated successfully');
        } else {
            // No records were updated
            return redirect('/')->with('error', 'No student found with the specified ID');
        }
    }


    public function jointable(){
        $students=DB::table('students')
        // ->select('students.*','cities.city_name')
        ->select('students.name','students.email','cities.city_name')
        ->join('cities','students.id','=','cities.s_id')->get();
        return view('jointable', compact('students'));
    }
}
