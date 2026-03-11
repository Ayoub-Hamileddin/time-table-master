<?php

namespace App\repositories\Seance;

use App\Models\Seance;

class SeanceInterfaceImpl implements SeanceInterface
{
    public function createOrUpdate($data)
    {
       $message = "" ;
       $seance = Seance::where("jour",$data["jour"])
                    ->where("creneau",$data["creneau"])
                    ->where("groupe_id",$data["groupe_id"])
                    ->first();
        if ($seance) {
            $seance->update([
                "salle_id" => $data["salle_id"]??$seance->salle_id,
                "groupe_id" => $data["groupe_id"]??$seance->groupe_id,
                "formateur_id" => $data["formateur_id"]??$seance->formateur_id,
            ]);
            $message =  "seance updated successfuly";
            }else{
                Seance::create($data);
                $message =  "seance created successfuly";
        }
        return $message;
    }


    public function getSeanceByGroupeId($groupeId){
        return Seance::with(["formateur","salle"])
            ->where("groupe_id",$groupeId)
            ->get();
    
    }
}