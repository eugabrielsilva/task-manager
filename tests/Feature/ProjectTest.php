<?php

namespace Tests\Feature;

use App\Models\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_project()
    {
        $project = [
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString()
        ];

        $response = $this->post(route('projects.create'), $project);
        $response->assertStatus(302);
        $this->assertDatabaseHas('projects', $project);
    }

    public function test_it_cannot_create_a_project_with_invalid_data()
    {
        $response = $this->post(route('projects.create'), [
            'title' => '',
            'delivery_date' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title', 'delivery_date']);
    }

    public function test_it_can_edit_a_project()
    {
        $currentDate = now()->addDays(7);
        $futureDate = $currentDate->addDays(3);

        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => $currentDate->toDateString(),
        ]);

        $editedProject = [
            'id' => $project->id,
            'title' => 'Projeto Teste Editado',
            'description' => 'Descrição do projeto editado',
            'delivery_date' => $futureDate->toDateString(),
        ];

        $response = $this->post(route('projects.edit'), $editedProject);
        $response->assertStatus(302);
        $this->assertDatabaseHas('projects', $editedProject);
    }

    public function test_it_cannot_edit_a_project_with_invalid_data()
    {
        $response = $this->post(route('projects.edit'), [
            'id' => '',
            'title' => '',
            'delivery_date' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['id', 'title', 'delivery_date']);
    }

    public function test_it_cannot_edit_an_invalid_project()
    {
        $response = $this->post(route('projects.edit'), [
            'id' => uniqid(),
            'title' => 'Teste projeto inválido',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function test_it_can_delete_a_project()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $response = $this->get(route('projects.delete', ['id' => $project->id]));

        $response->assertStatus(302);
        $this->assertSoftDeleted('projects', ['id' => $project->id]);
    }

    public function test_it_cannot_delete_an_invalid_project()
    {
        $response = $this->get(route('projects.delete', ['id' => uniqid()]));
        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }
}
