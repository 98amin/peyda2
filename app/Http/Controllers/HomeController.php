<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Status;

class HomeController extends Controller
{
    //
    public function index()
    {

        return view('home');
    }

    public function searchResult(Request $request)
    {
        $search = $request->input('search');
        $statusId = $request->input('status_id');

        $people = Person::with('status')
            ->when($search, function($query, $search){
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($statusId, function($query, $statusId){
                $query->where('status_id', $statusId);
            })
            ->paginate(10);

        $statuses = Status::all();
        return view('results', compact('people', 'search', 'statuses', 'statusId'));
    }
}
