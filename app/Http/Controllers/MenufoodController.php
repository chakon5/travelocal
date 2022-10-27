<?php

namespace App\Http\Controllers;

use App\Models\menufood;
use Illuminate\Http\Request;

class MenufoodController extends Controller
{
    // Create Index
    public function index() {
        $data['menufood'] = Menufood::orderBy('food_id', 'asc')->paginate(5);
        return view('menufood.index', $data);
    }

    // Create resource
    public function create() {
        return view('menufood.create');
    }

    // Store resource
    public function store(Request $request ) {
        $request->validate([
            'food_name' => 'required',
            'food_type' => 'required',
            'food_detail' => 'required',
            'food_note' => 'required',
        ]);

        $menufoods = new Menufood;
        $menufoods->food_name = $request->food_name;
        $menufoods->food_type = $request->food_type;
        $menufoods->food_detail = $request->food_detail;
        $menufoods->food_note = $request->food_note;
        
        $menufoods->save();
        return redirect()->route('menufood.index')->with('success', 'Menufood has been created successfully.');
    }
    
    public function edit(Menufood $menufood) {
        return view('menufood.edit', compact('menufood'));
    }

    public function update(Request $request, $food_id) {
        $request->validate([
            'food_name' => 'required',
            'food_type' => 'required',
            'food_detail' => 'required',
            'food_note' => 'required',
        ]);
        $menufoods = Menufood::find($food_id);
        $menufoods->food_name = $request->food_name;
        $menufoods->food_type = $request->food_type;
        $menufoods->food_detail = $request->food_detail;
        $menufoods->food_note = $request->food_note;

        $menufoods->save();
        return redirect()->route('menufood.index')->with('success', 'Menufood has been updated successfully.');
    }

    public function destroy(Menufood $menufood) {
        $menufood->delete();
        return redirect()->route('menufood.index')->with('success', 'Menufood has been deleted successfully.');
    }   
    
}
