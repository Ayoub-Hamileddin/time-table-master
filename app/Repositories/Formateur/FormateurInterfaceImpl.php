<?php

namespace App\Repositories\Formateur;

use App\Models\Formateur;
class FormateurInterfaceImpl implements FormateurInterface {

    public function findAll(){
        return Formateur::paginate(5);
    }
    public function create($data)
    {
        return Formateur::create($data);
    }
    public function update($data,$formateur)
    {
        return $formateur->update($data);
    }
}
