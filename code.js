function buscar(origem){
    let busquinha = document.getElementById("busquinha").value;
    if(busquinha == ""){
      alert("Preencha o campo!");
    }else{
      localStorage.setItem("pesquisa" , busquinha) ;

      if (origem == 'inicio'){
        window.location.href = "navbar/busca.html"; 
      
      }else if(origem == 'navbar'){
        window.location.href = "busca.html";
      }
      else if(origem == 'cadastro'){
        window.location.href = "../navbar/busca.html";
      }
      }
    }
//    let buscou = JSON.stringify(busquinha)

function devolver(){
    let obj = localStorage.getItem("pesquisa")
    
    alert(obj)
    console.log(obj)

}

function validarEmail() {
    var email = document.getElementById("login").value;
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    
    if (!regex.test(email)) {
        alert("E-mail inválido. Por favor, insira um e-mail válido.");
        return false;
    }
    
    return true;
}

function validarFormulario() {
    if (!validarEmail()) {
        return false;
    }
    
    // Outras validações podem ser adicionadas aqui
    
    return true;
}

function conteudoSobre(identifica){

    if(identifica == 'valores'){
        document.getElementById("satisfacao").style.border = "none";
        document.getElementById("valores").style.border = "none";

        document.getElementById("valores").style.borderBottom = "3px groove #FF0C00";

        document.getElementById("textoSobre").innerHTML = "<p>Em nossa empresa, temos um compromisso profundo com a comunidade e a economia local. Acreditamos que o sucesso de uma comunidade está intrinsecamente ligado ao sucesso de suas empresas locais. É por isso que nossos valores fundamentais se concentram em prestar auxílio às lojas locais. Nós reconhecemos que as lojas locais são a espinha dorsal de nossas cidades e vilas, contribuindo para a criação de empregos, a promoção de produtos artesanais e a construção de relacionamentos pessoais com os clientes. É por isso que nos esforçamos para apoiar e colaborar com essas empresas locais. Através de parcerias, compras conscientes e a promoção de iniciativas de responsabilidade social, buscamos fortalecer as lojas locais. Acreditamos que ao fazê-lo, estamos fortalecendo nossa própria comunidade e contribuindo para um futuro mais próspero para todos. Nossos valores são baseados na convicção de que, quando as lojas locais prosperam, a comunidade prospera. Nosso compromisso contínuo com o auxílio às lojas locais reflete nossa dedicação em fazer a diferença e promover um ambiente de negócios mais inclusivo e vibrante. Em cada passo que damos, nossos valores nos orientam na missão de apoiar e fortalecer a base de nossa comunidade.</p>";
    }
    else if(identifica  == 'satisfacao'){
        document.getElementById("valores").style.border = "none";
        document.getElementById("parceiros").style.border = "none";

        document.getElementById("satisfacao").style.borderBottom = "3px groove #FF0C00";

        document.getElementById("textoSobre").innerHTML = `

        <div class = "row">
        <div class="col-7">
          
          <p class="centroDiv">
            Alguns de nossos clientes já estão habituados com a praticidade que nosso serviço de entregas aqui do Coolmida faz, e além disso, também apoiam os nossos principios.
            Apreciando nossos serviços, podemos encontrar até mesmo alguns famosos que já utilizam a nossa plataforma!
          </p>
        </div>
        <div class="col-5">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../img/manuel.png">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/anita.jpg" >
              </div>               
          <div class="carousel-item">
                <img class="d-block w-100" src="../img/skylab.jpg" >
              </div>
          </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>    
  </div>
</div>    
<script>
$('.carrossel').carousel({
intervalo: 2000
})
</script>
        `;
        
    }
    else if(identifica == 'parceiros'){
        document.getElementById("valores").style.border = "none";
        document.getElementById("satisfacao").style.border = "none";

        document.getElementById("parceiros").style.borderBottom = "3px groove #FF0C00";

        document.getElementById("textoSobre").innerHTML = "<p>Quer ser uma das nossas empresas parceiras? Envie um e-mail fazendo sua requisição aqui pro Coolmida. <br> <i>atendimento@coolmida.com</i></p>";
    }
}

function deletar(id_produto){
  if(confirm("Deseja mesmo excluir esse produto?") == true){
    $.ajax({
      type: "POST",
      url: "seu_arquivo_php.php", // Substitua pelo caminho do seu arquivo PHP
      data: { id_produto: id_produto },
      success: function (response) {
        if (response === "exclusao_sucesso") {
          alert("Produto excluído com sucesso!");
          // Redirecione ou faça outras ações após a exclusão
        } else {
          alert("Erro ao excluir o produto.");
        }
      },
    });
  }else{
    window.location.href = 'painel.php';
  }
}