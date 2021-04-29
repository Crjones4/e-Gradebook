<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\AdminCreatedAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    function index(Request $request){

        $users = User::all();
        return view("admin.users", compact('users'));

    }

    function edit_user(Request $request, $id){
        $user = User::find($id);
        if($user == null){
            abort(404);
        }
        return view("admin.useredit", compact('user'));
    }

    function edit_user_save(Request $request, $id){

        $user = User::find($id);

        if($user == null){
            abort(404);
        }

        if($request->get('email') != $user->email){
            $this->validate($request,[
                'email' => 'required|email|unique:users,email'
            ]);
        }

        $this->validate($request,[
            'name' => 'max:255|required',
            'role' => 'required|in:admin,student'
        ]);

        $password = $user->password;

        if(trim($request->get("password")) != ""){
            $this->validate($request, [
                'password' => 'min:8'
            ]);
            $password = Hash::make($request->get("password"));
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->password = $password;

        $user->save();
        return view("admin.useredit", compact('user'));

    }

    function serve_create(Request $request){

        return view("admin.usernew");

    }

    function create_user(Request $request){

        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,student'

        ]);

        $password = Str::random(8);

        $new_user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make($password)
        ]);

        Mail::to($request->get('email'))->send(new AdminCreatedAccount($new_user, $password));

        return back()->with('success', 'User successfully created and password was emailed.');

    }

    function delete_user(Request $request, $id){

        $user = User::find($id);

        if($user == null){
            abort(404);
        }

        if(Auth::user()->id == $id){
            return back()->with('success', 'You can not delete your own account.');
        }
        
        $user->delete();

        return redirect('/admin');

    }

}
