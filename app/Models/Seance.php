<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{


    protected $fillable = ["groupe_id","formateur_id","salle_id","jour","creneau"];

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public function formateur(){
        return $this->belongsTo(Formateur::class);
    }

    public function salle(){
        return $this->belongsTo(Salle::class);
    }
}
