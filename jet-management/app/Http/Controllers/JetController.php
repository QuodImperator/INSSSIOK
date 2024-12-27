<?php

namespace App\Http\Controllers;

use App\Models\Jet;
use Illuminate\Http\Request;

class JetController extends Controller
{
    public function index(Request $request)
    {
        $jets = Jet::when($request->search, function($query, $search) {
            return $query->search($search);
        })->paginate(10);
        
        return view('jets.index', compact('jets'));
    }

    public function create()
    {
        return view('jets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        Jet::create($validated);
        return redirect()->route('jets.index')->with('success', 'Jet created successfully');
    }

    public function show(Jet $jet)
    {
        return view('jets.show', compact('jet'));
    }

    public function edit(Jet $jet)
    {
        return view('jets.edit', compact('jet'));
    }

    public function update(Request $request, Jet $jet)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $jet->update($validated);
        return redirect()->route('jets.index')->with('success', 'Jet updated successfully');
    }

    public function destroy(Jet $jet)
    {
        $jet->delete();
        return redirect()->route('jets.index')->with('success', 'Jet deleted successfully');
    }
}