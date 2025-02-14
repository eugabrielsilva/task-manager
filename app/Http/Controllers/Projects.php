<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Projects
{
    /**
     * List projects.
     */
    public function index()
    {
        $projects = Project::orderBy('delivery_date')->get();

        return view('projects/index', [
            'projects' => $projects,
            'title' => 'Projetos',
            'h' => new Helpers()
        ]);
    }

    /**
     * Create project.
     * @param Request $request Request data.
     */
    public function create(Request $request)
    {
        $request->validate([
            'description' => 'max:65535',
            'title' => 'required|max:255',
            'delivery_date' => 'required|date_format:Y-m-d'
        ]);

        Project::create([
            'description' => $request->description,
            'title' => $request->title,
            'delivery_date' => $request->delivery_date
        ]);

        return redirect()
            ->route('projects.index')
            ->with('message', 'Projeto criado com sucesso!');
    }

    /**
     * View project.
     * @param string $id Project id.
     */
    public function view(string $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Projeto não encontrado!');
        }

        $finished_tasks = $project->tasks->filter(function ($i) {
            return $i->task_id === null && $i->status === 'finished';
        });

        $pending_tasks = $project->tasks->filter(function ($i) {
            return $i->task_id === null && $i->status === 'pending';
        });

        return view('projects/view', [
            'title' => $project->title,
            'project' => $project,
            'finished_tasks' => $finished_tasks,
            'pending_tasks' => $pending_tasks,
            'h' => new Helpers()
        ]);
    }

    /**
     * Edit project.
     * @param Request $request Request data.
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|uuid',
            'description' => 'max:65535',
            'title' => 'required|max:255',
            'delivery_date' => 'required|date_format:Y-m-d'
        ]);

        $project = Project::find($request->id);

        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Projeto não encontrado!');
        }

        $project->description = $request->description;
        $project->title = $request->title;
        $project->delivery_date = $request->delivery_date;
        $project->save();

        return redirect()
            ->back()
            ->with('message', 'Projeto editado com sucesso!');
    }

    /**
     * Delete project.
     * @param string $id Project id.
     */
    public function delete(string $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Projeto não encontrado!');
        }

        $project->delete();

        // Delete tasks
        foreach ($project->tasks as $task) {
            $task->delete();
        }

        return redirect()
            ->route('projects.index')
            ->with('message', 'Projeto excluído com sucesso!');
    }
}
