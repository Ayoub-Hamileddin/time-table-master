<?php
namespace App\Repositories\Salle;
use App\Models\Salle;
use App\Repositories\Salle\SalleInterface;

class SalleInterfaceImpl implements SalleInterface{
    
    public function findAll(){
        return Salle::paginate(5);
    }
    public function create($data)
    {
        return Salle::create($data);
    }

    public function update($data, $salle)
    {
        return $salle->update($data);
    }
    public function delete($salle)
    {
        return $salle->delete();
    }
    
    public function getAllWithoutPagination()
    {
        return Salle::all();
    }
}