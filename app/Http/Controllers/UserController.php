<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getManageUserPage(){
        #only customer
        $users = User::where("role", "=", "Customer")->get();
        return view('manageUser',compact('users'));
    }

    public function deleteUser($id){
        $deleted_user = User::where("id", "=", $id)->first();
        $deleted_user->delete();

        return redirect()->back();
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|min:8|required_with:confirm|same:confirm',
            'confirm' => 'required',
            'gender' => 'required'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->remember_token = Str::random(10);

        $user->save();
        return redirect()->back();
    }

    public function getUpdateProfilePage(){
        return view('updateProfile');
    }

    public function getRegisterPage(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:confirm|same:confirm',
            'confirm' => 'required',
            'gender' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->role = 'Customer';
        $user->remember_token = Str::random(10);

        $user->save();

        return redirect('/login');
    }

    public function getLoginPage(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->remember != null ? true : false;
        if($remember){
            #param ke 3 itu menit
            #2 jam -> 120 menit
            Cookie::queue('myCookie', $request->email, 120);
        }
        else{
            Cookie::queue(Cookie::forget('myCookie'));
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, $remember)){
            Session::put('mySession', $credentials);
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['error'=>'Wrong Email or Password']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
