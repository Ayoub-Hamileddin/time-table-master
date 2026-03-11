<?php

namespace App\repositories\Seance;

interface SeanceInterface
{
    public function createOrUpdate($data);
    public function getSeanceByGroupeId($data);
}
