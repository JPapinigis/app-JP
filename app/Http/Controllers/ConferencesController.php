<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConferencesController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('index', ['conferences' => $conferences]);

    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'organizer' => 'required|max:255',
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
            'description' => 'nullable|max:255',
        ]);

            $conference = new Conference();
            $conference->title = $validatedData['title'];
            $conference->organizer = $validatedData['organizer'];
            $conference->start_date = $validatedData['start_date'];
            $conference->end_date = $validatedData['end_date'];
            $conference->description = $validatedData['description'];
            $conference->save();

            return redirect()->route('conferences.index')->with('success', 'Conference created successfully.');
    }
    public function show($id)
    {
        $conference = Conference::findOrFail($id);

        return view('conferences.show', ['conference' => $conference]);
    }

    // Edit method to show the edit conference form
    public function edit($id)
    {
        $conference = Conference::findOrFail($id);

        return view('edit', ['conference' => $conference]);
    }

    // Update method to handle the updating of a conference
    public function update(Request $request, $id)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'organizer' => 'required|max:255',
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
            'description' => 'nullable|max:255',
        ]);

        // Update the conference
        $conference = Conference::findOrFail($id);
        $conference->title = $validatedData['title'];
        $conference->organizer = $validatedData['organizer'];
        $conference->start_date = $validatedData['start_date'];
        $conference->end_date = $validatedData['end_date'];
        $conference->description = $validatedData['description'];
        $conference->save();

        return redirect()->route('conferences.index', ['id' => $id])->with('success', 'Conference updated successfully.');
    }

    // Delete method to handle the deletion of a conference
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conferences.index')->with('success', 'Conference deleted successfully.');
    }

}
