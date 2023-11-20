$(document).ready(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formLivro');
    form.addEventListener('input', function() {
        const anoPublicacao = document.getElementById('ano_publicacao');
        const campos = form.querySelectorAll('input');
        let todosPreenchidos = true;
        
        campos.forEach(campo => {
            if (!campo.value.trim() || (campo.name === 'ano_publicacao' && campo.value.toString().length < 4)) {
                todosPreenchidos = false;
            }
        });

        form.querySelector('input[type="submit"]').disabled = !todosPreenchidos;
    });
});