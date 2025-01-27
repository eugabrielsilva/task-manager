<div class="modal fade" id="editProject" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.edit') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" required name="id" id="editProjectId">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Editar projeto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="editProjectTitle" class="form-label">Título <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <input type="text" class="form-control" required id="editProjectTitle" placeholder="Digite aqui" name="title">
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editProjectDescription" class="form-label">Descrição</label>
                        <textarea rows="3" class="form-control" id="editProjectDescription" placeholder="Digite aqui" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editProjectDate" class="form-label">Data de entrega <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <input type="date" class="form-control" required id="editProjectDate" name="delivery_date">
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar projeto</button>
                </div>
            </form>
        </div>
    </div>
</div>
