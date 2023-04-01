<?php
session_start();
include_once('banco/conexao.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}
    // isset -> serve para saber se uma variável está definida
    include_once('banco/conexao.php');
    if(isset($_POST['update']))
    {  
        $id = $_POST['id'];
        $nome_do_ativo = $_POST['nome_do_ativo'];
        $descricao = $_POST['descricao'];
        $modelo = $_POST['modelo'];
        $numero_serie = $_POST['numero_serie'];
        $data_aquisicao = $_POST['data_aquisicao'];
        $valor = $_POST['valor'];
        $logado = $_POST['logado'];

        
        
        $sqlupdate = "UPDATE controle
        SET nome_do_ativo='$nome_do_ativo',descricao='$descricao',modelo='$modelo'
        ,numero_serie='$numero_serie',data_aquisicao='$data_aquisicao',valor='$valor',logado='$logado' WHERE id = '$id'";
          $result = $conexao->query($sqlupdate);


        
    }
    header('Location: controle.php');

?>