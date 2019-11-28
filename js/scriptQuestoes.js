data = catchDadosUrl()
atual = 0;

// Auxiliares para o post
dados_flag = []
dados_i = 0


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

  console.log(dados)

  const index = dados.map(x => x.id_video).indexOf(data.id);

  let q = dados[index].questoes[atual];
  let total = dados[index].questoes.length;

  if (q.modelo === 'sequencia')
    mountSequencia(q, atual, total);
  else if (q.modelo === 'alternativa')
    mountAlternativa(q, atual, total);
  else if (q.modelo === 'pares')
    mountToquePares(q, atual, total);


  let confirmar = document.getElementById('confirmar');

  confirmar.addEventListener('click', () => {

    atual = atual + 1;
    aux_alert = (atual == dados[index].questoes.length)

    // Armazena o id no post
    str_aux = 'id'.concat(dados_i)
    dados_flag.push({key: str_aux, value: q.id_pergunta})

    if (q.modelo === 'sequencia') {
      checarRespostaSequencia(q);
    }
    else if (q.modelo === 'alternativa') {
      checarRespostaAlternativa(q);
    }
    else {
      checarRespostaToquePares(q);
    }

    if(atual < dados[index].questoes.length)
      mountQuiz();
  });

}

checarRespostaToquePares = ()  => {
  if(respondidos.length === nPares * 2) {//se todas as alternativas foram marcadas como respondidas
    //Carregar modal de acerto

    // Adiciona a flag no post
    str_aux = 'flag'.concat(dados_i)
    dados_flag.push({key: str_aux, value: 1})

    dados_i = dados_i + 1

    alertResposta(true);
  }
  else {
    //Carregar modal de erro

    str_aux = 'flag'.concat(dados_i)
    dados_flag.push({key: str_aux, value: 0})

    dados_i = dados_i + 1

    alertResposta(false);
  }

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
  
  // Adiciona a flag no post
  str_aux = 'flag'.concat(dados_i)
  dados_flag.push({key: str_aux, value: (flag ? 1 : 0)})
  dados_i = dados_i + 1

  alertResposta(flag)
}

function checarRespostaAlternativa(alt) {
  let flag = true

  let num = parseInt(alternativa.substr(3, 1))

  flag = alt.alternativas[num - 1].resposta

  // Adiciona a flag no post
  str_aux = 'flag'.concat(dados_i)
  dados_flag.push({key: str_aux, value: (flag ? 1 : 0)})
  dados_i = dados_i + 1

  alertResposta(flag)
}


// Alerta de resposta certa
function alertResposta(flag) {
  if (aux_alert) {
    // Count
    let count_flag = 0
    // Monta a url para o retorno
    url_redirecionamento = url_redirecionamento + data.id
    for (i = 0, j = 0; i < dados_flag.length; i++, j++) {
      id = '&id' + j
      flagj = '&flag' + j
      url_redirecionamento = url_redirecionamento + id + '=' + dados_flag[i]['value'] // Id pergunta
      url_redirecionamento = url_redirecionamento + flagj + '=' + dados_flag[++i]['value'] // Valor da flag
      count_flag = (dados_flag[i]['value'] == 1) ? count_flag + 1 : count_flag
    }
    
    // Texto do alerta
    plural = ((dados_flag.length / 2) != 1) ? 'questões' : 'questão'
    msg_flag = 'Você acertou ' + count_flag + ' de ' + (dados_flag.length / 2) + ' ' + plural +'!'
    console.log(msg_flag)


    if (flag) {
      Swal.fire({
        imageUrl: 'img/vovoCorreto.png',
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: 'Correto',
        animation: false,
        confirmButtonColor: '#3e9b8a',
        confirmButtonText: 'Continuar',
        allowOutsideClick: false
      }).then((result) => {
        Swal.fire({
          text: msg_flag,
          imageUrl: 'img/vovoConcluido.png',
          imageWidth: 250,
          imageHeight: 250,
          imageAlt: 'Correto',
          animation: false,
          confirmButtonColor: '#3e9b8a',
          confirmButtonText: 'OK',
          allowOutsideClick: false
        }).then((result) => {
          if (result.value) {
            window.location.href = url_redirecionamento
          }
        })
      })
    }
    else {
      Swal.fire({
        imageUrl: 'img/vovoIncorreto.png',
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: 'Incorreto',
        animation: false,
        confirmButtonColor: '#3e9b8a',
        confirmButtonText: 'Continuar',
        allowOutsideClick: false
      }).then((result) => {
        Swal.fire({
          text: msg_flag,
          imageUrl: 'img/vovoConcluido.png',
          imageWidth: 250,
          imageHeight: 250,
          imageAlt: 'Incorreto',
          animation: false,
          confirmButtonColor: '#3e9b8a',
          confirmButtonText: 'OK',
          allowOutsideClick: false
        }).then((result) => {
          if (result.value) {
            window.location.href = url_redirecionamento
          }
        })
      })      
    }
  }
  else if (flag) {
    Swal.fire({
      imageUrl: 'img/vovoCorreto.png',
      imageWidth: 250,
      imageHeight: 250,
      imageAlt: 'Correto',
      animation: false,
      confirmButtonColor: '#3e9b8a',
      confirmButtonText: 'Continuar',
      allowOutsideClick: false
    })
  }
  else {
    Swal.fire({
      imageUrl: 'img/vovoIncorreto.png',
      imageWidth: 250,
      imageHeight: 250,
      imageAlt: 'Incorreto',
      animation: false,
      confirmButtonColor: '#3e9b8a',
      confirmButtonText: 'Continuar',
      allowOutsideClick: false
    })
  }
}