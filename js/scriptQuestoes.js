data = catchDadosUrl()
atual = 0;

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

    atual = atual + 1;
    aux_alert = (atual == dados[index].questoes.length)

    if (q.modelo === 'sequencia')
      checarRespostaSequencia(q);
    else if (q.modelo === 'alternativa')
      checarRespostaAlternativa(q);
    else
      checarRespostaToquePares(q);

    if(atual < dados[index].questoes.length)
      mountQuiz();
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

function checarRespostaAlternativa(alt) {
  let flag = true

  let num = parseInt(alternativa.substr(3, 1))

  flag = alt.alternativas[num - 1].resposta

  alertResposta(flag)
}


// Alerta de resposta certa
function alertResposta(flag) {
  if (aux_alert) {
    if (flag) {
      Swal.fire({
        imageUrl: 'img/vovoCorreto.png',
        imageWidth: 300,
        imageHeight: 300,
        imageAlt: 'Correto',
        animation: false,
        confirmButtonColor: '#3e9b8a',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        Swal.fire({
          imageUrl: 'img/vovoConcluido.png',
          imageWidth: 300,
          imageHeight: 300,
          imageAlt: 'Incorreto',
          animation: false,
          confirmButtonColor: '#3e9b8a',
          confirmButtonText: 'Voltar'
        }).then((result) => {
          if (result.value) {
            window.location.href = 'home.php'
          }
        })
      })
    }
    else {
      Swal.fire({
        imageUrl: 'img/vovoIncorreto.png',
        imageWidth: 300,
        imageHeight: 300,
        imageAlt: 'Incorreto',
        animation: false,
        confirmButtonColor: '#3e9b8a',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        Swal.fire({
          imageUrl: 'img/vovoConcluido.png',
          imageWidth: 300,
          imageHeight: 300,
          imageAlt: 'Incorreto',
          animation: false,
          confirmButtonColor: '#3e9b8a',
          confirmButtonText: 'Voltar'
        }).then((result) => {
          if (result.value) {
            window.location.href = 'home.php'
          }
        })
      })      
    }
  }
  else if (flag == true) {
    Swal.fire({
      imageUrl: 'img/vovoCorreto.png',
      imageWidth: 300,
      imageHeight: 300,
      imageAlt: 'Correto',
      animation: false,
      confirmButtonColor: '#3e9b8a',
      confirmButtonText: 'Continuar'
    })
  }
  else {
    Swal.fire({
      imageUrl: 'img/vovoIncorreto.png',
      imageWidth: 300,
      imageHeight: 300,
      imageAlt: 'Incorreto',
      animation: false,
      confirmButtonColor: '#3e9b8a',
      confirmButtonText: 'Continuar'
    })
  }
}