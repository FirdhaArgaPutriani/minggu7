<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;
use PDF;

class StudentController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $student = Student::with('kelas')->get(); 
        return view('students.index', ['student'=>$student]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $kelas = Kelas::all(); 
        return view('students.create',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $student = new Student; 
        
        if($request->file('photo')){ 
            $image_name = $request->file('photo')->store('images','public'); 
        }

        $student->nim = $request->nim; 
        $student->name = $request->name; 
        $student->departement = $request->departement; 
        $student->phone = $request->phone;
        $student->photo = $image_name;
 
        $kelas = new Kelas; 
        $kelas->id = $request->Kelas; 
 
        $student->kelas()->associate($kelas); 
        $student->save(); 
    
        // if true, redirect to index 
        return redirect()->route('students.index') 
            ->with('success', 'Add data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $student = Student::find($id); 
        return view('students.show',['student'=>$student]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $student = Student::find($id); 
        $kelas = Kelas::all(); 
        return view('students.edit',['student'=>$student, 'kelas'=>$kelas]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $student = Student::find($id); 
        $student->nim = $request->nim; 
        $student->name = $request->name;  
        $student->departement = $request->departement; 
        $student->phone = $request->phone; 
        
        if($student->photo && file_exists(storage_path('app/public/' . $student->photo))) { 
            \Storage::delete('public/'.$student->photo); 
        } 
        $image_name = $request->file('photo')->store('images', 'public'); 
        $student->photo = $image_name;

        $kelas = new Kelas; 
        $kelas->id = $request->Kelas; 
 
        $student->kelas()->associate($kelas); 
        $student->save(); 
        
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $student = Student::find($id); 
        $student->delete(); 
        return redirect()->route('students.index'); 
    }

    public function search(Request $request){
        $key = trim($request->get('q'));

        $students = Student::query()
            ->where('name', 'like', "%($key)%")
            ->get()
        ; 

        return view('students.index', ['student' => $students]); 
    }
    
    public function detail($id){
        $student = Student::find($id);
        return view('students.detail', ['student' => $student]);
    }

    public function report($id){ 
        $student = Student::find($id); 
        $pdf = PDF::loadview('students.report',['student'=>$student]); 
        return $pdf->stream(); 
    } 
}
