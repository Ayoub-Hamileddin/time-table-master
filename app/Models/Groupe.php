<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $fillable = ["code","annee","filiere_id"];

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function seances(){
        return $this->hasMany(Seance::class);
    }
}
