const dados = [{
  id_video: 'IAZYoNs7kU4',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para curtir uma página:',
    alternativas: [
      {
        texto: 'Selecionar lupa',
        posicao: 1
      },
      {
        texto: 'Digitar nome',
        posicao: 2
      },
      {
        texto: 'Buscar',
        posicao: 3
      },
      {
        texto: 'Selecionar página',
        posicao: 4
      },
      {
        texto: 'Curtir',
        posicao: 5
      }
    ]
  },
  {
    modelo: 'alternativa',
    pergunta: 'Selecione o ícone que representa a ação de curtir uma página:',
    alternativas: [
      {
          imagem: './img/facebook3pts.jpg',
          resposta: false
      },
      {
          imagem: './img/facebookBuscar.png',
          resposta: false
      },
      {
          imagem: './img/facebookCompartilhar.jpg',
          resposta: false
      },
      {
          imagem: './img/facebookCurtir.jpg',
          resposta: true
      }
    ]
  }]
},
{
  id_video: 'K1xfGs7pGho',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para compartilhar uma publicação',
    alternativas: [
      {
        texto: 'Escolher publicação',
        posicao: 1
      },
      {
        texto: 'Compartilhar',
        posicao: 2
      },
      {
        texto: 'Escrever mensagem',
        posicao: 3
      },
      {
        texto: 'Compartilhar agora',
        posicao: 4
      }
    ]
  },
  {
    modelo: 'alternativa',
    pergunta: 'Selecione o ícone que representa \"Compartilhar\":',
    alternativas: [
        {
            imagem: './img/facebookCompartilhar.jpg',
            resposta: true
        },
        {
            imagem: './img/facebookComentar.jpg',
            resposta: false
        },
        {
            imagem: './img/facebookCurtir.jpg',
            resposta: false
        },
        {
            imagem: './img/facebook3pts.jpg',
            resposta: false
        }
    ]
  }]
},
{
  id_video: 'cbhTDynLA74',
  questoes: [{
    modelo: 'alternativa',
    pergunta: 'Selecione o ícone do Facebook:',
    alternativas: [
      {
        imagem: './img/instagram.jpeg',
        resposta: false
      },
      {
        imagem: './img/facebookRedimensionado.png',
        resposta: true
      },
      {
          imagem: './img/playstoreRedimensionado.png',
          resposta: false
      },
      {
          imagem: './img/whatsappRedimensionado.png',
          resposta: false
      }
    ]
  },
  {
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para alterar a foto de perfil',
    alternativas: [
      {
        texto: 'Três tracinhos',
        posicao: 1
      },
      {
        texto: 'Perfil',
        posicao: 2
      },
      {
        texto: 'Câmera ao lado da foto',
        posicao: 3
      },
      {
        texto: 'Selecionar foto ou vídeo do perfil',
        posicao: 4
      },
      {
        texto: 'Mais',
        posicao: 5
      },
      {
        texto: 'Escolher foto',
        posicao: 6
      },
      {
        texto: 'Concluir',
        posicao: 7
      },
      {
        texto: 'Salvar',
        posicao: 8
      }
    ]       
  }]
},
{
  id_video: 'rukpFI0pLZ4',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para realizar uma chamada de voz',
    alternativas: [
      {
        texto: 'Localizar ícones no canto superior da tela',
        posicao: 1
      },
      {
        texto: 'Telefone',
        posicao: 2
      },
      {
        texto: 'Conversar com pessoa',
        posicao: 3
      },
      {
        texto: 'Botão vermelho',
        posicao: 4
      }
    ]   
  }]
},
{
  id_video: 'RlJk9Mjpcv0',
  questoes: [{
    modelo: 'alternativa',
    pergunta: 'Selecione o ícone do WhatsApp:',
    alternativas: [
        {
          imagem: './img/facebookRedimensionado.png',
          resposta: false
        },
        {
          imagem: './img/instagram.jpeg',
          resposta: false
        },
        {
          imagem: './img/whatsappRedimensionado.png',
          resposta: true
        },
        {
          imagem: './img/playstoreRedimensionado.png',
          resposta: false
        }
    ]
  },
  {
    modelo: 'alternativa',
    pergunta: 'Selecione o movimento que deve ser realizado para responder uma mensagem específica:',
    alternativas: [
      {
        imagem: './img/setaCimaBaixo.png',
        resposta: false
      },
      {
        imagem: './img/setaDirEsq.png',
        resposta: false
      },
      {
        imagem: './img/setaEsqDir.png',
        resposta: true
      },
      {
        imagem: './img/setaBaixoCima.png',
        resposta: false
      }
    ]
  }]
},
{
  id_video: 'L10CJs6pKI4',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para chegar nas configurações de privacidade:',
    alternativas: [
      {
        texto: 'Três pontinhos',
        posicao: 1
      },
      {
        texto: 'Configurações',
        posicao: 2
      },
      {
        texto: 'Conta',
        posicao: 3
      },
      {
        texto: 'Privacidade',
        posicao: 4
      }
    ]    
  }]
},
{
  id_video: '63jDpRxhGsI',
  questoes: [{
    modelo: 'pares',
    pergunta: 'Toque nos pares de configurações e seus significados:',
    alternativas: [
      {
          texto: 'Status',
          resposta: 'Foto/vídeo disponível por 24h'
      },
      {
          texto: 'Confirmação de leitura',
          resposta: 'Ícone que mostra se já leu a conversa'
      },
      {
          texto: 'Localização em tempo real',
          resposta: 'Posição durante um período de tempo'
      },
      {
          texto: 'Contatos bloqueados',
          resposta: 'Pessoas que não podem mandar mensagem/ligar'
      }
    ]
  },
  {
    modelo: 'pares',
    pergunta: 'Toque nos pares de tipos de privacidade e seus significados',
    alternativas: [{
          texto: 'Todos',
          resposta: 'Qualquer pessoa, mesmo quem não está nos seus contatos'
      },
      {
          texto: 'Meus Contatos',
          resposta: 'Apenas pessoas que você tem o número salvo'
      },
      {
          texto: 'Ninguém',
          resposta: 'Nenhuma pessoa, mesmo quem está nos seus contantos'
      }
    ]
  }]
},
{
  id_video: '7UsZo4wzVZU',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para curtir uma publicação:',
    alternativas: [
      {
        texto: 'Página inicial',
        posicao: 1
      },
      {
        texto: 'Encontrar publicação',
        posicao: 2
      },
      {
        texto: 'Clicar duas vezes na foto',
        posicao: 3
      },
      {
        texto: 'Verificar coração vermelho',
        posicao: 4
      }
    ]
  }]
},
{
  id_video: 'mUGJkqYFbYA',
  questoes: [{
    modelo: 'sequencia',
    pergunta: 'Selecione a sequência de passos para seguir uma página',
    alternativas: [
      {
        texto: 'Clicar na lupa',
        posicao: 1
      },
      {
        texto: 'Clicar na barra de busca',
        posicao: 2
      },
      {
        texto: 'Digitar nome da página',
        posicao: 3
      },
      {
        texto: 'Selecionar uma página',
        posicao: 4
      },
      {
        texto: 'Seguir',
        posicao: 5
      }
    ]    
  }]
}
]


////////////////MODELOS DAS QUESTÕES////////////////

/*
***********************ESTRUTURA DAS PERGUNTAS***********************
{
  id_video: '',
  questoes: [{
    // Modelo da pergunta

  }]
*/


/*
***********************ALTERNATIVA***********************

modelo: 'alternativa',
pergunta: '',
alternativas: [
    {
      imagem: '',
      resposta: false
    },
    {
      imagem: '',
      resposta: false
    },
    {
      imagem: '',
      resposta: false
    },
    {
      imagem: '',
      resposta: false
    }
]
*/

/*
***********************SEQUENCIA***********************
modelo: 'sequencia',
pergunta: '',
alternativas: [
  {
    texto: '',
    posicao: 1
  },
  {
    texto: '',
    posicao: 2
  }
  // ...
]
*/

/*
***********************TOQUE NOS PARES***********************
  modelo: 'pares',
  pergunta: '',
  alternativas: [{
        texto: '',
        resposta: ''
    },
    {
        texto: '',
        resposta: ''
    },
    // ...
    ]
*/