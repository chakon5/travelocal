<?php

namespace App\Http\Controllers;

use App\Models\entrepreneur;
use Illuminate\Http\Request;

class EntController extends Controller
{
    // Create Index
    public function index() {
        $data['entrepreneur'] = Entrepreneur::orderBy('ent_id', 'asc')->paginate(5);
        return view('entrepreneur.index', $data);
    }

    // Create resource
    public function create() {
        return view('entrepreneur.create');
    }

    // Store resource
    public function store(Request $request ) {
        $request->validate([
            'ent_name' => 'required',
            'ent_lname' => 'required',
            'ent_gender' => 'required',
            'ent_birthday' => 'required',
            'ent_tel' => 'required',
            'ent_address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

       
        $entrepreneurs = new Entrepreneur;
        $entrepreneurs->ent_name = $request->ent_name;
        $entrepreneurs->ent_lname = $request->ent_lname;
        $entrepreneurs->ent_gender = $request->ent_gender;
        $entrepreneurs->ent_birthday = $request->ent_birthday;
        $entrepreneurs->ent_tel = $request->ent_tel;
        $entrepreneurs->ent_address = $request->ent_address ;
        $entrepreneurs->email = $request->email;
        $entrepreneurs->password = $request->password;
        
        $entrepreneurs->save();
        return redirect()->route('entrepreneur.index')->with('success', 'Entrepreneur has been created successfully.');
    }

    public function edit(Entrepreneur $entrepreneur) {
        return view('entrepreneur.edit', compact('entrepreneur'));
    }

    public function update(Request $request, $id) {
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
        $entrepreneurs = Entrepreneur::find($ent_id);
        $entrepreneurs->ent_name = $request->ent_name;
        $entrepreneurs->ent_lname = $request->ent_lname;
        $entrepreneurs->ent_gender = $request->ent_gender;
        $entrepreneurs->ent_birthday = $request->ent_birthday;
        $entrepreneurs->ent_tel = $request->ent_tel;
        $entrepreneurs->ent_address = $request->ent_address ;
        $entrepreneurs->email = $request->email;
        $entrepreneurs->password = bcrypt($request->password);
        
        $entrepreneurs->save();
        return redirect()->route('entrepreneur.index')->with('success', 'Entrepreneur has been updated successfully.');
    }

    public function destroy(Entrepreneur $entrepreneur) {
        $entrepreneur->delete();
        return redirect()->route('entrepreneur.index')->with('success', 'Entrepreneur has been deleted successfully.');
    }
}
