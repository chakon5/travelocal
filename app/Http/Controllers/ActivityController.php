<?php

namespace App\Http\Controllers;

use App\Models\activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Create Index
    public function index() {
        $data['activity'] = Activity::orderBy('activity_id', 'asc')->paginate(5);
        return view('activity.index', $data);
    }

    // Create resource
    public function create() {
        return view('activity.create');
    }

    // Store resource
    public function store(Request $request ) {
        $request->validate([
            'activity_name' => 'required',
            'activity_price' => 'required',
            'activity_detail' => 'required',
            'activity_note' => 'required',
        ]);

        $activities = new Activity;
        $activities->activity_name = $request->activity_name;
        $activities->activity_price = $request->activity_price;
        $activities->activity_detail = $request->activity_detail;
        $activities->activity_note = $request->activity_note;
        
        $activities->save();
        return redirect()->route('activity.index')->with('success', 'Activity has been created successfully.');
    }

    public function edit(Activity $activity) {
        return view('activity.edit', compact('activity'));
    }

    public function update(Request $request, $activity_id) {
        $request->validate([
            'activity_name' => 'required',
            'activity_price' => 'required',
            'activity_detail' => 'required',
            'activity_note' => 'required',
        ]);
        $activities = Activity::find($activity_id);
        $activities->activity_name = $request->activity_name;
        $activities->activity_price = $request->activity_price;
        $activities->activity_detail = $request->activity_detail;
        $activities->activity_note = $request->activity_note;

        $activities->save();
        return redirect()->route('activity.index')->with('success', 'Activity has been updated successfully.');
    }

    public function destroy(Activity $activity) {
        $activity->delete();
        return redirect()->route('activity.index')->with('success', 'Activity has been deleted successfully.');
    }   
}
