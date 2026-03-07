<?php

namespace App\Services;

use App\Repositories\Salle\SalleInterfaceImpl;

class SalleService{

    public function __construct(
        private SalleInterfaceImpl $repository
    )
    {}

    public function getAllSalles(){
        return $this->repository->findAll();
    }
    public function createSalle($data){
        return $this->repository->create($data);
    }

    public function updateSalle($data,$salle){
        return $this->repository->update($data,$salle);
    }
    public function deleteSalle($salle){
        return $this->repository->delete($salle);
    }

}