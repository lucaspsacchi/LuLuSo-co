var alternativa = 0;

function mainAlternativa(alt) {
    if(alternativa != 0) {
        var div = document.getElementById(alternativa);
        div.className = "button btn btn-outline-secondary btn-custom-alternativa";
    }

    alternativa = alt;
    var div = document.getElementById(alternativa);
    div.className = "button btn btn-outline-primary btn-custom-alternativa btn-custom-selecionado";

    activeButtonAlternativa();
}

activeButtonAlternativa = () => {
    let button = document.getElementById('confirmar');

    button.disabled = false; 
    button.classList.remove('btn-outline-secondary');
    button.classList.add('btn-success');

}


function mountAlternativa(dados, pos, total) {
    var quiz = document.getElementById('quiz');

    quiz.className = 'question shadow';

    var divNum = document.createElement('div');
    var h4 = document.createElement('h4');
    let text = 'Questão ' + (pos + 1) + ' de ' + total
    var node = document.createTextNode(text);
    h4.appendChild(node);
    h4.className = 'h4Questoes'
	
	divNum.className = 'questoes';
	divNum.appendChild(h4);

    quiz.appendChild(divNum);

    var div = document.createElement('div');
    var title = document.createElement('h4');
    var node = document.createTextNode(dados.pergunta);
	title.appendChild(node);
	
	div.className = 'enum';
	div.appendChild(title);

    quiz.appendChild(div);
    
    div = document.createElement('div');
    div.className = 'col-12 col-md-12 col-sm-12';
    
    var alternativas = document.createElement('div');
    alternativas.className = 'row';

	// Embaralha as alternativas
	dados.alternativas = shuffle(dados.alternativas)

    dados.alternativas.map((x, index) => {
        var alter = document.createElement('div');
        alter.className = 'col-6 col-md-3 d-flex justify-content-center';

        var button = document.createElement('button');
        button.type = 'button';
        button.id = `alt${index + 1}`;
        button.addEventListener('click', function(){
            mainAlternativa(button.id);
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