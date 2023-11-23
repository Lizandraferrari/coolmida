<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Pesquisar</title>
    <script src ="../code.js"></script>
    <link rel="stylesheet"  href="../layout.css" >
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand"><img src="../img/coolmida.png" width="90px" ></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav custom-nav">
        <li class="nav-item">
              <a class="nav-link" href="../index.html">INÍCIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../navbar/sobre.html">SOBRE</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Massas</a>
                <a class="dropdown-item" href="#">Japonês</a>
                <a class="dropdown-item" href="#">Doces</a>
                <a class="dropdown-item" href="#">Lanches</a>
                <a class="dropdown-item" href="#">Outros</a>          
              </div>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUTOS</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Hamburgueres</a>
                  <a class="dropdown-item" href="#">Pizzas</a>
                  <a class="dropdown-item" href="#">Marmitas</a>
                  <a class="dropdown-item" href="#">Pokes</a>
                  <a class="dropdown-item" href="#">Outros</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="../navbar/login.html">LOGIN</a>
              </li>
              <li class="nav-item active dropdown">
                <a class="nav-link py-2 px-0 px-lg-2" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi-search"></i>
                    <small class="d-lg-none ms-2">Busca</small>
                </a>
                <div class="dropdown-menu margem" aria-labelledby="navbarDropdownMenuLink">
                  <form>
                    <input type="text" placeholder="Estou com fome de..." id="busquinha">
                    <button type="button" class="btnbusca" onclick="buscar('cadastro')">Procurar</button>
                </form>
                </div>
            </li>
            <a class="nav-link py-2 px-0 px-lg-2" href="../navbar/busca.html" rel="noopener">
              <i class="bi-cart"></i><small class="d-lg-none ms-2">Carrinho</small>
          </a>
        </li>
          </ul>
        </div>
      </nav>
<!--
    Painel loja:
    >lojista cadastra na função lojista
    >crud produto (pag php processar no bd)
-->
<h1>Informações lojistas</h1>

  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="adicionar.html" class="nav-link ">Adicionar produtos</a>
    </li>

  </ul>


<i class="bi-search ">
  <input class="busca" type="text"  id="buscarAlterar" placeholder = "Procure pelo nome, algum produto especifico para alterar"></i><br>
 <button type = "button">Buscar</button>
 <table class='table table-striped'>
  <tr>
  <th >Categoria</th>
   <th>Tipo</th>
    <th>Nome</th>
   <th>Descricao</th>
   <th>Preço</th>
    <th>Estoque</th>
    <th> </th>
    <th> </th>
    </tr>
 <?php
require ('../php/config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $termoBusca = $_POST["buscarAlterar"];

  $sql = "SELECT * FROM produtos WHERE nome LIKE '%$termoBusca%'";
  $result = $con->query($sql);
} else {
  $sql = "SELECT * FROM produtos";
  $result = $con->query($sql);
}

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      echo "<form action='../php/manipulacao.php' method='post' id = ' " . $row["id_produto"] . "'>";
        echo "<tr>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["tipo"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>" . $row["preco"] . "</td>";
        echo "<td>" . $row["estoque"] . "</td>";
        echo "<input type='hidden' name='id_produto' value='" . $row["id_produto"] . "'>";
        echo "<td><button class='botoes' type='submit' id = 'alterar' name = 'alterar'>Alterar</button></td>";
        echo "<td><button class = 'botoes' type = 'submit' id = 'deletar' name = 'deletar'> Apagar </button></td>";
        echo "</tr>";
        echo "</form>";
    }

    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </html>