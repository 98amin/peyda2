<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Status;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $people = Person::with('status')->when($search, function($query, $search){
            $query->where('name', 'like', "%{search}%");
        })
        ->get();

        return view('admin.adminHome', compact('people', 'search'));
    }
}
