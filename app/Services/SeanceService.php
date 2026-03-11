<?php


namespace App\Services;

use App\repositories\Seance\SeanceInterfaceImpl;

class SeanceService{
    public function __construct(
        private SeanceInterfaceImpl $repository
    )
    {}


    public function getAllDataSeance(){
        
    }
    public function createOrUpdateSeance($data){
        return $this->repository->createOrUpdate($data);
    }
    public function getSeanceByGroupe($groupeId){
        return $this->repository->getSeanceByGroupeId($groupeId);
    }
}