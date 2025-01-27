<div class="modal fade" id="createSubtask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tasks.create-subtask') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" required name="task_id" id="createSubtaskId">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Criar subtarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createSubtaskDescription" class="form-label">Descrição <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <textarea required rows="3" class="form-control" id="createSubtaskDescription" placeholder="Digite aqui" name="description"></textarea>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar subtarefa</button>
                </div>
            </form>
        </div>
    </div>
</div>
