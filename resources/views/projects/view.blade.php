@extends('template')

@section('content')
<section class="projects">
    {{-- Header --}}
    <div class="menu-flex">
        <h1>{{ $project->title }}</h1>

        {{-- Project actions --}}
        <div class="actions-flex">
            <button data-bs-toggle="modal" data-bs-target="#editProject" class="btn btn-sm btn-secondary" onclick="{!! $h->setupProjectEdit($project) !!}">Editar projeto</button>
            <button data-bs-toggle="modal" data-bs-target="#deleteProject" onclick="{!! $h->setupProjectDelete($project) !!}" class="btn btn-sm btn-outline-danger">
                Excluir projeto
            </button>
        </div>
    </div>

    <h3 class="mt-3">
        <i class="far fa-calendar me-1"></i>
        Data de entrega: {{ $project->delivery_date->format('d/m/Y') }}
    </h3>

    @if($project->description)
    <h4><strong>Descrição:</strong> {{ $project->description }}</h4>
    @endif

    {{-- Alert --}}
    <x-alert />

    <div class="tasks-kanban">
        {{-- Pending tasks --}}
        <div class="tasks-board">
            <div class="board-title">
                PENDENTES
                <span class="badge ms-1 rounded-pill text-bg-light">{{ $pending_tasks->count() }}</span>
            </div>
            @foreach($pending_tasks as $item)
            <x-task :item="$item" />
            @endforeach

            {{-- Create button --}}
            <button data-bs-toggle="modal" data-bs-target="#createTask" class="btn btn-sm btn-primary">Criar tarefa</button>
        </div>

        {{-- Finished tasks --}}
        <div class="tasks-board">
            <div class="board-title">
                CONCLUÍDAS
                <span class="badge ms-1 rounded-pill text-bg-light">{{ $finished_tasks->count() }}</span>
            </div>
            @foreach($finished_tasks as $item)
            <x-task :item="$item" />
            @endforeach
        </div>
    </div>
</section>

{{-- Modals --}}
@include('tasks.create')
@include('tasks.create-subtask')
@include('tasks.edit')
@include('tasks.delete')
@include('projects.edit')
@include('projects.delete')
@endsection
