<div class="modal fade" id="createProject" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.create') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Criar projeto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="createProjectTitle" class="form-label">Título <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <input type="text" class="form-control" required id="createProjectTitle" placeholder="Digite aqui" name="title">
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="createProjectDescription" class="form-label">Descrição</label>
                        <textarea rows="3" class="form-control" id="createProjectDescription" placeholder="Digite aqui" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="createProjectDate" class="form-label">Data de entrega <span class="text-danger">*</span></label>
                        <div class="has-validation">
                            <input type="date" class="form-control" required id="createProjectDate" name="delivery_date">
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar projeto</button>
                </div>
            </form>
        </div>
    </div>
</div>
