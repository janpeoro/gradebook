<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\GradingComponent; // Import the GradingComponent model

class GradingComponentController extends Controller
{
    public function index()
    {
        $components = GradingComponent::all();
    
        // Retrieve the first saved class standing and percentage
        $classStandingData = GradingComponent::select('class_standing', 'percentage')->first();
    
        // Pass the components and classStandingData to the view
        return view('grading-components.index', [
            'components' => $components,
            'class_standing' => $classStandingData ? $classStandingData->class_standing : 'Class Standing',
            'percentage' => $classStandingData ? $classStandingData->percentage : 40
        ]);
    }
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'class_standing' => 'required|string|max:255',
        'percentage' => 'required|numeric|min:0|max:100',
        'assessment_type' => 'required|string|max:255',
        'assessment_percentage' => 'required|numeric|min:0|max:100',
    ]);

    // Save Class Standing and Percentage
    $component = GradingComponent::first();
    if (!$component) {
        $component = new GradingComponent();
    }
    $component->class_standing = $request->input('class_standing');
    $component->percentage = $request->input('percentage');
    $component->save();

    // Save Assessment Type and Assessment Percentage
    GradingComponent::create([
        'class_standing' => '', // Empty as it will not be used in table body
        'percentage' => 0, // Empty as it will not be used in table body
        'assessment_type' => $request->input('assessment_type'),
        'assessment_percentage' => $request->input('assessment_percentage'),
    ]);

    // Redirect back with a success message
    return redirect()->route('grading-components.index')->with('success', 'Class Standing and Assessment saved successfully!');
}

public function updateClassStanding(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'class_standing' => 'required|string|max:255',
        'percentage' => 'required|numeric|min:0|max:100',
    ]);

    // Update the first record (or add logic if you have multiple records)
    $component = GradingComponent::first(); // Retrieve the first GradingComponent record

    // If no existing record is found, create one
    if (!$component) {
        $component = new GradingComponent();
    }

    // Update the fields
    $component->class_standing = $request->input('class_standing');
    $component->percentage = $request->input('percentage');
    $component->save(); // Save the updated values to the database

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Class Standing updated successfully!');
}



}