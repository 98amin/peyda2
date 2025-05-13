<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

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
        $people = Person::with('status')->when($search, function($query, $search){
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('results', compact('people', 'search'));
    }
}
