<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::factory()->count(500)->create();
        // Alumno::factory()
        // ->count(50)
        // ->haspost(1)
        // ->create();
        // DB::table('alumnos')->insert([
        //     'nombre' => Str::random(10),
        //     'appaterno' => Str::random(10),
        //     'apmaterno' => Str::random(10),
        // ]);
    }
}
