<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

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

                    if(!empty(Request::get('class_name'))){
                        $return = $return->where('class.name', 'like','%'.Request::get('class_name').'%' );
                    }
                    if(!empty(Request::get('teacher_name'))){
                        $return = $return->where('teacher.name', 'like','%'.Request::get('teacher_name').'%' );
                    }
                    if(!empty(Request::get('status'))){
                        $status = (Request::get('status')== 100 )? 0 : 1;
                        $return = $return->where('class_teacher.status', '=', $status);
                    }

                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('class_teacher.created_at', '=', Request::get('date') );
                    }

        $return = $return->orderBy('class_teacher.id',  'asc')
              ->paginate(7);

       
                return $return; 
    }

    static public function getAlreadyFirst($class_id, $teacher_id){
        return  ClassTeacher::where('class_id', '=', $class_id)
        ->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getSingle($id){
        return self::find($id);
    } 

    static public function getAssignTeacherId($class_id){
        return self::where('class_id', '=', $class_id)->where('is_deleted', '=', 0)->get();
    } 

    static public function deleteTeacher($class_id){
        return  self::where('class_id', '=', $class_id)->delete();
         
      }

      static public function getClassSubject($teacher_id){
        return  ClassTeacher::select('class_teacher.*', 'class.name as class_name', 'subject.name as subject', 'subject.type as subject_type')
        ->join('class', 'class.id', '=', 'class_teacher.class_id')
        ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
        ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
        ->where('class_teacher.is_deleted','=', 0 )
        ->where('class_teacher.status','=', 0 )
        ->where('subject.status','=', 0 )
        ->where('subject.is_delete','=', 0 )
        ->where('class_subject.status','=', 0 )
        ->where('class_subject.is_delete','=', 0 )
        ->where('class_teacher.teacher_id','=', $teacher_id )
        ->get();
      }
}
