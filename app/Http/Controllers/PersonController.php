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

        return redirect('/person/create')->with('success', 'شخص با موفقیت اضافه شد.');
    }
    public function edit(Person $person)
    {
        $statuses = Status::all();
        return view('person.edit', compact('person', 'statuses'));
    }

    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
           'name' => 'required|string|max:255',
           'status_id' => 'required|exists:statuses,id',
           'hospital' => 'nullable|string|max:255',
        ]);

        $person->update($validated);

        return redirect('/')->with('success', 'اطلاعات با موفقیت ویرایش شد.');
    }

    public function destroy($personId)
    {
        $person = Person::findOrFail($personId);
        $person->delete();

        return redirect('/admin')->with('success', 'Person deleted successfully');

    }
}
