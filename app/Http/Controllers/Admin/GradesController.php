<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;

class GradesController extends Controller
{
    //
    function index(Request $request, $id){

        $user = User::find($id);
        if($user == null){
            abort(404);
        }
        $grades = $user->grades()->get();
        return view("admin.usergrades", compact('user'), compact('grades'));

    }

    function post_grade(Request $request, $id){

        $user = User::find($id);
        if($user == null){
            abort(404);
        }

        $this->validate($request, [
            'grade' => 'required|numeric|min:0|max:100',
            'comment' => 'required'
        ]);

        Grade::create([
            'user_id' => $id,
            'teacher_id' => auth()->user()->id,
            'grade' => $request->get('grade'),
            'comment' => $request->get('comment') 
        ]);
        $grades = $user->grades()->get();
        return view("admin.usergrades", compact('user'), compact('grades'));

    }

    function delete_grade(Request $request, $id){

        $user = User::find($id);
        if($user == null){
            abort(404);
        }

        $this->validate($request, [
            'grade_id' => 'required',
        ]);

        $grade = Grade::find($request->get('grade_id'));

        if($grade == null){
            abort(404);
        }

        if($grade->teacher()->get()->first()->id != auth()->user()->id){
            abort(403);
        }

        $grade->delete();

        $grades = $user->grades()->get();
        return view("admin.usergrades", compact('user'), compact('grades'));

    }

}
