<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCsvSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/product.csv');

        if (!file_exists($path)) {
            dd('❌ CSV introuvable');
        }

        $file = fopen($path, 'r');

        // Lire l'en-tête (même s’il est mal formé)
        fgetcsv($file, 0, ',', '"');

        while (($row = fgetcsv($file, 0, ',', '"')) !== false) {

            // Sécurité minimale
            if (count($row) < 5) continue;

            // Nettoyage & sécurisation
            $nom = trim($row[0]);
            $image = trim($row[1]);
            $prix = is_numeric($row[2]) ? (float) $row[2] : 0;

            // 
            $reduction = is_numeric($row[3]) ? (float) $row[3] : 0;

            $ventes = is_numeric($row[4])
                ? (int) $row[4]
                : (int) preg_replace('/\D/', '', $row[4]);

            DB::table('product')->insert([
                'nom_p' => $nom,
                'imag_p' => $image,
                'prix_p' => $prix,
                'pourcentage_reduction' => $reduction,
                'nb_vente' => $ventes,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        fclose($file);

        dump('✅ Import CSV AliExpress terminé avec succès');
    }
}
