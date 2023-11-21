$(document).ready(function () {

    alert('teste');
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

    $(document).ready(function () {
        $('.edit').on('click', function () {
            var livroId = $(this).data('id');
            var titulo = $(this).data('titulo');
            var ano = $(this).data('ano');
            var categoria = $(this).data('categoria');
            var autor = $(this).data('autor');
            var editora = $(this).data('editora');

            $('#editForm #tituloEdit').val(titulo);
            $('#editForm #anoPublicacaoEdit').val(ano);
            $('#editForm #categoriaEdit').val(categoria);
            $('#editForm #autorEdit').val(autor);
            $('#editForm #editoraEdit').val(editora);
            // Adicione outros campos conforme necessário
        });
    });

