<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Navitem;
use App\Models\PersonalInformation;
use App\Models\Project;
use App\Models\SocialLink;
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

        Project::factory(3)->create();

        SocialLink::factory()->create([
            'name' => 'Twitter',
            'url' => 'https://twitter.com/gamg_',
            'icon' => 'fa-brands fa-twitter',
        ]);

        SocialLink::factory()->create([
            'name' => 'Youtube',
            'url' => 'https://www.youtube.com/channel/UCAhUwzPtyWu7Bj5vmjq9YEA',
            'icon' => 'fa-brands fa-youtube',
        ]);
    }
}
