<?php

namespace App\Http\Controllers;

use App\Models\acttravel;
use App\Models\type_travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActtravelController extends Controller
{
    // Create Index
    public function index() {
        $acttravel=DB::table('acttravels')
        ->join('type_travels','acttravels.typetv_id','type_travels.typetv_id')
        ->select('acttravels.*','type_travels.typetv_name')->paginate(5);

        return view('acttravel.index', compact('acttravel'));
        // $acttravel=DB::table('acttravels')->paginate(5);
        // return view('acttravel.index', compact('acttravel'));
    }

    // Create resource
    public function create() {
        $acttravel = Type_travel::all();
        return view('acttravel.create', compact('acttravel'));
    }

    // Store resource
    public function store(Request $request ) {
        $request->validate([
            'at_name' => 'required',
            'typetv_id' => 'required',
            'at_type' => 'required',
            'at_detail' => 'required',
            'at_note' => 'required',
        ]);

        $acttravels = new Acttravel;
        $acttravels->at_name = $request->at_name;
        $acttravels->typetv_id = $request->typetv_id;
        $acttravels->at_type = $request->at_type;
        $acttravels->at_detail = $request->at_detail;
        $acttravels->at_note = $request->at_note;
        
        $acttravels->save();
        return redirect()->route('acttravel.index')->with('success', 'Acttravel has been created successfully.');
    }
    
    public function edit(Acttravel $acttravel) {
        return view('acttravel.edit', compact('acttravel'));
    }

    public function update(Request $request, $at_id) {
        $request->validate([
            'at_name' => 'required',
            'typetv_id' => 'required',
            'at_type' => 'required',
            'at_detail' => 'required',
            'at_note' => 'required',
        ]);
        $acttravels = Acttravel::find($at_id);
        $acttravels->at_name = $request->at_name;
        $acttravels->typetv_id = $request->typetv_id;
        $acttravels->at_type = $request->at_type;
        $acttravels->at_detail = $request->at_detail;
        $acttravels->at_note = $request->at_note;

        $acttravels->save();
        return redirect()->route('acttravel.index')->with('success', 'Acttravel has been updated successfully.');
    }

    public function destroy(Acttravel $acttravel) {
        $acttravel->delete();
        return redirect()->route('acttravel.index')->with('success', 'Acttravel has been deleted successfully.');
    }    
}
