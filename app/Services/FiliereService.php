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

    public function createFilieres(array $data){
        return $this->repository->create($data);
    }
}
