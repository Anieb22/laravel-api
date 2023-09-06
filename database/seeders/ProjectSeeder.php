<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all();

        for ($i = 0; $i < 10; $i++){
            $newProject = new Project();
            $newProject->azienda = $faker->word();
            $newProject->nome_progetto = $faker->word();
            $newProject->descrizione = $faker->paragraph();
            $newProject->passaggi = $faker->paragraph();
            $newProject->data_di_creazione = $faker->date('Y_m_d');
            $newProject->thumb = $faker->imageUrl(640, 480, 'animals', true);
            $newProject->type_id = $faker->randomElement($types)->id;
    
            $newProject->save();
        }
    }
}
