<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubject;
use App\Models\Subject;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Str;


class StudentController extends Controller
{
    //
    public function list(){
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data); 
    }

    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add Student ";
        return view('admin.student.add', $data); 
    }

    public function insert(Request $request){

        // Validation
        request()->validate([
            'email' => 'required|email|unique:users',
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'roll_number' => 'max:50',
            'admission_number' => 'max:50',
            'religion' => 'max:50',
            'caste' => 'max:50',
            'mobile_number' => 'max:15|min:8'
            // 'class_id' =>

        ]);
        // dd($request->all());
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->status = $request->status;
        $student->blood_group = trim($request->blood_group);

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }
        
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Successfully Created');

    }

    public function edit($id){
        // $data['getRecord'] = User::getProfile();
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student ";
            return view('admin.student.edit', $data); 
        }
        else{
            abort(404);
        }
    }
    public function update($id, Request $request){
        // / Validation
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id ,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'roll_number' => 'max:50',
            'admission_number' => 'max:50',
            'religion' => 'max:50',
            'caste' => 'max:50',
            'mobile_number' => 'max:15|min:8'
            // 'class_id' =>

        ]);
        // dd($request->all());
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }

        
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->status = $request->status;
        $student->blood_group = trim($request->blood_group);
        if(!empty($request->file('profile_pic'))){

            // dd($request->file('profile_pic'));
                if(!empty($student->getProfile())){
                    // dd($student->getProfile());
                    unlink('upload/profile/'. $student->profile_pic);
                }
        
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            
            $student->profile_pic = $filename;
        }
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        if(!empty($request->password)){
            $student->password = Hash::make($request->password);
        }
    
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Successfully Updated');

    }
    public function delete($id){
        $getRecord= User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
        return redirect()->back()->with('success', 'Student Successfully Deleted');
           
        }
        else{
            abort(404);
        }
    }

    public function MySubjects(){
        // $data['getRecord'] = Subject::getRecord();
        $data['getRecord'] = ClassSubject::mYSubject(Auth::user()->class_id);

        $data['header_title'] = "My Subjects ";
        return view('student.mysubjects', $data);
    }
}
