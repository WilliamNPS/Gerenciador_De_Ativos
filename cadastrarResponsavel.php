<?php

session_start();
include_once('banco/conexao.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    $senha_hash = hash('sha1', $senha);
    header('Location: index.php');
}
?>

<?php

    if(isset($_POST['submit']))
    {

        $name_responsavel = $_POST['name_responsavel'];
        $posto = $_POST['posto'];
        $contato = $_POST['contato'];
        $result = mysqli_query($conexao, "INSERT INTO  responsavel (name_responsavel,posto,contato)  
        VALUES ('$name_responsavel','$posto','$contato')");
       
        header('Location: controleResponsavel.php '); 
        
    }


   //Codigo pra registrar todos os usaurios
   // dando a condição   if$logado == ''
   $sql ="SELECT * FROM responsavel  ORDER BY id DESC  ";
   $result = $conexao -> query ($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
<link rel="stylesheet" href="estilo/controlecadastro.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar CPF</title>
</head>
<body>
<?php include("menu.php"); ?>


    <form action="cadastrarResponsavel.php" method="post">
  <div class="title">
  <h4>Cadastrar Responsavel</h4>
  </div>
  <label for="nome_do_ativo">Nome do Responsavel</label>
  <input type="text" id="name_responsavel" class="form-input" name="name_responsavel" placeholder="Responsavel" >
  <div class="row">
    <div class="col">
    <label for="modelo">Local de Trabalho / Setor </label>
    <input type="text" id="posto" class="form-input" name="posto" placeholder="Local de trabalho" >
    </div>
   
  </div>
  
  <label for="contato">Contato</label>
  <input type="text" id="contato" name="contato" class="form-input"  placeholder="Contato" required></input>

 
  <input type="submit" name="submit" class="form-submit"  id="submit" value="Cadastrar" >

</form>








</body>
</html>


