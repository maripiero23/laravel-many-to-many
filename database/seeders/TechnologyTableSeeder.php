<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies= ["html&css", "javascript", "vue", "php", "axios"];

        foreach ($technologies as$technology) {
            //Creo una nuova istanza
            Technology::create([
                "name"=> $technology,
                "description"=> "Descrizione del progetto" . $technology
            ]);
        }
    }
}
