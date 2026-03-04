<?php

namespace App\Services;

use App\Repositories\Groupe\GroupeInterfaceImpl;

class GroupeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private GroupeInterfaceImpl $repository 
    )
    {
        //
    }
    public function createGroupe($data){
        return $this->repository->create($data);
    }
    public function getGroupeById(int $id){
        return $this->repository->getGroupeById($id);
    }

    public function updateGroupe($id,$data){
        return $this->repository->update($id,$data);
    }

    public function deleteGroupe($filiere){
        return $this->repository->delete($filiere);
    }

    public function getAllGroupes(){
        return $this->repository->getAll();
    }

}
