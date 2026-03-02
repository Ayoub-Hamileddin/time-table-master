<?php
namespace App\Repositories\Filiere;

use App\Models\Filiere;

class FiliereImplementation implements FiliereInterface {

    public function findAll()
    {
        return Filiere::paginate(5);
    }

    public function create($data)
    {
        return Filiere::create($data);
    }
    
    public function update($data,$filiere){
        return $filiere->update($data);
    }
    public function getOptionsFromAnnee($annee){
        return Filiere::where("annee",$annee)
                  ->select("id","nom","option")
                  ->distinct()
                  ->get();
    }
}