<?php
//a session serve para persiste os dados dos usuarios 
session_start();
//Antes de acessa a página do diario.php passa pro está página para sua validação
//VALIDAR O ACESSO A ESTA PÁGINA
if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['senha'])){
    //caso existe a variavel submit para acessar o sistema
    //pega os dados dessa banco
    include_once('banco/conexao.php');
    // cria variaveis na qual vão puxa do banco de dados
    $user = $_POST['user'];
    $senha = hash('sha1', $_POST['senha']);
   //////////////////////////////
  //conecta as variaveis as suas respectivas linhas da tabela 
  $sql = "SELECT * FROM supevisor WHERE user = '$user' and senha = '$senha' ";
  $result = $conexao->query($sql);

  //verificar se esse usuario está cadastrado no sistema 
  if (mysqli_num_rows($result) < 1){
   // echo "Não existe esses dados no sistema então vai para a página de cadastro";
   unset($_SESSION['user']);
   unset($_SESSION['user']);
   header('Location:index.php');
  }else{
   // echo "caso os dados sejam cadastrado no sistema ele ira para a página com a verificação ";
   $_SESSION['user'] = $user;
   $_SESSION['senha'] = $senha;
   header('Location:controle.php');
   
  }



 
}else {
    //se não tiver a variavel submit para acessa a página sera redirecionada para a página user.php
    header('location:index.php');
}

?>