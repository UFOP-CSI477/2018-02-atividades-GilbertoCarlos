<?php 
  include 'CONEXAO_BD.php';
  $dados=$connection->query("SELECT * FROM equipamentos");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilo1.css">

    <title>Equipamentos Cadastrados</title>

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
<!--Formulario de apresentação de dados-->
<form class="form-horizontal espaco" action="#">
  
<div class="container col-6">
  <h4>Equipamentos Cadastrados</h4>
    <table class="table table-striped ml-4"">
    <thead>
      <tr>
        <th scope="col">ID do Equipamento</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php
        

        while ($linha=$dados->fetch()) {
          echo "<tr>
              <td>".$linha['id']."</td>
             <td>".$linha['nome']."</td>
            </tr>";

        }

      ?>
    </tbody>
  </table>
</div>

</form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>