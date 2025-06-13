<?php

namespace Database\Seeders;

use App\Models\Planning\Materiel;
use App\Models\User;
use Illuminate\Database\Seeder;

class MaterielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materiels = [
            // Équipements sportifs
            'Ballons de football',
            'Ballons de basketball',
            'Ballons de volleyball',
            'Ballons de handball',
            'Cônes de signalisation',
            'Plots d\'entraînement',
            'Chasubles',
            'Sifflets',
            'Chronomètres',
            'Filets de but',
            'Poteaux de but',
            'Tapis de gymnastique',
            'Cerceaux',
            'Cordes à sauter',
            'Échelles d\'agilité',
            'Haies d\'athlétisme',
            'Poids et haltères',
            'Élastiques de résistance',
            'Médecine balls',
            'Kettlebells',
            
            // Matériel de transport et rangement
            'Sacs de transport',
            'Chariots à ballons',
            'Bacs de rangement',
            'Filets de transport',
            'Cônes empilables',
            
        ];

        $userId = User::first()->id ?? 1;

        foreach ($materiels as $materiel) {
            Materiel::create([
                'nom_materiel' => $materiel,
                'user_id_creation' => $userId,
            ]);
        }
    }
}