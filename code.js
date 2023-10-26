function buscar(){
    let busquinha = document.getElementById("busquinha").value

    const buscou = JSON.stringify(busquinha)
    localStorage.setItem("pesquisa" , busquinha) 

    window.location.href = "navbar/busca.html"    
}


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

document.querySelector("form").addEventListener("submit", function(event) {
    if (!validarFormulario()) {
        event.preventDefault();
    }
});