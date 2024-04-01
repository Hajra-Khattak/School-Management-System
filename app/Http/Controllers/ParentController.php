<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;
use Str;
use File;
use Illuminate\Http\Request;
use LDAP\Result;

class ParentController extends Controller
{
    //

    public function list(){
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "Paranet List";
        return view('admin.parent.list', $data);
    }
    public function add(){
        // $data['getRecord'] = User::getParaents();
        $data['header_title'] = "Add Paranet List";
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'occupation' => 'max:255'
        ]);


        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->email = trim($request->email);
        $parent->password = Hash::make($request->password);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->gender = $request->gender;

        $parent->user_type = 4;
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.parent.'.$ext;
            $file->move('upload/parent/', $filename);

            $parent->profile_pic = $filename;

        }
        $parent->status = $request->status;
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Parent Data Added Successfully');

    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Paranet List";
            return view('admin.parent.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
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
        $parent->password = Hash::make($request->password);
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
       
        $parent->status = $request->status;
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Parent Data Updated Successfully');
    }

    public function delete($id){
        $getRecord= User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
        return redirect()->back()->with('success', 'Parent Successfully Deleted');
           
        }
        else{
            abort(404);
        }
    }

    public function MyStudent($id){
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        
        $data['header_title'] = "Paranet's Students List";
        return view('admin.parent.mystudent', $data);
    }

    public function AssignStudentParent($student_id, $parent_id){
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success', 'Student Successfully Assigned');

    }

    public function AssignStudentParentDelete($student_id){
        $student = User::getSingle($student_id);
        $student->parent_id = null ;
        $student->save();
        return redirect()->back()->with('success', 'Student Successfully Assigned DEleted ');
    }

    public function MyStudentParent(){
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "MY Students List";
        return view('parent.my_student', $data);
    }

    // public function MySubject(){

    // }
}
