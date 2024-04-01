<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
use App\Models\ClassModel;

class UserController extends Controller
{
    //

    public function Myaccount(){
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 2 ){
            return view('teacher.my_account', $data); 
        }
        elseif(Auth::user()->user_type == 3 ){
            // $data['getClass'] = ClassModel::getClass();
            return view('student.my_account', $data); 
        }
        elseif(Auth::user()->user_type == 4){
            return view('parent.my_account', $data); 
        }
        else{
            return view('admin.my_account', $data); 

        }
    }

    public function UpdateMyAdminaccount(Request $request){
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);    

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->user_type = 1;   
        $user->save();
        return redirect()->back()->with('success', "Successfully Admin Updated");
    }

    public function UpdateMyaccount(Request $request){
        // dd($request->all());
        $id = Auth::user()->id;
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
        $teacher->user_type = 2;
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->martial_status = trim($request->martial_status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);

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

        return redirect()->back()->with('success', ' Account is Updated Successfully');
    }

    public function UpdateMyaccountStudent(Request $request){
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'religion' => 'max:50',
            'caste' => 'max:50',
            'mobile_number' => 'max:15|min:8'
            // 'class_id' =>

        ]);
        // dd($request->all());
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
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
        $student->save();

        return redirect()->back()->with('success', 'Student Successfully Updated');
    }
    public function change_password(){
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data); 
    }

    public function update_change_password(Request $request){
        // dd($request->all());
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', " password update successfully");
        }
        else{
            return redirect()->back()->with('error', "Old password is not correct");
        }
    }


    public function UpdateMyaccountParent(Request $request){
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id ,
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'occupation' => 'max:255'
        ]);


        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->email = trim($request->email);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->gender = $request->gender;

        $parent->user_type = 4;

        if(!empty($request->file('profile_pic'))){
            if(!empty($parent->getParentProfile())){
                // dd($parent->getParentProfile());
                unlink('upload/parent/'. $parent->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.parent.'.$ext;
            $file->move('upload/parent/', $filename);

            $parent->profile_pic = $filename;

        }
       
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->save();
        return redirect()->back()->with('success', 'Parent Successfully Updated');
    }

}
