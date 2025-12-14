<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index() {
    $clinics = Clinic::all();
    return view('clinics.clinic_index', compact('clinics'));
}

public function create() {
    return view('clinics.clinic_create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'phone' => 'nullable|string',
        'hours' => 'nullable|string',
    ]);
    
    Clinic::create($request->all());
    return redirect()->route('clinics.index')->with('success', 'Clinic created!');
}

public function show($id) {
    $clinic = Clinic::findOrFail($id);
    return view('clinics.clinic_show', compact('clinic'));
}

public function edit($id) {
    $clinic = Clinic::findOrFail($id);
    return view('clinics.clinic_edit', compact('clinic'));
}

public function update(Request $request, $id) {
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'phone' => 'nullable|string',
        'hours' => 'nullable|string',
    ]);
    
    $clinic = Clinic::findOrFail($id);
    $clinic->update($request->all());
    return redirect()->route('clinics.index')->with('success', 'Clinic updated!');
}

public function destroy($id) {
    $clinic = Clinic::findOrFail($id);
    $clinic->delete();
    return redirect()->route('clinics.index')->with('success', 'Clinic deleted!');
}

}
