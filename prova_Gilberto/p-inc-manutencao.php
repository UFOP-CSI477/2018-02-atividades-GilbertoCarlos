<?php 
  include 'CONEXAO_BD.php';
  $equipamentos = $connection->query("SELECT id,nome FROM equipamentos");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilo1.css">

    <title>Inclusão de Manuteção</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
      <h4>Incluir Manuteção</h4>
    <label for="sel1" class=" mt-4">Equipamento: </label>
    <select class="form-control " name="n_equip" required>
      
    <!-- Aqui fica a consulta dos equipamentos no banco de dados -->
          <?php
            echo "<option> </option>";
            while ($n_equipamento = $equipamentos->fetch()) {
              echo "<option>".$n_equipamento['nome']."</option>";
            }

          ?>

      

      

          </select>
            <label for="sel2 " class=" mt-4" >Tipo de Manutençao: [1-Preventiva/2-Corretiva/3-Urgente]</label>
            <select class="form-control" name="t_prev" required>
              <option>Selecione o tipo</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
          </select>
      <div class="mt-4">
        <label for="sel3" >Descrição: </label>
        <input type="text" name="descricao" required placeholder="Insira a Descrição da Manutencão" class="form-control" >

      </div>
      <div class="mt-4">
        <label for="sel4 " >Data Limite: </label>
        <input type="date" name="data" required placeholder="dd/mm/aaaa " class="form-control" >

      </div>
      <div class="mt-4">
          <button type="submit" class="btn btn-default">Registrar</button>
        </div>
      </div>

  </form>

          <?php
            if (isset($_POST['n_equip'])) {
              //atribuindo os campos do formulario a variáveis
              $nome_e = $_POST['n_equip'];
              $tipo = $_POST['t_prev'];
              $data_l = $_POST['data'];
              $desc = $_POST['descricao'];

              //recupera a id do equipamento selecionado comapo de equipamento
              $id_E = $connection->query("SELECT id FROM equipamentos WHERE nome = '".$nome_e."'")->fetch();

              $gravar = $connection->prepare("INSERT INTO registros (equipamento_id, descricao, datalimite, tipo) VALUES (:id_equip,:descr,:data_li,:tipo)");  

              $gravar->bindValue(":id_equip",$id_E['id']);
              $gravar->bindValue(":descr",$desc);
              $gravar->bindValue(":data_li",$data_l);
              $gravar->bindValue(":tipo",$tipo);
              $gravar->execute();


              header("Refresh: 2, url=p-r-geral.php");
            
             }

          ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>