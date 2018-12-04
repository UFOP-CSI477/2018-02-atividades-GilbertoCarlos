<?php 
  include 'CONEXAO_BD.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilo1.css">

    <title>Inclusão de Equipamento</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="offcanvas.css" rel="stylesheet">

</head>

<body class="bg-light">
  <!-- Menu usando nav-->
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="p-inicial.php">Pagina Principal</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Geral</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="p-r-geral.php">Relatório Geral</a>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Administrativa</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="p-inc-equipamento.php">Inclusão de equipamento</a>
              <a class="dropdown-item" href="p-inc-manutencao.php">Inclusão de Manutencão</a>
              <a class="dropdown-item" href="p-equip-cadastrado.php">Equipamentos Cadastrados</a>
              <a class="dropdown-item" href="p-pesq-especifica.php">Pesquisa Para Equipamento Específico</a>
            </div>
          </li>
        </ul>
        
      </div>
    </nav>



  <form class="form-horizontal espaco" action="" method="POST">
    
  <div class="container col-6 ">
    <h4>Incluir Equipamento</h4>
    <label class="control-label col-sm-3 mt-4" for="nome2">Nome do Equipamento</label>
    <div class="col">
      <input type="text" class="form-control" name="equipamento" placeholder="Insira o nome do Equipamento" required>
    </div>
  </div>
  <div class="container col-6"> 
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default mt-4">Registrar</button>
      
    </div>
  </div>
</form>

    <?php
        if (isset($_POST['equipamento'])) {
          $registro = $_POST['equipamento'];

          $gravar = $connection->prepare("INSERT INTO Equipamentos(nome) VALUES (:nome)");
          $gravar->bindValue(":nome", $registro);
          $gravar->execute();

          if ($gravar) {
            //se a inseção ocorrer
            echo "<div class='alert alert-success' role='alert'> Sucesso ao Inclir Equipamento!</div>";
            header("Refresh: 2, url=p-equip-cadastrado.php");
           } else{
             echo "<div class='alert alert-warning' role='alert'> Erro ao Inclir Equipamento!</div>";
           }
        }


    ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>