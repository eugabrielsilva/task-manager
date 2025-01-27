document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-title]');
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', event => {
            if(!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false)
    });
});

function setFormField(field, value) {
    document.querySelector(`#${field}`).value = value;
}

function setupTaskEdit(id, description, status) {
    setFormField('editTaskId', id);
    setFormField('editTaskDescription', description)
    setFormField('editTaskStatus', status)
}

function setupCreateSubtask(id) {
    setFormField('createSubtaskId', id);
    setFormField('createSubtaskDescription', '');
}

function setupProjectEdit(id, title, description, date) {
    setFormField('editProjectId', id);
    setFormField('editProjectTitle', title);
    setFormField('editProjectDescription', description);
    setFormField('editProjectDate', date);
}

let taskDeleteUrl = '';
let projectDeleteUrl = '';

function setupTaskDelete(url) {
    taskDeleteUrl = url;
}

function setupProjectDelete(url) {
    projectDeleteUrl = url;
}

function confirmTaskDelete() {
    window.location = taskDeleteUrl;
}

function confirmProjectDelete() {
    window.location = projectDeleteUrl;
}
