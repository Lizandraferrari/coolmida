<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Pesquisar</title>
    <script src ="../code.js"></script>
    <link rel="stylesheet"  href="../layout.css" />
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

      <form class="centroForm" method="POST" action="../php/alterar.php">
    <div class="card borda" >

        <h4 style="font-weight: bold;text-align: center;">Altere seu produto:</h4><br>
        <label>Nome:</label>
        <i class="bi bi-cake-fill iconinput">
          <?php
          $nome = $_GET['nome'];
        echo "<input class='inputcard' type='text' value = '$nome' id='nmProd' name='nome' placeholder = 'Insira o nome do produto'></i><br>";
?>
          <div class="row">
    <div class="col-6">
        <label for="categoriaAdd">Categoria:</label>
        <select name="categoria" id="categoriaAdd">
        <?php
        $categoria = $_GET['categoria'];
          echo"<option value='$categoria'>$categoria</option>";
          ?>
          <option value="massas">Massas</option>
          <option value="doces">Doces</option>
          <option value="lanches">Lanches</option>
          <option value="vegano">Vegano</option>
          <option value="padaria">Padaria</option>
          <option value="outros">Outros</option>
        </select>
        <br>
    </div>
    <div class="col-6">
<label for="tipoAdd">Tipo:</label>
<select name="tipoAdd" id="tipoAdd">
  <?php
  $tipo = $_GET['tipo'];
  echo"<option value='$tipo'>$tipo</option>";
  ?>
  <option value="hamburgueres">Hamburgueres</option>
  <option value="pizzas">Pizzas</option>
  <option value="marmitas">Marmitas</option>
  <option value="pokes">Pokes</option>
  <option value="gelados">Açais/sorvetes</option>
  <option value="combos">Combos</option>
  <option value="esfihas">Esfihas</option>
  <option value="guloseimas">Guloseimas</option>
  <option value="porcoes">Porções</option>
  <option value="bolos">Bolos</option>
  <option value="outros">Outros</option>
</select>
</div>
</div>
<br>

        <label>Descrição:</label>
        <i class="bi bi-list-ul iconinput">
          <?php
          $descricao = $_GET['descricao'];
        echo "<input class='inputcard' type='text' id='descricao'value='$descricao' placeholder = 'Descreva brevemente o produto'></i><br>";
        ?>

        <div class="row">
            <div class="col-6">
        <label>Preço:</label>
        <i class = "iconinput">R$
          <?php
          $preco = $_GET['preco'];
        echo "<input style = 'text-align: center;' class = 'inputcard'  id='preco' value='$preco' placeholder = '00,00'></i><br>";
        ?>
        <br>
    </div>
    <label>Quantidade:</label>
    <div class="col-6">
    <?php
$quantidade = $_GET['estoque'];
echo "<input class = 'inputcard'  value = '$quantidade'id='qtd' placeholder='0'><br>";
?>
</div>
</div>

<br><button class = "botoes" type="button"  value="Cadastrar" id="btnadd">Adicionar</button>

    </div>
</form>


      
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </html> 