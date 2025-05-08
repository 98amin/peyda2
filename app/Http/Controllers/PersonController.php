<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Status;

class PersonController extends Controller
{
    //
    public function create()
    {
        $statuses = Status::all();
        return view('person.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'hospital' => 'nullable|string|max:255',
        ]);

        Person::create($validated);

        return redirect('/')->with('success', 'شخص با موفقیت اضافه شد.');
    }
}
