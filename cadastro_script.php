<?php
include "conexao.php";

// Captura os dados do formulário
$tamanho = $_POST['tamanho'] ?? '';
$cor = $_POST['cor'] ?? '';
$local_queda = $_POST['local_queda'] ?? '';
$armamentos = $_POST['armamentos'] ?? '';
$tipo_combustivel = $_POST['tipo_combustivel'] ?? '';
$numero_tripulantes = $_POST['numero_tripulantes'] ?? 0;
$estado_tripulantes = $_POST['estado_tripulantes'] ?? '';
$grau_avaria = $_POST['grau_avaria'] ?? '';
$potencial_prospeccao = $_POST['potencial_prospeccao'] ?? '';
$grau_periculosidade = $_POST['grau_periculosidade'] ?? '';

// Verificações
// Verificações
if (empty($tamanho) || empty($cor) || empty($local_queda) || empty($tipo_combustivel) || 
    empty($grau_avaria) || empty($potencial_prospeccao) || empty($grau_periculosidade)) {
    header("Location: cadastro.php?erro=campos_obrigatorios");
    exit();
}

// Prepare a instrução SQL
$sql = "INSERT INTO naves (tamanho, cor, local_queda, armamentos, tipo_combustivel, 
        numero_tripulantes, estado_tripulantes, grau_avaria, potencial_prospeccao, grau_periculosidade)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Corrigir os tipos de parâmetros: 's' para string e 'i' para inteiro
$stmt->bind_param("sssssissss", $tamanho, $cor, $local_queda, $armamentos, $tipo_combustivel, 
                  $numero_tripulantes, $estado_tripulantes, $grau_avaria, 
                  $potencial_prospeccao, $grau_periculosidade);

// Executa a instrução SQL
if ($stmt->execute()) {
    // Captura o ID da nova nave cadastrada
    $nave_id = $stmt->insert_id;

    // Lógica de classificação
    $classificacao = [];

    // Condições para Lixo Oceânico
    if ($local_queda == 'oceano') {
        $classificacao[] = 'Lixo Oceânico';
    } else { // Se caiu em continente
        // Condições para Fonte de Energia Alternativa
        if (($tipo_combustivel == 'antimatéria' || $tipo_combustivel == 'materia escura') && 
            ($grau_avaria == 'parcialmente destruída' || $grau_avaria == 'sem avarias')) {
            $classificacao[] = 'Fonte de Energia Alternativa';
        }

        // Condições para Arsenal Alienígena
        if (($armamentos == 'laser' || $armamentos == 'míssil') && 
            ($grau_avaria == 'parcialmente destruída' || $grau_avaria == 'sem avarias')) {
            $classificacao[] = 'Arsenal Alienígena';
        }

        // Condições para Joia Tecnológica
        if ($potencial_prospeccao == 'muito alto') {
            $classificacao[] = 'Joia Tecnológica';
        }

        // Condições para Ameaça em Potencial
        if ($numero_tripulantes > 5 && $estado_tripulantes == 'sobrevivente' && 
            ($grau_periculosidade == 'alto' || $grau_periculosidade == 'muito alto')) {
            $classificacao[] = 'Ameaça em Potencial';
        }

        // Se não houver nenhuma classificação relevante, define como Sucata Espacial
        if (empty($classificacao)) {
            $classificacao[] = 'Sucata Espacial';
        }
    }

    // Limita a classificação a no máximo 2
    if (count($classificacao) > 2) {
        $classificacao = array_slice($classificacao, 0, 2);
    }

    // Atualiza a classificação na tabela
    $classificacao_string = implode(', ', $classificacao); // Junta as classificações em uma string
    $sql_update = "UPDATE naves SET classificacao = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $classificacao_string, $nave_id);

    if (!$stmt_update->execute()) {
        // Se falhar, mostre um erro
        header("Location: cadastro.php?erro=1&mensagem=" . urlencode($stmt_update->error));
        exit();
    }

    // Redireciona para cadastro.php com a mensagem de sucesso
    header("Location: cadastro.php?sucesso=1&classificacao=" . urlencode($classificacao_string));
    exit();
} else {
    header("Location: cadastro.php?erro=1&mensagem=" . urlencode($stmt->error));
    exit();
}

$stmt->close();
$conn->close();

?>
