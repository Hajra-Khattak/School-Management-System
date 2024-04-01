<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Str;
use Auth;

class TeacherController extends Controller
{
    //
    public function list(){
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function add(){
        $data['header_title'] = "Add Teacher List";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request){
        
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'martial_status' => 'max:50'
        ]);


        $teacher = new User;
        $teacher->name = trim($request->name);
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr). '.' . $ext;
            $file->move('upload/teacher/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->user_type = 2;
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->martial_status = trim($request->martial_status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->status = trim($request->status);
        $teacher->note = trim($request->note);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->email = trim($request->email);
        $teacher->save();
        // dd($teacher);

        return redirect('/admin/teacher/list')->with('success', ' Teacher is added Successfully');
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Teacher List";
            return view('admin.teacher.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id ,
            'mobile_number' => 'max:15|min:8',
            'martial_status' => 'max:50'
        ]);


        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->user_type = 2;
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->martial_status = trim($request->martial_status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->status = trim($request->status);
        $teacher->note = trim($request->note);
        $teacher->email = trim($request->email);

        if(!empty($request->password)){
            $teacher->password = Hash::make($request->password);
        }
        if(!empty($request->file('profile_pic'))){
            if(!empty($teacher->getTeacherProfile())){
                unlink('upload/teacher/'. $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr). '.' . $ext;
            $file->move('upload/teacher/', $filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->save();
        // dd($teacher);

        return redirect('/admin/teacher/list')->with('success', ' Teacher is Updated Successfully');
    }

    public function delete($id){
        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
        return redirect()->back()->with('success', 'Teacher Successfully Deleted');
        }
        else{
            abort(404);
        }
    }
}
