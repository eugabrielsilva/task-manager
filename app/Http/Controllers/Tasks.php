<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class Tasks
{
    /**
     * Finish task.
     * @param int $id
     */
    public function finish($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Tarefa não encontrada!');
        }

        $task->status = 'finished';
        $task->save();

        // Finish subtasks
        foreach ($task->subtasks as $subtask) {
            $subtask->status = 'finished';
            $subtask->save();
        }

        return redirect()
            ->route('projects.view', ['id' => $task->project_id])
            ->with('message', 'Tarefa finalizada com sucesso!');
    }

    /**
     * Create task.
     * @param Request $request
     */
    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required|max:65535',
            'project_id' => 'required'
        ]);

        $project = Project::find($request->project_id);

        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Projeto não encontrado!');
        }

        Task::create([
            'description' => $request->description,
            'project_id' => $project->id,
        ]);

        return redirect()
            ->route('projects.view', ['id' => $project->id])
            ->with('message', 'Tarefa criada com sucesso!');
    }

    /**
     * Edit project.
     * @param Request $request
     */
    public function edit(Request $request)
    {
        $request->validate([
            'description' => 'required|max:65535',
            'status' => 'required|in:pending,finished',
            'id' => 'required'
        ]);

        $task = Task::find($request->id);

        if (!$task) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Tarefa não encontrada!');
        }

        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        // Update parent task
        $parentTask = $task->parentTask;

        if ($parentTask && $task->status === 'pending' && $parentTask->status === 'finished') {
            $parentTask->status = 'pending';
            $parentTask->save();
        }

        return redirect()
            ->route('projects.view', ['id' => $task->project_id])
            ->with('message', 'Tarefa editada com sucesso!');
    }

    /**
     * Delete task.
     * @param int $id
     */
    public function delete($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Tarefa não encontrada!');
        }

        $task->delete();

        // Delete subtasks
        foreach ($task->subtasks as $subtask) {
            $subtask->delete();
        }

        return redirect()
            ->route('projects.view', ['id' => $task->project_id])
            ->with('message', 'Tarefa excluída com sucesso!');
    }

    /**
     * Create subtask.
     * @param Request $request
     */
    public function createSubtask(Request $request)
    {
        $request->validate([
            'description' => 'required|max:65535',
            'task_id' => 'required'
        ]);

        $task = Task::find($request->task_id);

        if (!$task) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Tarefa não encontrada!');
        }

        Task::create([
            'description' => $request->description,
            'task_id' => $task->id,
            'project_id' => $task->project_id,
        ]);

        return redirect()
            ->route('projects.view', ['id' => $task->project_id])
            ->with('message', 'Subtarefa criada com sucesso!');
    }
}
