<?php
namespace App\Repositories\Groupe;

use App\Models\Filiere;

class FiliereImplementation implements FiliereInterface {

    public function findAll()
    {
        return Filiere::paginate(5);
    }

}