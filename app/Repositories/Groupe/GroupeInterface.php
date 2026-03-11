<?php 
namespace App\Repositories\Groupe;

use App\Models\Filiere;

interface GroupeInterface{
    public function create($data);
    public function getGroupeById(int $id);
    public function update(int $id,$data );
    public function delete($filiere);
    public function getAllWithoutPagination();
}