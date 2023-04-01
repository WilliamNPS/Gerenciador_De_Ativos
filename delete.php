<?php
session_start();
include_once('banco/conexao.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}
    if(!empty($_GET['id']))
    {
        include_once('banco/conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM controle WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM controle WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: controle.php');
   
?>