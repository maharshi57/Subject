<?php

namespace App\Services;

use App\Models\Subject;

class SubjectService{
    public function index(){
        $subjects= Subject::all();
        return $subjects;
    }

    public function create($fields){
        $subject = Subject::create($fields);
        return $subject;
    }

    public function update($subject, $data){
        $subject=$subject->update($data);
        return $subject;
    }

    public function delete($id){
            $subject= Subject::findOrFail($id);
            $subject->delete();
            return "1 row deleted!";
    }

    public function search($id){
        $subject= Subject::find($id);
        return $subject;
    }
}
