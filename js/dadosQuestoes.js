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
          resposta: 'False'
      },
      {
          imagem: './img/facebookBuscar.png',
          resposta: 'False'
      },
      {
          imagem: './img/facebookCompartilhar.jpg',
          resposta: 'False'
      },
      {
          imagem: './img/facebookCurtir.jpg',
          resposta: 'True'
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
            resposta: 'True'
        },
        {
            imagem: './img/facebookComentar.jpg',
            resposta: 'False'
        },
        {
            imagem: './img/facebookCurtir.jpg',
            resposta: 'False'
        },
        {
            imagem: './img/facebook3pts.jpg',
            resposta: 'False'
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
        resposta: 'False'
      },
      {
        imagem: './img/facebookRedimensionado.png',
        resposta: 'True'
      },
      {
          imagem: './img/playstoreRedimensionado.png',
          resposta: 'False'
      },
      {
          imagem: './img/whatsappRedimensionado.png',
          resposta: 'False'
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
          resposta: 'False'
        },
        {
          imagem: './img/instagram.jpeg',
          resposta: 'False'
        },
        {
          imagem: './img/whatsappRedimensionado.png',
          resposta: 'True'
        },
        {
          imagem: './img/playstoreRedimensionado.png',
          resposta: 'False'
        }
    ]
  },
  {
    modelo: 'alternativa',
    pergunta: 'Selecione o movimento que deve ser realizado para responder uma mensagem específica:',
    alternativas: [
      {
        imagem: './img/setaCimaBaixo.png',
        resposta: 'False'
      },
      {
        imagem: './img/setaDirEsq.png',
        resposta: 'False'
      },
      {
        imagem: './img/setaEsqDir.png',
        resposta: 'True'
      },
      {
        imagem: './img/setaBaixoCima.png',
        resposta: 'False'
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
          resposta: 'Apenas pessoas que você o número salvo'
      },
      {
          texto: 'Ninguém',
          resposta: 'Nenhuma pessoa, mesmo quem está nos seus contantos'
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

  }
*/


/*
***********************ALTERNATIVA***********************

modelo: 'alternativa',
pergunta: '',
alternativas: [
    {
      imagem: '',
      resposta: 'False'
    },
    {
      imagem: '',
      resposta: 'False'
    },
    {
      imagem: '',
      resposta: 'False'
    },
    {
      imagem: '',
      resposta: 'False'
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