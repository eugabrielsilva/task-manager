<div class="modal fade" id="editTask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tasks.edit') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" required name="id" id="editTaskId">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Editar tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="editTaskDescription" class="form-label">Descrição <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <textarea required rows="3" class="form-control" id="editTaskDescription" placeholder="Digite aqui" name="description"></textarea>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editTaskStatus" class="form-label">Status <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <select name="status" class="form-select" id="editTaskStatus" required>
                                <option value="pending">Pendente</option>
                                <option value="finished">Concluída</option>
                            </select>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar tarefa</button>
                </div>
            </form>
        </div>
    </div>
</div>
