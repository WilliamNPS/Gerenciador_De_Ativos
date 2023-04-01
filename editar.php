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
    $sqlSelect = "SELECT * FROM controle WHERE id=$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
           
         $nome_do_ativo = $user_data['nome_do_ativo'];
        $descricao = $user_data['descricao'];
        $modelo = $user_data['modelo'];
        $numero_serie = $user_data['numero_serie'];
        $data_aquisicao = $user_data['data_aquisicao'];
        $valor = $user_data['valor'];
        $logado = $user_data['logado'];
        }
    }
    else
    {
        header('Location: controle.php');
    }
}
else
{
    header('Location: controle.php');
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="estilo/controlecadastro.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="estilo/cadastrar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar CAM</title>
</head>
<body>
 
<?php include("menu.php"); ?>




    <form action="salvaredit.php" method="post">
    <div class="title">
  <h4>Editar Ativo</h4>
  </div>


<?php
    // Selecione todos os responsaveis da tabela responsavel
    $sql = "SELECT name_responsavel, posto FROM responsavel ORDER BY id DESC";
    $result = $conexao->query($sql);
?>
<select name="logado" id="nome_do_ativo" placeholder="Responsável Pelo Ativo">
    <?php while ($row = $result->fetch_assoc()): ?>
        <option value="<?= $row['name_responsavel'] . ' ' . $row['posto'] ?>" value="<?php  echo $logado?>">
            <?= $row['name_responsavel'] . ' / ' . $row['posto'] ?>
        </option>
    <?php endwhile; ?>
</select>
<label for="nome_do_ativo">Nome do Ativo:</label>
  <input type="text" id="nome_do_ativo" class="form-input"value="<?php  echo $nome_do_ativo?>" name="nome_do_ativo" placeholder="Nome do Ativo">

  <div class="row">
    <div class="col">
    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo" value="<?php  echo $modelo?>"class="form-input" required>
    </div>
    <div class="col">
    <label for="numero_serie">Número de Série:</label>
  <input type="text" id="numero_serie" name="numero_serie"value="<?php  echo $numero_serie?>" class="form-input" required>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
    <label for="data_aquisicao">Aquisição:</label>
  <input type="date" id="data_aquisicao" name="data_aquisicao" value="<?php  echo $data_aquisicao?>"class="form-input" required>
    </div>
    <div class="col">
    <label for="valor">Valor:</label>
  <input type="number" id="valor" name="valor" class="form-input" value="<?php  echo $valor?>" required>
    </div>
  </div>

  <label for="descricao">Descrição:</label>
  <input type="text" id="descricao" name="descricao" class="form-input"value="<?php  echo $descricao?>"  required></input>


<input type="hidden" name="id" value= "<?php echo $id ?>">
<input type="submit" name="update" class="fadeIn third"  id="update" >
</form>



</body>
</html>