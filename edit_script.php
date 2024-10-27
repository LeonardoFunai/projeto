<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $local_queda = $_POST['local_queda'];
    $armamentos = $_POST['armamentos'];
    $tipo_combustivel = $_POST['tipo_combustivel'];
    $numero_tripulantes = $_POST['numero_tripulantes'];
    $estado_tripulantes = $_POST['estado_tripulantes'];
    $grau_avaria = $_POST['grau_avaria'];
    $potencial_prospeccao = $_POST['potencial_prospeccao'];
    $grau_periculosidade = $_POST['grau_periculosidade'];

    // Verificação dos campos obrigatórios
    if (empty($tamanho) || empty($cor) || empty($local_queda) || empty($tipo_combustivel) || 
        empty($grau_avaria) || empty($potencial_prospeccao) || empty($grau_periculosidade)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.'); window.history.back();</script>";
        exit();
    }

    // Atualizar os dados da nave
    $sql = "UPDATE naves SET 
                tamanho='$tamanho', 
                cor='$cor', 
                local_queda='$local_queda', 
                armamentos='$armamentos', 
                tipo_combustivel='$tipo_combustivel', 
                numero_tripulantes='$numero_tripulantes', 
                estado_tripulantes='$estado_tripulantes', 
                grau_avaria='$grau_avaria', 
                potencial_prospeccao='$potencial_prospeccao', 
                grau_periculosidade='$grau_periculosidade' 
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        // Lógica de classificação automática
        $classificacao = [];

        if ($local_queda == 'oceano') {
            $classificacao[] = 'Lixo Oceânico';
        } else {
            if (($tipo_combustivel == 'antimatéria' || $tipo_combustivel == 'materia escura') &&
                ($grau_avaria == 'parcialmente destruída' || $grau_avaria == 'sem avarias')) {
                $classificacao[] = 'Fonte de Energia Alternativa';
            }
            if (($armamentos == 'laser' || $armamentos == 'míssil') &&
                ($grau_avaria == 'parcialmente destruída' || $grau_avaria == 'sem avarias')) {
                $classificacao[] = 'Arsenal Alienígena';
            }
            if ($potencial_prospeccao == 'muito alto') {
                $classificacao[] = 'Joia Tecnológica';
            }
            if ($numero_tripulantes > 5 && $estado_tripulantes == 'sobrevivente' &&
                ($grau_periculosidade == 'alto' || $grau_periculosidade == 'muito alto')) {
                $classificacao[] = 'Ameaça em Potencial';
            }
            if (empty($classificacao)) {
                $classificacao[] = 'Sucata Espacial';
            }
        }

        if (count($classificacao) > 2) {
            $classificacao = array_slice($classificacao, 0, 2);
        }

        $classificacao_string = implode(', ', $classificacao);

        // Atualizar a classificação da nave
        $sql_update = "UPDATE naves SET classificacao = '$classificacao_string' WHERE id = '$id'";
        mysqli_query($conn, $sql_update);

        // Redireciona para edit.php e inclui a nova classificação na URL para exibir no modal
        header("Location: edit.php?id=$id&status=success&classificacao=" . urlencode($classificacao_string));
        exit();
    } else {
        echo "<script>alert('Erro ao atualizar registro: " . mysqli_error($conn) . "'); window.location.href='pesquisa.php';</script>";
    }
} else {
    header("Location: pesquisa.php");
    exit();
}

mysqli_close($conn);
?>
