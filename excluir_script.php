<?php 
include "conexao.php";

$id = $_POST['id'];

$sql = "DELETE FROM `naves` WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: pesquisa.php?excluir=1");
} else {
    header("Location: pesquisa.php?excluir=0");
}
exit();
?>
