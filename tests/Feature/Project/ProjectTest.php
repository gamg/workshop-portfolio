<?php

namespace Tests\Feature\Project;

use App\Http\Livewire\Project\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Project as ProjectModel;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function project_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('project.project');
    }

    /** @test */
    public function component_can_load_projects()
    {
        $projects = ProjectModel::factory(2)->create();

        Livewire::test(Project::class)
                ->assertSee($projects->first()->name)
                ->assertSee($projects->first()->image)
                ->assertSee($projects->last()->name)
                ->assertSee($projects->last()->image);
    }
}
