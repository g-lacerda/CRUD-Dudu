<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Livraria do Dudu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>


</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Livraria do Dudu</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add novo livro</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Titulo</th>
                            <th>Ano Publicação</th>
                            <th>Categoria</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($livros))
                        @foreach ($livros as $livro)
                            <tr>
                            <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox{{ $livro->id_livro }}" name="options[]" value="{{ $livro->id_livro }}">
                                        <label for="checkbox{{ $livro->id_livro }}"></label>
                                    </span>
                                </td>
                                <td>{{ $livro->titulo }}</td>
                                <td>{{ $livro->ano_publicacao }}</td>
                                <td>{{ $livro->categoria->nome ?? 'N/A' }}</td>
                                <td>{{ $livro->autor->nome ?? 'N/A' }}</td>
                                <td>{{ $livro->editora->nome ?? 'N/A' }}</td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('livros.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Livro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label>Ano Publicação</label>
                            <input type="number" class="form-control" name="ano_publicacao" minlength="4" required>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" class="form-control" name="categoria" required>
                        </div>
                        <div class="form-group">
                            <label>Autor</label>
                            <input type="text" class="form-control" name="autor" required>
                        </div>
                        <div class="form-group">
                            <label>Editora</label>
                            <input type="text" class="form-control" name="editora" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action="{{ route('livros.update') }}" method="POST">
                @csrf
                <!-- ... Outras partes do formulário ... -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tituloEdit">Titulo</label>
                        <input type="text" class="form-control" id="tituloEdit" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="anoPublicacaoEdit">Ano Publicação</label>
                        <input type="number" class="form-control" name="ano_publicacao" id="anoPublicacaoEdit" minlength="4" required>
                    </div>
                    <div class="form-group">
                        <label for="categoriaEdit">Categoria</label>
                        <input type="text" class="form-control" name="categoria" id="categoriaEdit" required>
                    </div>
                    <div class="form-group">
                        <label for="autorEdit">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autorEdit" required>
                    </div>
                    <div class="form-group">
                        <label for="editoraEdit">Editora</label>
                        <input type="text" class="form-control" name="editora" id="editoraEdit" required>
                    </div>
                    <input type="text" class="form-control" id="idLivroEdit" name="id_livro" value="" style="display: none;" required>
                </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete um livro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Você tem certeza que quer deletar os livros selecionados?</p>
                        <p class="text-warning"><small>Está ação não pode ser desfeita.</small></p>
                    </div>
                    <input type="text" class="form-control" id="idLivroDelete" name="id_livro" value="" style="display: none;">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>

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

    $(document).ready(function () {
    $('.edit').on('click', function () {
        var livroId = $(this).closest('tr').find('input[type="checkbox"]').val();

        // Use AJAX para buscar os dados do livro no backend
        $.ajax({
            url: '/api/buscar-livro',
            method: 'GET',
            dataType: 'json',
            data: { id_livro: livroId },  // Ajuste para id_livro
            success: function (data) {
                $('#editForm #idLivroEdit').val(data.id_livro);
                $('#editForm #tituloEdit').val(data.titulo);
                $('#editForm #anoPublicacaoEdit').val(data.ano_publicacao);
                $('#editForm #categoriaEdit').val(data.categoria.nome);
                $('#editForm #autorEdit').val(data.autor.nome);
                $('#editForm #editoraEdit').val(data.editora.nome);
                // Adicione outros campos conforme necessário
            },
            error: function () {
                alert('Erro');
                // Trate erros, se necessário
            }
        });
    });
});

$(document).ready(function () {
    $('.delete').on('click', function () {
        // Encontre a checkbox correspondente com base no ícone de exclusão clicado
        var checkbox = $(this).closest('tr').find('input[type="checkbox"]');

        // Marque a checkbox apenas se ainda não estiver marcado
        if (!checkbox.prop('checked')) {
            checkbox.prop('checked', true);
        }
    });
});



$(document).ready(function () {
    $('#deleteEmployeeModal form').submit(function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        var livroIds = [];  // Inicializa um array para armazenar os id_livro selecionados

        // Encontra todas as checkboxes marcadas e obtém seus valores (id_livro)
        $('input[type="checkbox"]:checked').each(function() {
            livroIds.push($(this).val());
        });

        // Use AJAX para enviar os dados para o backend
        $.ajax({
            url: '/api/apaga-livro',
            method: 'POST',
            dataType: 'json',
            data: { livros: livroIds },
            success: function (data) {
                // Aqui você pode manipular a resposta do backend, se necessário
            },
            error: function () {
            }
        });

        // Feche o modal após o envio dos dados
        $('#deleteEmployeeModal').modal('hide');
        location.reload();
    });
});




</script>