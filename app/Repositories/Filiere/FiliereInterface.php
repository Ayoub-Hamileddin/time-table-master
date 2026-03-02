<?php

namespace App\Repositories\Filiere;

interface FiliereInterface {
    public function findAll();
    public function create($data);
    public function update(array $data,$filiere);
    public function getOptionsFromAnnee($annee);
}