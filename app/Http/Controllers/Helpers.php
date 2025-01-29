<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class Helpers
{

    public function setupCreateSubtask(Task $task)
    {
        return sprintf(
            "setupCreateSubtask('%s')",
            addslashes($task->id)
        );
    }

    public function setupTaskEdit(Task $task)
    {
        return sprintf(
            "setupTaskEdit('%s', '%s', '%s')",
            addslashes($task->id),
            addslashes($task->description),
            addslashes($task->status)
        );
    }

    public function setupTaskDelete(Task $task)
    {
        return sprintf(
            "setupTaskDelete('%s')",
            addslashes(route('tasks.delete', ['id' => $task->id]))
        );
    }

    public function setupProjectDelete(Project $project)
    {
        return sprintf(
            "setupProjectDelete('%s')",
            addslashes(route('projects.delete', ['id' => $project->id]))
        );
    }

    public function setupProjectEdit(Project $project)
    {
        return sprintf(
            "setupProjectEdit('%s', '%s', '%s', '%s')",
            addslashes($project->id),
            addslashes($project->title),
            addslashes($project->description),
            addslashes($project->delivery_date->toDateString()),
        );
    }
}
