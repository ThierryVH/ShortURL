<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $timestamps = false; // Je précise ne pas vouloir modifier le updated_at et created_at
}
