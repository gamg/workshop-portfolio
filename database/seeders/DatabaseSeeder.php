<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Navitem;
use App\Models\PersonalInformation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Gustavo',
             'email' => 'tavo@cdp.com',
         ]);

         Navitem::factory()->create([
             'label' => 'Hola',
             'link'  => '#hola'
         ]);

        Navitem::factory()->create([
            'label' => 'Proyectos',
            'link'  => '#proyectos'
        ]);

        Navitem::factory()->create([
            'label' => 'Contacto',
            'link'  => '#contacto'
        ]);

        PersonalInformation::factory()->create();
    }
}
