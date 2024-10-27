<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Nave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylecss/style_cadastro-edit.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Nave 🛸</h1>
        <form action="cadastro_script.php" method="POST">
            <div class="mb-3">
                <label for="tamanho">Tamanho 📏</label>
                <select class="form-control" name="tamanho" required>
                    <option value="">Selecione</option>
                    <option value="pequena">Pequena</option>
                    <option value="média">Média</option>
                    <option value="grande">Grande</option>
                    <option value="colossal">Colossal</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cor">Cor 🎨</label>
                <select class="form-control" name="cor" required>
                    <option value="">Selecione</option>
                    <option value="vermelha">Vermelha</option>
                    <option value="laranja">Laranja</option>
                    <option value="amarela">Amarela</option>
                    <option value="verde">Verde</option>
                    <option value="azul">Azul</option>
                    <option value="anil">Anil</option>
                    <option value="violeta">Violeta</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="local_queda">Local de Queda 🗺️</label>
                <select class="form-control" name="local_queda" required>
                    <option value="">Selecione</option>
                    <option value="continente">Continente</option>
                    <option value="oceano">Oceano</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="armamentos">Armamentos 🔫</label>
                <select class="form-control" name="armamentos">
                    <option value="">Selecione</option>
                    <option value="laser"> Arma a Laser: Dispara feixes de luz concentrada, capazes de cortar ou desintegrar materiais.</option>
                    <option value="míssil">Míssil Quântico de Antimatéria: Um projétil invisível aos radares, impulsionado por antimatéria.</option>
                    <option value="arma de mao Comum">Arma de mão Comum: Disparos de projéteis comum</option>
                    <option value="bomba Comum">Bomba Comum.</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_combustivel">Tipo de Combustível ⛽</label>
                <select class="form-control" name="tipo_combustivel">
                    <option value="">Selecione</option>
                    <option value="antimatéria">Antimatéria: Libera imensa energia quando encontra matéria comum.</option>
                    <option value="hélio-3">Hélio-3: Isótopo raro, promissor para fusão nuclear limpa, porém em abundância na lua já explorada.</option>
                    <option value="materia escura">Matéria Escura: Hipotético, invisível, mas com grande potencial energético.</option>
                    <option value="biocombustivel">Biocombustivel comum: Combustível comum da Terra.</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_tripulantes">Número de Tripulantes 👥</label>
                <input type="number" class="form-control" name="numero_tripulantes" required>
            </div>
            <div class="mb-3">
                <label for="estado_tripulantes">Estado dos Tripulantes 📊</label>
                <select class="form-control" name="estado_tripulantes">
                    <option value="">Selecione</option>
                    <option value="sobrevivente">Sobrevivente</option>
                    <option value="ferido">Ferido</option>
                    <option value="desaparecido">Desaparecido</option>
                    <option value="não identificado">Não Identificado</option>
                    <option value="morto">Morto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="grau_avaria">Grau de Avaria 📉</label>
                <select class="form-control" name="grau_avaria" required>
                    <option value="">Selecione</option>
                    <option value="perda total">Perda Total</option>
                    <option value="muito destruída">Muito Destruída</option>
                    <option value="parcialmente destruída">Parcialmente Destruída</option>
                    <option value="praticamente intacta">Praticamente Intacta</option>
                    <option value="sem avarias">Sem Avarias</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="potencial_prospeccao">Potencial de Prospecção Tecnológica 📈 </label>
                <select class="form-control" name="potencial_prospeccao">
                    <option value="">Selecione</option>
                    <option value="baixo">Baixo</option>
                    <option value="médio">Médio</option>
                    <option value="alto">Alto</option>
                    <option value="muito alto">Muito Alto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="grau_periculosidade">Grau de Periculosidade ⚠️</label>
                <select class="form-control" name="grau_periculosidade">
                    <option value="">Selecione</option>
                    <option value="muito baixo">Muito Baixo</option>
                    <option value="baixo">Baixo</option>
                    <option value="moderado">Moderado</option>
                    <option value="alto">Alto</option>
                    <option value="muito alto">Muito Alto</option>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success" value="Cadastrar Nave">
            </div>

            <!-- Modal de Confirmação de Cadastro -->
<div class="modal fade" id="sucessoModal" tabindex="-1" aria-labelledby="sucessoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sucessoModalLabel">Cadastro Realizado com Sucesso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Nave cadastrada com sucesso! A classificação é: </br> <b id="classificacaoNave"></b>.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="redirectPesquisa()">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Função para exibir o modal em caso de sucesso
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const sucesso = urlParams.get('sucesso');
        const classificacao = urlParams.get('classificacao');
        
        if (sucesso === "1") {
            document.getElementById('classificacaoNave').innerText = classificacao;
            new bootstrap.Modal(document.getElementById('sucessoModal')).show();
        }
    });

    // Função para redirecionar para a página de pesquisa
    function redirectPesquisa() {
        window.location.href = "pesquisa.php";
    }
</script>

        </form>
        <a href="index.php" class="btn btn-info">Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
