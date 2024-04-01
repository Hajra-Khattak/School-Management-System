<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use Auth;

class SubjectController extends Controller
{
    //
    public function list(){
        $data['getRecord'] = Subject::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }

    public function add(){
        $data['header_title'] = "Add New Class";
        return view('admin.subject.add', $data);
    }

    public function store(Request $request){
        // dd($request->all());
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Created');

    }

    public function edit($id){
        $data['getRecord'] = Subject::getSingle($id);
        if(!empty($data['getRecord'])){

            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $subject = Subject::getSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->save();
        
        return redirect('admin/subject/list')->with('success', 'Updated Successfully');

    }

    public function delete($id){
        $subject = Subject::getSingle($id);
        $subject->is_delete  = 1;
        $subject->save();
        
        return redirect()->back()->with('success', 'Deleted  Successfully');

    }
// Parent Side
    public function ParentStudentsubject($student_id){
        // dd($student_id);
    $user = User::getSingle($student_id);
    $data['getuser'] = $user;
    $data['getRecord'] = ClassSubject::MySubject($user->class_id);
    $data['header_title'] = "Edit Subject";
    return view('parent.my_student_subject', $data);
    }
}
