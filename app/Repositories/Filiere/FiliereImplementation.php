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

}