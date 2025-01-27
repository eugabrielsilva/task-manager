<div class="modal fade" id="deleteTask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" required name="id" id="editTaskId">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Excluir tarefa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Tem certeza que quer excluir a tarefa?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="confirmTaskDelete()" class="btn btn-danger">Excluir tarefa</button>
            </div>
        </div>
    </div>
</div>
