<?php 
namespace   App\Services;

use App\Repositories\Formateur\FormateurInterfaceImpl;

class FormateurService {

    public function __construct(
        private FormateurInterfaceImpl $repository 
    )
    {
        
    }


    public function getAllFormateur(){
        return $this->repository->findAll();
    }
    public function createFormateur($data){
        return $this->repository->create($data);
    }

    public function updateFormateur($data,$formateur){
        return $this->repository->update($data,$formateur);
    }
    public function getAllWithoutPagination(){
        return $this->repository->getAllWithoutPagination();
    }
}