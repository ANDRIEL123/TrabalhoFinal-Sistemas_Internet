const pegaUrlAtual = () => {
    const url = window.location.href.split(window.location.pathname)
    return url[0]
}

const gerirRotas = (rota) => {
    window.location.href = this.pegaUrlAtual() + rota
}

function validaCadastro() {

    let nome = document.getElementsByName("nome");
    let precoUnitario = document.getElementsByName("preco");

    if (nome !== '' && precoUnitario !== '') {
        let confirm = window.confirm("Cadastro com sucesso, deseja cadastrar outro?");
        if (confirm) {
            gerirRotas("cadastraProduto.html")
        } else {
            gerirRotas("menu.html")
        }
    } else {
        alert("Preencha todos os campos!")
    }
}