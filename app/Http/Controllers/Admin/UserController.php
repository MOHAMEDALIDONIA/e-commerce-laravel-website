<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $validationData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as'=>['required']
        ]);
        User::create([
            'name' => $validationData['name'],
            'email' => $validationData['email'],
            'password' => Hash::make($validationData['password']),
            'role_as'=>$validationData['role_as']
        ]);
      return redirect('admin/users')->with('message','user add successfully');
    }
    public function edit(int $userId){
        $user = User::findOrFail($userId);
        return view('admin.users.edit',compact('user')); 
    }
    public function update(Request $request,int $userId){
        $validationData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as'=>['required']
        ]);
        User::findOrFail($userId)->update([
            'name' => $validationData['name'],
            'password' => Hash::make($validationData['password']),
            'role_as'=>$validationData['role_as']
        ]);
      return redirect('admin/users')->with('message','user updated successfully');
    }
    public function destory(int $userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('admin/users')->with('message','user deleted successfully');
    }
}
