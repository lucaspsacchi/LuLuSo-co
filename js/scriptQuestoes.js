window.addEventListener('load', (event) => {
  data = catchDadosUrl()
  atual = 0;
})

// Pega as chaves e valores da url
function catchDadosUrl() {
  var query = location.search.slice(1)
  var partes = query.split('&')
  var data = {}
  partes.forEach(function (parte) {
    var chaveValor = parte.split('=')
    var chave = chaveValor[0]
    var valor = chaveValor[1]
    data[chave] = valor
  })

  return data
}




mountQuiz = () => {

  var quiz = document.getElementById('quiz');

  while (quiz.firstChild) {
    quiz.removeChild(quiz.firstChild);
  } //remove o conteudo da div

  const index = dados.map(x => x.id_video).indexOf(data.id);

  let q = dados[index].questoes[atual];

  if (q.modelo === 'sequencia')
    mountSequencia(q);
  else if (q.modelo === 'alternativa')
    mountAlternativa(q);
  else if (q.modelo === 'pares')
    mountToquePares(q);


  let confirmar = document.getElementById('confirmar');

  confirmar.addEventListener('click', () => {

    if (q.modelo === 'sequencia')
      checarRespostaSequencia(q);
    else if (q.modelo === 'alternativa')
      checarRespostaAlternativa(q);
    else
      checarRespostaToquePares(q);

    atual = atual + 1;

    if(atual < dados[index].questoes.length)
      mountQuiz();
  });

}

checarRespostaToquePares = ()  => {
  if(respondidos.length === nPares * 2){
      //Carregar modal de acerto
      alertResposta(true);
  }
  else{
      //Carregar modal de erro
      alertResposta(false);

  }
}