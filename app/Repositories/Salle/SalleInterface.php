<?php
namespace App\Repositories\Salle;

interface SalleInterface{
public function findAll();
public function create($data);

public function update($data,$salle);
public function delete($salle);


}