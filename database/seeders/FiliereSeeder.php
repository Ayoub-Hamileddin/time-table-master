<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $filieres = [

            // ===== 1ère année (Tronc Commun) =====
            [
                'nom' => 'Digital Design',
                'annee' => 1,
                'option' => null,
            ],
            [
                'nom' => 'Développement Digital',
                'annee' => 1,
                'option' => null,
            ],
            [
                'nom' => 'Intelligence Artificielle',
                'annee' => 1,
                'option' => null,
            ],
            [
                'nom' => 'Infrastructure Digitale',
                'annee' => 1,
                'option' => null,
            ],

            // ===== 2ème année =====
            [
                'nom' => 'Digital Design',
                'annee' => 2,
                'option' => 'UI Designer',
            ],
            [
                'nom' => 'Digital Design',
                'annee' => 2,
                'option' => 'UX Designer',
            ],
            [
                'nom' => 'Développement Digital',
                'annee' => 2,
                'option' => 'Applications Mobiles',
            ],
            [
                'nom' => 'Développement Digital',
                'annee' => 2,
                'option' => 'Web Full Stack',
            ],
            [
                'nom' => 'Intelligence Artificielle',
                'annee' => 2,
                'option' => 'Assistant Data Analyst',
            ],
            [
                'nom' => 'Intelligence Artificielle',
                'annee' => 2,
                'option' => 'Développeur Chatbots',
            ],
            [
                'nom' => 'Infrastructure Digitale',
                'annee' => 2,
                'option' => 'Cyber sécurité',
            ],
            [
                'nom' => 'Infrastructure Digitale',
                'annee' => 2,
                'option' => 'Systèmes et Réseaux',
            ],
        ];

        foreach ($filieres as $filiere) {
            Filiere::create($filiere);
        }
    }
}
