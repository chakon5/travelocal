<?php

namespace App\Http\Controllers;

use App\Models\guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
// Create Index
public function index() {
    $data['guide'] = Guide::orderBy('guide_id', 'asc')->paginate(5);
    return view('guide.index', $data);
}

// Create resource
public function create() {
    return view('guide.create');
}

// Store resource
public function store(Request $request ) {
    $request->validate([
        'guide_name' => 'required',
        'guide_lname' => 'required',
        'guide_gender' => 'required',
        'guide_birthday' => 'required',
        'guide_tel' => 'required',
        'guide_address' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);

   
    $guides = new Guide;
    $guides->guide_name = $request->guide_name;
    $guides->guide_lname = $request->guide_lname;
    $guides->guide_gender = $request->guide_gender;
    $guides->guide_birthday = $request->guide_birthday;
    $guides->guide_tel = $request->guide_tel;
    $guides->guide_address = $request->guide_address ;
    $guides->email = $request->email;
    $guides->password = $request->password;
    
    $guides->save();
    return redirect()->route('guide.index')->with('success', 'Guide has been created successfully.');
}

public function edit(Guide $guide) {
    return view('guide.edit', compact('guide'));
}

public function update(Request $request, $guide_id) {
    $request->validate([
        'guide_name' => 'required',
        'guide_lname' => 'required',
        'guide_gender' => 'required',
        'guide_birthday' => 'required',
        'guide_tel' => 'required',
        'guide_address' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);
    $guides = Guide::find($guide_id);
    $guides->guide_name = $request->guide_name;
    $guides->guide_lname = $request->guide_lname;
    $guides->guide_gender = $request->guide_gender;
    $guides->guide_birthday = $request->guide_birthday;
    $guides->guide_tel = $request->guide_tel;
    $guides->guide_address = $request->guide_address ;
    $guides->email = $request->email;
    $guides->password = $request->password;
    
    $guides->save();
    return redirect()->route('guide.index')->with('success', 'Guide has been updated successfully.');
}

public function destroy(Guide $guide) {
    $guide->delete();
    return redirect()->route('guide.index')->with('success', 'Guide has been deleted successfully.');
}
}
