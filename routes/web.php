<?php
use App\Url;

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
    // $url = new App\Url;
    // $url->url = "http://blabla.com";
    // $url->shortened = "azert";
    // $url->save();

    return view('url');
});

Route::post('/', function() {

    // Valider l'url
    $data = ['url' => request('url')];
    $rules = ['url' => 'required | url']; // Liste des validations : Available Validation Rules. Ici on utilise 2 validations, séparées par un pipe.

    $validation = Validator::make($data, $rules);  // On utilise la façade Validator, disponible à la racine, dans le namespace global

    $validation->validate(); // LA méthode validate() nous renvoie à la page précédente si la validation ne passe pas.


    // Vérifier si l'url existe déjà dans notre table
    $url = App\Url::where('url', request('url'))->first();

    if($url){
      // Si l'adresse url existe, on retourne une vue avec la valeur de l'attribut shortened
      return view('result')->withShortened($url->shortened);
    }


    // Créer une nouvelle short adresse et la retourner
    $newUrl = App\Url::create([
      'url' => request('url'),
      'shortened' => App\Url::getUniqueShortUrl()
    ]);

    if($newUrl){
      return view('result')->withShortened($newUrl->shortened);
    }

});

// Quand on clique sur le lien de la page result.blade.php
Route::get('/{shortened}', function ($shortened) {

    // On récupère la première entrée de la table Urls ou le champ shortened correspond à la valeur du paramètre $shortened
    $url = App\Url::whereShortened($shortened)->first();

    // Si il n'y a pas d'entrée
    if(! $url){
      // On renvoie sur la page d'accueil
      return redirect('/');
    } else {
      // Sinon, on redirige vers l'url qui correspond à l'adresse url raccourcie
      return redirect($url->url);
    }
});
