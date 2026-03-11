<?php 

namespace App\Repositories\Formateur;

interface FormateurInterface{
    public function findAll();
    public function create($data);
    public function update($data,$formateur);
    public function getAllWithoutPagination();
}