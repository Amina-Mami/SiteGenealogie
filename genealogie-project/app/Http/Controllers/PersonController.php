<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
  

    public function index()
    {
        $people = Person::with('creator')->get();
        return view('people.index', compact('people'));
    }
    public function show($id)
    {
    
        $person = Person::with(['children', 'parents'])->findOrFail($id);

      
        return view('people.show', compact('person'));
    }
    public function create()
    {
        $users = User::all();
        return view('people.create', compact('users'));
    }
   

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'created_by' => 'required|exists:users,id',  
        ]);
    
      
    $first_name = ucfirst(strtolower($validatedData['first_name']));

    $middle_names = isset($validatedData['middle_names']) 
        ? implode(', ', array_map('ucwords', array_map('strtolower', explode(',', $validatedData['middle_names'])))) 
        : null;

    $last_name = strtoupper($validatedData['last_name']);

    $birth_name = isset($validatedData['birth_name']) 
        ? strtoupper($validatedData['birth_name']) 
        : $last_name;

    $date_of_birth = isset($validatedData['date_of_birth']) 
        ? Carbon::parse($validatedData['date_of_birth'])->format('Y-m-d') 
        : null;
    
       
        $person = new Person();
        $person->first_name = $first_name;
        $person->middle_names = $middle_names;
        $person->last_name = $last_name;
        $person->birth_name = $birth_name;
        $person->date_of_birth = $date_of_birth;
        $person->created_by = $validatedData['created_by'];  
        $person->save();
    
      
        return redirect()->route('people.index')->with('success', 'Person created successfully.');
    }
    
    
}
