<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::latest()->get();
        return view('clinics.index', compact('clinics'));
    }

    public function create()
    {
        return view('clinics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'phone' => 'nullable',
            'hours' => 'nullable',
        ]);

        Clinic::create($request->all());

        return redirect()
            ->route('clinics.index')
            ->with('success', 'Clinic added successfully!');
    }

    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinics.edit', compact('clinic'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'phone' => 'nullable',
            'hours' => 'nullable',
        ]);

        $clinic = Clinic::findOrFail($id);
        $clinic->update($request->all());

        return redirect()
            ->route('clinics.index')
            ->with('success', 'Clinic updated successfully!');
    }

    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        return redirect()
            ->route('clinics.index')
            ->with('success', 'Clinic deleted successfully!');
    }
}
