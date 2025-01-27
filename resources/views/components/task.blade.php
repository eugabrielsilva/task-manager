<div class="task">
    {{-- Finished icon --}}
    @if($item->status === 'finished')
    <i class="fas fa-check text-success"></i>
    @endif

    {{-- Title --}}
    <span>{{ $item->description }}</span>

    {{-- Finish button --}}
    @if($item->status === 'pending')
    <a href="{{ route('tasks.finish', ['id' => $item->id]) }}" data-bs-title="Concluir tarefa" class="btn btn-sm btn-success">
        <i class="fas fa-check"></i>
    </a>

    {{-- Create subtask button --}}
    <button data-bs-toggle="modal" data-bs-title="Criar subtarefa" data-bs-target="#createSubtask" onclick="setupCreateSubtask({{ $item->id }})" class="btn btn-sm btn-outline-primary">
        <i class="fas fa-network-wired"></i>
    </button>
    @endif

    {{-- Actions dropdown --}}
    <div class="dropdown">
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
            <i class="fas fa-ellipsis-h"></i>
        </button>
        <ul class="dropdown-menu">
            {{-- Edit task --}}
            <li>
                <button data-bs-toggle="modal" data-bs-target="#editTask" onclick="setupTaskEdit({{ $item->id }}, '{{ addslashes($item->description) }}', '{{ addslashes($item->status) }}')" class="dropdown-item">
                    Editar
                </button>
            </li>

            {{-- Delete task --}}
            <li>
                <button data-bs-toggle="modal" data-bs-target="#deleteTask" onclick="setupTaskDelete('{{ route('tasks.delete', ['id' => $item->id]) }}')" class="dropdown-item text-danger">
                    Excluir
                </button>
            </li>
        </ul>
    </div>
</div>

{{-- Subtasks --}}
@if($item->subtasks->isNotEmpty())
<div class="subtasks">
    @foreach ($item->subtasks as $sub)
    <div class="subtask">
        {{-- Finished icon --}}
        @if($sub->status === 'finished')
        <i class="fas fa-check text-success"></i>
        @endif

        {{-- Title --}}
        <span>{{ $sub->description }}</span>

        {{-- Finish button --}}
        @if($sub->status === 'pending')
        <a href="{{ route('tasks.finish', ['id' => $sub->id]) }}" class="btn btn-sm btn-success">
            <i class="fas fa-check"></i>
        </a>
        @endif

        {{-- Actions dropdown --}}
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                <i class="fas fa-ellipsis-h"></i>
            </button>
            <ul class="dropdown-menu">
                {{-- Edit subtask --}}
                <li>
                    <button data-bs-toggle="modal" data-bs-target="#editTask" onclick="setupTaskEdit({{ $sub->id }}, '{{ addslashes($sub->description) }}', '{{ addslashes($sub->status) }}')" class="dropdown-item">
                        Editar
                    </button>
                </li>

                {{-- Delete subtask --}}
                <li>
                    <button data-bs-toggle="modal" data-bs-target="#deleteTask" onclick="setupTaskDelete('{{ route('tasks.delete', ['id' => $sub->id]) }}')" class="dropdown-item text-danger">
                        Excluir
                    </button>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endif
