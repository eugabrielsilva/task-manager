<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the project

        $project = Project::create([
            'title' => 'Teste técnico',
            'description' => 'Desenvolver o teste técnico em Laravel',
            'delivery_date' => now()->toDateString()
        ]);

        // Create the tasks

        Task::create([
            'project_id' => $project->id,
            'description' => 'Criar o projeto em Laravel',
            'status' => 'finished'
        ]);

        Task::create([
            'project_id' => $project->id,
            'description' => 'Estruturar o banco de dados e migrations',
            'status' => 'finished'
        ]);

        $controllersTask = Task::create([
            'project_id' => $project->id,
            'description' => 'Criar os controllers',
            'status' => 'finished'
        ]);

        $viewsTask = Task::create([
            'project_id' => $project->id,
            'description' => 'Criar as views',
            'status' => 'finished'
        ]);

        Task::create([
            'project_id' => $project->id,
            'description' => 'Realizar testes',
            'status' => 'finished'
        ]);

        Task::create([
            'project_id' => $project->id,
            'description' => 'Avaliação do teste técnico'
        ]);

        Task::create([
            'project_id' => $project->id,
            'description' => 'Contratação'
        ]);

        // Create the subtasks

        Task::create([
            'task_id' => $controllersTask->id,
            'project_id' => $project->id,
            'description' => 'Projects Controller',
            'status' => 'finished'
        ]);

        Task::create([
            'task_id' => $controllersTask->id,
            'project_id' => $project->id,
            'description' => 'Tasks Controller',
            'status' => 'finished'
        ]);

        Task::create([
            'task_id' => $viewsTask->id,
            'project_id' => $project->id,
            'description' => 'Listagem de projetos',
            'status' => 'finished'
        ]);

        Task::create([
            'task_id' => $viewsTask->id,
            'project_id' => $project->id,
            'description' => 'Criar / editar projeto',
            'status' => 'finished'
        ]);

        Task::create([
            'task_id' => $viewsTask->id,
            'project_id' => $project->id,
            'description' => 'Listagem de tarefas',
            'status' => 'finished'
        ]);

        Task::create([
            'task_id' => $viewsTask->id,
            'project_id' => $project->id,
            'description' => 'Criar / editar tarefas',
            'status' => 'finished'
        ]);
    }
}
