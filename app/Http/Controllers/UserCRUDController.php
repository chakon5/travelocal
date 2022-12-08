<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCRUDController extends Controller
{
    // Create Index
    public function index() {
        $data['user'] = User::where('is_admin','0')->orderby('user_id','asc')->paginate(5);
        return view('user.index', $data);
    }

    // Create resource
    public function create() {
        return view('user.create');
    }

    // Store resource
    public function store(Request $request ) {
        $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

       
        $users = new User;
        $users->name = $request->name;
        $users->lname = $request->lname;
        $users->gender = $request->gender;
        $users->birthday = $request->birthday;
        $users->tel = $request->tel;
        $users->address = $request->address ;
        $users->email = $request->email;
        $users->password = $request->password;
        
        $users->save();
        return redirect()->route('user.index')->with('success', 'User has been created successfully.');
    }

    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $user_id) {
        // dd({{ Auth::user()->name }});
        $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $users = User::find($user_id);
        $users->name = $request->name;
        $users->lname = $request->lname;
        $users->gender = $request->gender;
        $users->birthday = $request->birthday;
        $users->tel = $request->tel;
        $users->address = $request->address ;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        
        $users->save();
        return redirect()->route('user.index')->with('success', 'User has been updated successfully.');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User has been deleted successfully.');
    }

}
