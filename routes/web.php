<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function() {
    //dd(request('test')); // On affiche la valeur entrée dans l'input quia pour name 'test'
    //dd(Request::get('test')); Même resultat mais en utilisant les façades

    // Valider URL

    // Vérifier si l'URL a déjà été raccourcie

    $url = App\Url::where('url', request('url'))->first(); // On crée un objet $url correspondant à la première entrée de notre table

    if($url){
      return view('result')->with('shortener', $url->shortener );
      return view('result')->withShortener($url->shortener ); // On obtient le même résultat 
    }
});
