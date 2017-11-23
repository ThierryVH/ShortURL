<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $timestamps = false;

    protected $fillable = ['url', 'shortened'];

    // On crée une fonction statique pour générer une nouvelle adresse raccourcie
    public static function getUniqueShortUrl(){

      $shortened = str_random('5'); // On attribue une string aléatoire de 5 caractères

      // Si on trouve déjà une entrée dans la table avec le shortened qui vient d'être généré
      if(static::whereShortened($shortened)->count() != 0){
        // On rappelle la fonction pour générer une nouvelle chaîne
        return static::getUniqueShortUrl();
      }

      return $shortened;
    }
}
