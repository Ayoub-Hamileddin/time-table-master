<?php

namespace App\Repositories\Filiere;

interface FiliereInterface {
    public function findAll();
    public function create($data);
}