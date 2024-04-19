<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    use HasFactory;

    protected $table = "class_teacher";

    static public function getClassTeacher(){
        $return =  ClassTeacher::select('class_teacher.*', 'class.name as class_name','teacher.name as teacher_name', 'users.name as created_by_name')
                    ->join('users as teacher', 'teacher.id', '=', 'class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'class_teacher.created_by')
                    ->where('class_teacher.is_deleted','=', 0 );
        $return = $return->orderBy('class_teacher.id',  'asc')
              ->paginate(7);
        // $return =  ClassTeacher::select('class_teacher,*');
        // dd($return);
                return $return; 
    }

    static public function getAlreadyFirst($class_id, $teacher_id){
        return  ClassTeacher::where('class_id', '=', $class_id)
        ->where('teacher_id', '=', $teacher_id)->first();
    }
}
