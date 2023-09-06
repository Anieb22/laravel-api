<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'News', 'Sport', 'Music', 'Art'
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->type = $type;
            $newType->save();
        }
    }
}
