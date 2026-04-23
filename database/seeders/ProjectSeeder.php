<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'AgriPredict Katanga',
            'description' => 'Système de prédiction des rendements agricoles basé sur les données météo de Lubumbashi.',
            'link' => 'https://github.com/votre-compte/agripredict'
        ]);

        Project::create([
            'title' => 'Visual AI Professor',
            'description' => 'Projet de système multimodal d\'intelligence artificielle pour l\'enseignement technique.',
            'link' => '#'
        ]);
    }
}