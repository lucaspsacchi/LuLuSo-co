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

    console.log('antes ' + atual)
    atual = atual + 1;
    console.log('depois ' + atual)

    console.log(dados[index].questoes.length);
    if(atual < dados[index].questoes.length)
      mountQuiz();
    else{
      alertResposta('fim');
    }
  });

}

checarRespostaToquePares = ()  => {
  if(respondidos.length === nPares * 2) //se todas as alternativas foram marcadas como respondidas
      //Carregar modal de acerto
      alertResposta(true);
  else
      //Carregar modal de erro
      alertResposta(false);

  resetToquePares();
}

function checarRespostaSequencia(sequencia) {
  formatar()

  let flag = true

  alternativas = sequencia.alternativas

  for (i = 0; i < nAlternativas; i++) {
    if ((formatado.indexOf(formatado[i]) + 1) != alternativas.find(x => x.texto == formatado[i]).posicao) {
      flag = false
    }
  }
  
  alertResposta(flag)
}

function checarRespostaAlternativa(alternativa) {
  let flag = true

  let str = alternativa.substr(4, 1)

  flag = alternativa.alternativas[Number(str) - 1].toLowerCase()

  alertResposta(flag)
}


// Alerta de resposta certa
function alertResposta(flag) {
  if (flag == true) {
    console.log('Acertou!!!!!!!!')
  }
  else {
    console.log('Errou!!!!!!!!')
  }
}