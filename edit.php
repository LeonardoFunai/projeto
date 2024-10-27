<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Nave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylecss/style_cadastro-edit.css">
</head>
<body>
    <?php 
    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM naves WHERE id = $id"; 
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Editar Nave</h1>
                <form action="edit_script.php" method="POST">
                    <div class="mb-3">
                        <label for="tamanho">Tamanho 📏</label>
                        <select class="form-control" name="tamanho" required>
                            <option value="pequena" <?php if($linha['tamanho'] == 'pequena') echo 'selected'; ?>>Pequena</option>
                            <option value="média" <?php if($linha['tamanho'] == 'média') echo 'selected'; ?>>Média</option>
                            <option value="grande" <?php if($linha['tamanho'] == 'grande') echo 'selected'; ?>>Grande</option>
                            <option value="colossal" <?php if($linha['tamanho'] == 'colossal') echo 'selected'; ?>>Colossal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cor">Cor 🎨</label>
                        <select class="form-control" name="cor" required>
                            <option value="vermelha" <?php if($linha['cor'] == 'vermelha') echo 'selected'; ?>>Vermelha</option>
                            <option value="laranja" <?php if($linha['cor'] == 'laranja') echo 'selected'; ?>>Laranja</option>
                            <option value="amarela" <?php if($linha['cor'] == 'amarela') echo 'selected'; ?>>Amarela</option>
                            <option value="verde" <?php if($linha['cor'] == 'verde') echo 'selected'; ?>>Verde</option>
                            <option value="azul" <?php if($linha['cor'] == 'azul') echo 'selected'; ?>>Azul</option>
                            <option value="anil" <?php if($linha['cor'] == 'anil') echo 'selected'; ?>>Anil</option>
                            <option value="violeta" <?php if($linha['cor'] == 'violeta') echo 'selected'; ?>>Violeta</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="local_queda">Local de Queda 🗺️</label>
                        <select class="form-control" name="local_queda" required>
                            <option value="continente" <?php if($linha['local_queda'] == 'continente') echo 'selected'; ?>>Continente</option>
                            <option value="oceano" <?php if($linha['local_queda'] == 'oceano') echo 'selected'; ?>>Oceano</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="armamentos">Armamentos 🔫</label>
                        <select class="form-control" name="armamentos">
                            <option value="laser" <?php if($linha['armamentos'] == 'laser') echo 'selected'; ?>>Arma a Laser: Dispara feixes de luz concentrada, capazes de cortar ou desintegrar materiais.</option>
                            <option value="míssil" <?php if($linha['armamentos'] == 'míssil') echo 'selected'; ?>>Míssil Quântico de Antimatéria: Um projétil invisível aos radares, impulsionado por antimatéria.</option>
                            <option value="plasma" <?php if($linha['armamentos'] == 'plasma') echo 'selected'; ?>>Arma de Plasma: Usa gás ionizado super aquecido para criar feixes de energia devastadores.</option>
                            <option value="bombas de singularidade" <?php if($linha['armamentos'] == 'bombas de singularidade') echo 'selected'; ?>>Bombas de Singularidade: Criam pequenos buracos negros temporários que sugam tudo ao redor.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_combustivel">Tipo de Combustível ⛽</label>
                        <select class="form-control" name="tipo_combustivel">
                            <option value="antimatéria" <?php if($linha['tipo_combustivel'] == 'antimatéria') echo 'selected'; ?>>Antimatéria: Libera imensa energia quando encontra matéria comum.</option>
                            <option value="hélio-3" <?php if($linha['tipo_combustivel'] == 'hélio-3') echo 'selected'; ?>>Hélio-3: Isótopo raro, promissor para fusão nuclear limpa.</option>
                            <option value="materia escura" <?php if($linha['tipo_combustivel'] == 'mateira escura') echo 'selected'; ?>>Matéria Escura: Hipotético, invisível, mas com grande potencial energético.</option>
                            <option value="desconhecido" <?php if($linha['tipo_combustivel'] == 'desconhecido') echo 'selected'; ?>>Desconhecido: Misterioso e inexplorado, com possibilidades infinitas.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numero_tripulantes">Número de Tripulantes 👥</label>
                        <input type="number" class="form-control" name="numero_tripulantes" required value="<?php echo $linha['numero_tripulantes']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="estado_tripulantes">Estado dos Tripulantes 📊 </label>
                        <select class="form-control" name="estado_tripulantes">
                            <option value="sobrevivente" <?php if($linha['estado_tripulantes'] == 'sobrevivente') echo 'selected'; ?>>Sobrevivente</option>
                            <option value="ferido" <?php if($linha['estado_tripulantes'] == 'ferido') echo 'selected'; ?>>Ferido</option>
                            <option value="desaparecido" <?php if($linha['estado_tripulantes'] == 'desaparecido') echo 'selected'; ?>>Desaparecido</option>
                            <option value="não identificado" <?php if($linha['estado_tripulantes'] == 'não identificado') echo 'selected'; ?>>Não Identificado</option>
                            <option value="morto" <?php if($linha['estado_tripulantes'] == 'morto') echo 'selected'; ?>>Morto</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grau_avaria">Grau de Avaria 📉</label>
                        <select class="form-control" name="grau_avaria" required>
                            <option value="perda total" <?php if($linha['grau_avaria'] == 'perda total') echo 'selected'; ?>>Perda Total</option>
                            <option value="muito destruída" <?php if($linha['grau_avaria'] == 'muito destruída') echo 'selected'; ?>>Muito Destruída</option>
                            <option value="parcialmente destruída" <?php if($linha['grau_avaria'] == 'parcialmente destruída') echo 'selected'; ?>>Parcialmente Destruída</option>
                            <option value="praticamente intacta" <?php if($linha['grau_avaria'] == 'praticamente intacta') echo 'selected'; ?>>Praticamente Intacta</option>
                            <option value="sem avarias" <?php if($linha['grau_avaria'] == 'sem avarias') echo 'selected'; ?>>Sem Avarias</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="potencial_prospeccao">Potencial de Prospecção Tecnológica 📈</label>
                        <select class="form-control" name="potencial_prospeccao">
                            <option value="baixo" <?php if($linha['potencial_prospeccao'] == 'baixo') echo 'selected'; ?>>Baixo</option>
                            <option value="médio" <?php if($linha['potencial_prospeccao'] == 'médio') echo 'selected'; ?>>Médio</option>
                            <option value="alto" <?php if($linha['potencial_prospeccao'] == 'alto') echo 'selected'; ?>>Alto</option>
                            <option value="muito alto" <?php if($linha['potencial_prospeccao'] == 'muito alto') echo 'selected'; ?>>Muito Alto</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grau_periculosidade">Grau de Periculosidade ⚠️</label>
                        <select class="form-control" name="grau_periculosidade">
                            <option value="nenhum" <?php if($linha['grau_periculosidade'] == 'nenhum') echo 'selected'; ?>>Nenhum</option>
                            <option value="baixo" <?php if($linha['grau_periculosidade'] == 'baixo') echo 'selected'; ?>>Baixo</option>
                            <option value="médio" <?php if($linha['grau_periculosidade'] == 'médio') echo 'selected'; ?>>Médio</option>
                            <option value="alto" <?php if($linha['grau_periculosidade'] == 'alto') echo 'selected'; ?>>Alto</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sucesso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Registro atualizado com sucesso!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="redirectButton">Ok</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Verifica se o parâmetro de sucesso está presente na URL
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status') && urlParams.get('status') === 'success') {
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                document.getElementById('redirectButton').addEventListener('click', function() {
                    window.location.href = 'pesquisa.php';
                });
            }
        });
    </script>
</body>
</html>
