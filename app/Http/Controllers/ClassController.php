<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Auth;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function list(){
        $data['getRecord'] =ClassModel::getRecord();
        $data['header_title'] = 'Class List';
        return view('admin.class.list', $data);
    }

    public function add(){

        $data['header_title'] = 'Add New Class ';
        return view('admin.class.add', $data);

    }

    public function store(Request $request) {
        $store = new ClassModel;
        $store->name = $request->name;
        $store->status = $request->status;
        $store->created_by = Auth::user()->id;
        $store->save();

        // dd($store->save());

        return redirect('admin/class/list')->with('success', 'Class Successfully Created');
    }

    public function edit($id){
        $data['getRecord'] =ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Edit Class ';
            return view('admin.class.edit', $data);
        }
        else{
            abort(404);
        }

    }

    public function update($id, Request $request){
        $store = ClassModel::getSingle($id);
        $store->name = $request->name;
        $store->status = $request->status;
        $store->save();

        // dd($store->save());

        return redirect('admin/class/list')->with('success', 'Class Successfully Updated');
    }

    public function delete($id){
        $store = ClassModel::getSingle($id);
        $store->is_delete = 1;
        $store->save();

        // dd($store->save());

        return redirect()->back()->with('error', 'Class Successfully Deleted');
    }
}
