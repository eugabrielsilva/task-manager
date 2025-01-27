@extends('template')

@section('content')
<section class="projects">
    {{-- Header --}}
    <div class="menu-flex">
        <h1>Projetos</h1>
        <button data-bs-toggle="modal" data-bs-target="#createProject" class="btn btn-sm btn-primary">Criar projeto</button>
    </div>

    {{-- Alert --}}
    <x-alert />

    {{-- Projects listing --}}
    <table class="table mt-4 table-dark table-hover table-striped">
        <thead>
            <th>Título</th>
            <th>Descrição</th>
            <th>
                <i class="far fa-calendar me-1"></i>
                Data de entrega
            </th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($projects as $item)
            <tr>
                {{-- Project title --}}
                <td>
                    <a href="{{ route('projects.view', ['id' => $item->id]) }}">
                        {{ $item->title }}
                    </a>
                </td>

                {{-- Project description --}}
                <td>
                    <a href="{{ route('projects.view', ['id' => $item->id]) }}">
                        {{ $item->description }}
                    </a>
                </td>

                {{-- Project delivery date --}}
                <td>
                    <a href="{{ route('projects.view', ['id' => $item->id]) }}">
                        {{ $item->delivery_date->format('d/m/Y') }}
                    </a>
                </td>
                <td class="dropdown">
                    {{-- Actions dropdown --}}
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu">
                        {{-- Edit project --}}
                        <li>
                            <button data-bs-toggle="modal" data-bs-target="#editProject" onclick="setupProjectEdit({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->description) }}', '{{ $item->delivery_date->toDateString() }}')" class="dropdown-item">
                                Editar
                            </button>
                        </li>

                        {{-- Delete project --}}
                        <li>
                            <button data-bs-toggle="modal" data-bs-target="#deleteProject" onclick="setupProjectDelete('{{ route('projects.delete', ['id' => $item->id]) }}')" class="dropdown-item text-danger">
                                Excluir
                            </button>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

{{-- Modals --}}
@include('projects.edit')
@include('projects.create')
@include('projects.delete')
@endsection
