<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;


class AdminController extends Controller
{
    //

    public function list()
    {
        // Title 
        // $data['header_title'] = "Admin List";
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin List';

        return view('admin.admin.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add new Admin ';
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request){

        request()->validate([
            'email' => 'required|email|unique:users'
        ]);      
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->user_type = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/admin/list')->with('success', "Successfully Admin Added");
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){     
        $data['header_title'] = 'Edit new Admin ';
        return view('admin.admin.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){

        // The $id will take whatever email there they don't need to text or edit
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);    

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->user_type = 1;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }    
        $user->save();
        return redirect('admin/admin/list')->with('success', "Successfully Admin Updated");
    }

    public function delete($id){
        $user = User::getdelete($id);
        if(!empty($user->delete())){
            return redirect('admin/admin/list')->with('success', "Successfully Admin Deleted");
        }
        else{
        return redirect('admin/admin/list')->with('error', "Not deleted");
        }

    }

}
