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

    /** @test */
    public function user_can_see_all_project_info()
    {
        $project = ProjectModel::factory()->create([
            'image' => 'myproject.jpg',
            'video_link' => 'https://www.youtube.com/watch?v=K4TOrB7at0Y',
            'url' => 'https://www.cafedelprogramador.com/',
            'repo_url' => 'https://github.com/gamg/workshop-portfolio',
        ]);

        Livewire::test(Project::class)
            ->call('loadProject', $project->id)
            ->assertSee($project->name)
            ->assertSee($project->description)
            ->assertSee($project->image)
            ->assertSee($project->video_code)
            ->assertSee($project->url)
            ->assertSee($project->repo_url);
    }
}
