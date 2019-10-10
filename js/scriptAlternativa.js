const dados = {
    pergunta: 'Selecione a imagem que representa o Facebook:',
    posicao: '2',
    alternativas: [
        {
            imagem: './img/cameraRedimensionado.png'
        },
        {
            imagem: './img/facebookRedimensionado.png'
        },
        {
            imagem: './img/playstoreRedimensionado.png'
        },
        {
            imagem: './img/whatsappRedimensionado.png'
        },
    ]
}



var alternativa = 0;

function main(alt) {
    if(alternativa != 0) {
        var div = document.getElementById(alternativa);
        div.className = "button btn btn-outline-secondary btn-custom-alternativa";
    }

    alternativa = alt;
    var div = document.getElementById(alternativa);
    div.className = "button btn btn-outline-primary btn-custom-alternativa btn-custom-selecionado";

    activeButton();
}

activeButton = () => {
    let button = document.getElementById('confirmar');

    button.disabled = false; 
    button.classList.remove('btn-outline-secondary');
    button.classList.add('btn-success');

}


function mountQuiz() {
    var quiz = document.getElementById('quiz');

    quiz.removeChild(document.getElementById('conteudo'));
    quiz.className = 'question shadow d-flex flex-column align-items-center';

    var div = document.createElement('div');
    var title = document.createElement('h3');
    var node = document.createTextNode(dados.pergunta);
	title.appendChild(node);
	
	div.className = 'enum';
	div.appendChild(title);

    quiz.appendChild(div);
    
    div = document.createElement('div');
    div.className = 'col-12 col-md-12 col-sm-12';
    
    var alternativas = document.createElement('div');
    alternativas.className = 'row';

    dados.alternativas.map((x, index) => {
        var alter = document.createElement('div');
        alter.className = 'col-6 col-md-3 d-flex justify-content-center';

        var button = document.createElement('button');
        button.type = 'button';
        button.id = `alt${index + 1}`;
        button.addEventListener('click', function(){
            main(button.id);
        });
        button.className = 'button btn btn-outline-secondary btn-custom-alternativa'
        
        var imagemDiv = document.createElement('div');
        imagemDiv.className = 'd-flex justify-content-center';

        var imagem = document.createElement('img');
        imagem.src = x.imagem;
        imagem.alt = `Alternativa ${index + 1}`;

        imagemDiv.appendChild(imagem);
        button.appendChild(imagemDiv);
        alter.appendChild(button);

        alternativas.appendChild(alter);
    })
    

    div.appendChild(alternativas);
    quiz.appendChild(div);

    var botao = document.createElement('button');
	var botaoTexto = document.createTextNode('Confirmar');

	botao.id = 'confirmar';
	botao.type = 'submit';
	botao.className = 'confirma btn btn-custom btn-outline-secondary';
	botao.disabled = true;

	botao.appendChild(botaoTexto);
	quiz.appendChild(botao);


}