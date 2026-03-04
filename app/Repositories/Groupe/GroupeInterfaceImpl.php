<?php

namespace App\Repositories\Groupe;

use App\Models\Groupe;
use App\Repositories\Groupe\GroupeInterface;

class GroupeInterfaceImpl implements GroupeInterface {


    public function getAll(){
        return Groupe::with("filiere")
            ->paginate(5);
    }
    public function create($data)
    {
        return Groupe::create($data);
    }
    public function getGroupeById($id)
    {
        return Groupe::with("filiere")
            ->findOrFail($id);
    }

    public function update(int $id ,$data ){
        $groupe = $this->getGroupeById($id);
        $groupe->update([
            "code" => $data["code"],
            "annee" => $data["annee"],
            "filiere_id " => $data["filiere_id"],
        ]);
        return $groupe ;
    }

    public function delete($filiere)
    {
        return $filiere->delete();
    }

}