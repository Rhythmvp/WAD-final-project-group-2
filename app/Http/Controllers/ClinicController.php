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
    Clinic::create($request->all());
    return redirect('/clinics');
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
    $clinic = Clinic::findOrFail($id);
    $clinic->update($request->all());
    return redirect('/clinics');
}

public function destroy($id) {
    $clinic = Clinic::findOrFail($id);
    $clinic->delete();
    return redirect('/clinics');
}

}
