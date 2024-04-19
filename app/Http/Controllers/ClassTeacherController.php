<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassTeacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTeacherController extends Controller
{
    //

    public function list(Request $request){
        $data['getRecord'] = ClassTeacher::getClassTeacher();
        $data['header_title'] = "Assign Class Teacher";
        return view('admin.assignTeacher.list', $data);
    }

    public function add(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Add Assign Class Teacher";
        return view('admin.assignTeacher.add', $data);
    }

    public function insert(Request $request){
        // dd($request->all());
        if(!empty($request->teacher_id)){

            foreach ($request->teacher_id as $teacher_id) {

                $getAlreadyFirst = ClassTeacher::getAlreadyFirst($request->class_id, $teacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else{
                        $store = new ClassTeacher;
                        $store->class_id = $request->class_id;
                        $store->teacher_id = $teacher_id;
                        $store->status = $request->status;
                        $store->created_by = Auth::user()->id;
                        $store->save();
                }       
            }
            return redirect('admin/assign_class/list')->with('success', "Class to Teacher Assigned Successfully");
        }
        else{
            return redirect()->back()->with('error', "something wrong");

        }
    }

    public function edit($id){
    $getRecord = ClassTeacher::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherId'] = ClassTeacher::getAssignTeacherId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacherClass'] = User::getTeacherClass();
            $data['header_title'] = "Edit Assign Class Teacher";
            return view('admin.assignTeacher.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function delete($id){
        $save = ClassTeacher::getSingle($id);
        $save->is_deleted = 1;
        $save->save();

        return redirect('admin/assign_class_teacher/list')->with('error', "Class to Teacher Assigned Deleted Successfully");

    }
}
