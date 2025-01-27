<div class="modal fade" id="createTask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tasks.create') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" required name="project_id" value="{{ $project->id }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Criar tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createTaskDescription" class="form-label">Descrição <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <textarea required rows="3" class="form-control" id="createTaskDescription" placeholder="Digite aqui" name="description"></textarea>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar tarefa</button>
                </div>
            </form>
        </div>
    </div>
</div>
