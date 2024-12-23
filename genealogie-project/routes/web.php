<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('people', PersonController::class);


Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');

Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');




Route::get('/test-degree', function () {
    DB::enableQueryLog(); 
    $timestart = microtime(true); 

 
    $person = Person::findOrFail(84);

    
    $degree = $person->getDegreeWith(1265);

  
    $time = microtime(true) - $timestart;
    $nb_queries = count(DB::getQueryLog());

   
    return response()->json([
        'degree' => $degree,
        'execution_time' => $time,
        'number_of_queries' => $nb_queries
    ]);
});
