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
        $responsavel = $_POST['name_responsavel'];
        $posto = $_POST['posto'];
        $contato = $_POST['contato'];
        
        
        $sqlupdate = "UPDATE responsavel 
        SET name_responsavel='$responsavel',posto='$posto',contato='$contato' WHERE id = '$id'";
          $result = $conexao->query($sqlupdate);
    }
    header('Location: controleResponsavel.php');

?>