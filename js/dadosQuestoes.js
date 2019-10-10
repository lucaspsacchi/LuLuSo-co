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
}
]


////////////////MODELOS DAS QUESTÕES////////////////

/*
***********************ESTRUTURA DAS PERGUNTAS***********************
{
  id_video: '',
  questoes: [{
    modelo: '',
    // Modelo da pergunta

  }
*/


/*
***********************ALTERNATIVA***********************
const dados = {
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
}
*/

/*
***********************SEQUENCIA***********************
const dados = {
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
	
}
*/

/*
***********************TOQUE NOS PARES***********************
const dados = [{
        texto: '',
        resposta: ''
    },
    {
        texto: '',
        resposta: ''
    }
    // ...
]
*/