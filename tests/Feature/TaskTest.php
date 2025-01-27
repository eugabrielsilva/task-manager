<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_task()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $task = [
            'description' => 'Tarefa Teste',
            'project_id' => $project->id
        ];

        $response = $this->post(route('tasks.create'), $task);
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $task);
    }

    public function test_it_cannot_create_a_task_with_invalid_data()
    {
        $response = $this->post(route('tasks.create'), [
            'description' => '',
            'project_id' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description', 'project_id']);
    }

    public function test_it_cannot_create_a_task_within_an_invalid_project()
    {
        $response = $this->post(route('tasks.create'), [
            'description' => 'Tarefa com projeto inválido',
            'project_id' => uniqid()
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function test_it_can_create_a_subtask()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $task = Task::create([
            'description' => 'Tarefa Teste',
            'project_id' => $project->id
        ]);

        $subtask = [
            'description' => 'Subtarefa Teste',
            'project_id' => $project->id,
            'task_id' => $task->id
        ];

        $response = $this->post(route('tasks.create-subtask'), $subtask);
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $subtask);
    }

    public function test_it_cannot_create_a_subtask_with_invalid_data()
    {
        $response = $this->post(route('tasks.create-subtask'), [
            'description' => '',
            'task_id' => ''
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description', 'task_id']);
    }

    public function test_it_cannot_create_a_subtask_within_an_invalid_task()
    {
        $response = $this->post(route('tasks.create-subtask'), [
            'description' => 'Subtarefa com tarefa inválida',
            'task_id' => uniqid()
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function test_it_can_edit_a_task()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $task = Task::create([
            'description' => 'Tarefa Teste',
            'project_id' => $project->id,
            'status' => 'pending'
        ]);

        $editedTask = [
            'id' => $task->id,
            'description' => 'Tarefa Teste Editada',
            'status' => 'finished'
        ];

        $response = $this->post(route('tasks.edit'), $editedTask);
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $editedTask);
    }

    public function test_it_cannot_edit_a_task_with_invalid_data()
    {
        $response = $this->post(route('tasks.edit'), [
            'id' => '',
            'description' => '',
            'status' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['id', 'description', 'status']);
    }

    public function test_it_cannot_edit_an_invalid_task()
    {
        $response = $this->post(route('tasks.edit'), [
            'id' => uniqid(),
            'description' => 'Teste tarefa inválida',
            'status' => 'pending'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function test_it_can_finish_a_task()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $task = Task::create([
            'description' => 'Tarefa Teste',
            'project_id' => $project->id,
            'status' => 'pending'
        ]);

        $response = $this->get(route('tasks.finish', ['id' => $task->id]));

        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'status' => 'finished'
        ]);
    }

    public function test_it_cannot_finish_an_invalid_task()
    {
        $response = $this->get(route('tasks.finish', ['id' => uniqid()]));
        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function test_it_can_delete_a_task()
    {
        $project = Project::create([
            'title' => 'Projeto Teste',
            'description' => 'Descrição do projeto',
            'delivery_date' => now()->addDays(7)->toDateString(),
        ]);

        $task = Task::create([
            'description' => 'Tarefa Teste',
            'project_id' => $project->id,
            'status' => 'pending'
        ]);

        $response = $this->get(route('tasks.delete', ['id' => $task->id]));

        $response->assertStatus(302);
        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }

    public function test_it_cannot_delete_an_invalid_task()
    {
        $response = $this->get(route('tasks.delete', ['id' => uniqid()]));
        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }
}
