<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public function groupes(){
        return $this->hasMany(Groupe::class);
    }
}
