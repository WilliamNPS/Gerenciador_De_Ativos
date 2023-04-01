<?php

session_start();
include_once('banco/conexao.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}

?>

<?php


if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM responsavel WHERE id=$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
           
         $responsavel = $user_data['name_responsavel'];
        $posto = $user_data['posto'];
        $contato = $user_data['contato'];
   
        }
    }
    else
    {
        header('Location: controleResponsavel.php');
    }
}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="estilo/controlecadastro.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="estilo/cadastrar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar </title>
</head>
<body>
 
<?php include("menu.php"); ?>


    <form action="salvaredit2.php" method="post">
    <div class="title">
  <h4>Editar Responsavel</h4>
  </div>
  <label for="responsavel">Nome do Responsavel</label>
  <input type="text" id="name_responsavel" class="form-input" value="<?php  echo $responsavel?>" name="name_responsavel" placeholder="Responsavel" >
  <div class="row">
    <div class="col">
    <label for="modelo">Local de Trabalho / Setor </label>
    <input type="text" id="posto" class="form-input" name="posto"value="<?php  echo $posto?>"  placeholder="Local de trabalho" >
    </div>
   
  </div>
  
  <label for="contato">Contato</label>
  <input type="text" id="contato" name="contato" class="form-input" value="<?php  echo $contato?>"  placeholder="Contato" required></input>



<input type="hidden" name="id" value= "<?php echo $id ?>">
<input type="submit" name="update" class="fadeIn third"  id="update" >
</form>



</body>
</html>