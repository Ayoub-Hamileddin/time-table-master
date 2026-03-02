<?php

namespace App\Services;

use App\Repositories\Filiere\FiliereImplementation;

class FiliereService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private FiliereImplementation $repository
    )
    {
        //
    }


    public function listFiliers(){
        return $this->repository->findAll();
    }

    public function createFiliere(array $data){
        return $this->repository->create($data);
    }

    public function updateFiliere(array $data,$filiere ){
        return $this->repository->update($data,$filiere);
    }

    public function getOptions($annee){
        return $this->repository->getOptionsFromAnnee($annee);
    }
}
