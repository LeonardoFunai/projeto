<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisar Naves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylecss/style_pesquisa.css">
</head>
<body>
    <?php 
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        $classificacao = $_GET['classificacao'] ?? 'Classificação não definida';
        echo "<script>alert('Nave cadastrada com sucesso! A classificação é: $classificacao');</script>";
    }
        include "conexao.php";

        $pesquisa = $_POST['busca'] ?? '';

        if (isset($_GET['excluir'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Nave excluída com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        
        if (isset($_GET['sucesso'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Cadastro alterado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

        // Atualize a consulta SQL para incluir a coluna 'classificacao'
        if (is_numeric($pesquisa) && !empty($pesquisa)) {
            $sql = "SELECT * FROM naves WHERE id = '$pesquisa'";
        } else {
            $sql = "SELECT * FROM naves"; 
        }
        
        $dados = mysqli_query($conn, $sql);
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar Naves</h1>
                <a class="btn btn-primary btn-lg" href="cadastro.php" role="button">Adicionar Nave</a>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="number" placeholder="Pesquisar por ID" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Local de Queda</th>
                            <th scope="col">Armamentos</th>
                            <th scope="col">Tipo de Combustível</th>
                            <th scope="col">Número de Tripulantes</th>
                            <th scope="col">Estado dos Tripulantes</th>
                            <th scope="col">Grau de Avaria</th>
                            <th scope="col">Potencial de Prospeção</th>
                            <th scope="col">Grau de Periculosidade</th>
                            <th scope="col">Classificação</th> <!-- Nova coluna para Classificação -->
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                echo "<tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['tamanho']}</td>
                                        <td>{$linha['cor']}</td>
                                        <td>{$linha['local_queda']}</td>
                                        <td>{$linha['armamentos']}</td>
                                        <td>{$linha['tipo_combustivel']}</td>
                                        <td>{$linha['numero_tripulantes']}</td>
                                        <td>{$linha['estado_tripulantes']}</td>
                                        <td>{$linha['grau_avaria']}</td>
                                        <td>{$linha['potencial_prospeccao']}</td>
                                        <td>{$linha['grau_periculosidade']}</td>
                                        <td>{$linha['classificacao']}</td> <!-- Exibir Classificação -->
                                        <td>
                                            <a href='edit.php?id={$linha['id']}' class='btn btn-success'>Editar</a>
                                            <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma' onclick=\"pegar_dados({$linha['id']}, '{$linha['cor']}')\">Excluir</a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-info">Voltar para o Início</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="POST">
                        <p>Deseja realmente excluir a nave <b id="nome_pessoa">Nome da nave</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input type="hidden" name="id" id="cod_nave" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa_1').value = nome;
            document.getElementById('cod_nave').value = id;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
