function preencheCampos(json) {
  document.querySelector('input#endereco').value = json.logradouro;
  document.querySelector('input#bairro').value = json.bairro;
  document.querySelector('input#complemento').value = json.complemento;
  document.querySelector('input#cidade').value = json.localidade;
  document.querySelector('input#estado').value = json.uf;
}

function buscaCep() {
  let inputCep = document.querySelector('input.cep');
  let cep = inputCep.value.replace('-', '');
  let url = 'http://viacep.com.br/ws/' + cep + '/json';
  let xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status = 200)
        preencheCampos(JSON.parse(xhr.responseText));
      console.log(JSON.parse(xhr.responseText))
    }
  }
  xhr.send();
}