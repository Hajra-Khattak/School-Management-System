<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\ClassSubject;

class ClassSubjectController extends Controller
{
    //
    public function list(Request $request){
        // Request 
        $data['getRecord'] = ClassSubject::getRecord();
        $data['header_title'] = "Assign Subject List";
        return view('admin.assignSubj.list', $data);
    }

    public function add(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = " Assign Subject added";
        return view('admin.assignSubj.add', $data);

    }

    public function store(Request $request){
        // dd($request->all());
        if(!empty($request->subject_id)){

            foreach ($request->subject_id as $subject_id) {

                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else{
                        $store = new ClassSubject;
                        $store->class_id = $request->class_id;
                        $store->subject_id = $subject_id;
                        $store->status = $request->status;
                        $store->created_by = Auth::user()->id;
                        $store->save();
                }
                
                
            }
            return redirect('admin/assign_subject/list')->with('success', "Subject Assigned Successfully");
        }
        else{
            return redirect()->back()->with('error', "something wrong");

        }
 
   }

   public function edit($id){
    $getRecord = ClassSubject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord'] = $getRecord;
            $data['getAssignSubjId'] = ClassSubject::getAssignSubjId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = Subject::getSubject();
            $data['header_title'] = " Edit Assign Subject ";
            return view('admin.assignSubj.edit', $data);
    }
    else{
        abort(404);
    }
   }

   public function update(Request $request){
        ClassSubject::deleteSubject($request->class_id);

        if(!empty($request->subject_id)){

            foreach ($request->subject_id as $subject_id) {

                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else{
                        $store = new ClassSubject;
                        $store->class_id = $request->class_id;
                        $store->subject_id = $subject_id;
                        $store->status = $request->status;
                        $store->created_by = Auth::user()->id;
                        $store->save();
                }        
            }
        }
        return redirect('admin/assign_subject/list')->with('success', "Subject Assign Update Successfully");
   }

   public function delete($id){
    $delete = ClassSubject::getSingle($id);
    $delete->is_delete = 1;
    $delete->save();

    return redirect()->back()->with('success', "Deleted Successfully");

   }


   public function editSingle($id){
    $getRecord = ClassSubject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = Subject::getSubject();
            $data['header_title'] = " Edit Assign Subject ";
            return view('admin.assignSubj.edit_single', $data);
    }
    else{
        abort(404);
    }
   }

   public function updateSingle($id, Request $request){

                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $request->subject_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                    return redirect('admin/assign_subject/list')->with('success', "Status Update Successfully");
                    
                }
                else{
                        $store = ClassSubject::getSingle($id);
                        $store->class_id = $request->class_id;
                        $store->subject_id = $request->subject_id;
                        $store->status = $request->status;
                        $store->save();
                        return redirect('admin/assign_subject/list')->with('success', "Subject Assign Update Successfully");
                }        
            }  
}