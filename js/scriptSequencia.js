const dados = {
	pergunta: 'Selecione a sequência correta de passos para realizar essa tarefa:',
	alternativas: [
		{
			texto: 'Home',
			posicao: 1,
		},
		{
			texto: 'Conversa',
			posicao: 2,
		},
		{
			texto: 'Anexo',
			posicao: 3,
		},
		{
			texto: 'Selecionar imagem',
			posicao: 4,
		},
		{
			texto: 'Botão verde',
			posicao: 5,
		}
	]
	
}





var alternativas = []
var nAlternativas = 5;

function main(data, num) {
	if (data == 'remove') { // Já está na array
		if (num < alternativas.length) { // Nao permite remover elementos anterior do último
			console.log('Não pode!')
		}
		else {
			if (num <= alternativas.length) {
				remover(num)
			}
		}
	}
	else { // Não está
		str = 'alt'
		var div = document.getElementById(str.concat(num))
		esconderBotao(div)
		if (div.className == "alternativa btn btn-custom btn-custom-question btn-outline-secondary") { // Não deixa adicionar o mesmo elemento
			return;
		}
		div.className = "alternativa btn btn-custom btn-custom-question btn-outline-secondary" // Altera a cor do botão escolhido para cinza

		str = 'esp'
		//Altera a cor do último botão para cinza
		if (alternativas.length != 0) {
			var div = document.getElementById(str.concat((alternativas.length))) // Seleciona a última posição do vetor
			div.className = "alternativa btn btn-custom btn-custom-question btn-outline-secondary"
		}

		//Adiciona novo botão
		var div = document.getElementById(str.concat((alternativas.length + 1))) // Seleciona a primeira posição disponível
		var content = document.createTextNode(data)
		adicionar(div, content) // Adiciona esse elemento para o espaço

		element = [data, num] //Adiciona na array
		alternativas.push(element)
	}

	activeButton();
}

function adicionar(div, content) {
	div.className = "alternativa btn btn-custom btn-custom-question btn-outline-primary" // Altera a cor do elemento criado para azul
	div.appendChild(content)
}

function remover(div) {
	str = 'esp'
	str = str.concat(div)
	var div = document.getElementById(str)
	div.className = "alternativa btn btn-custom btn-custom-question btn-outline-secondary" // Altera o botão dos espaços para secondary
	div.innerHTML = ""

	aux = alternativas[alternativas.length - 1] // Pega o último elemento da array
	str = 'alt'
	str = str.concat(aux[1]) // Concatena o id da posição do elemento
	var div = document.getElementById(str)
	aparecerBotao(div)
	div.className = "alternativa btn btn-custom btn-custom-question btn-outline-primary" // Altera a cor para azul

	alternativas.pop() // Remove o último elemento

	if (alternativas.length != 0) {
		str = 'esp'
		var div = document.getElementById(str.concat(alternativas.length)) // Seleciona a última posição do vetor
		div.className = "alternativa btn btn-custom btn-custom-question btn-outline-primary"
	}

	disableButton()
}

function esconderBotao(div) {
	div.style.display = "none"
}

function aparecerBotao(div) {
	div.style.display = ""
}

function formatar() {
	formatado = []
	for (i = 0; i < alternativas.length; i++) {
		formatado[i] = alternativas[i][0];
	}
}


activeButton = () => {
	if (alternativas.length === nAlternativas) {
		let button = document.getElementById('confirmar');

		button.disabled = false;
		button.classList.remove('btn-outline-secondary');
		button.classList.add('btn-success');
	}
}

disableButton = () => {
	if (alternativas.length === (nAlternativas - 1)) {
		let button = document.getElementById('confirmar');

		button.disabled = true;
		button.classList.remove('btn-success');
		button.classList.add('btn-outline-secondary');
	}
}

function mountQuiz() {
    var quiz = document.getElementById('quiz');

    quiz.removeChild(document.getElementById('conteudo')); //remove o conteudo da div

    //Monta a questão

	//adiciona titulo
	var div = document.createElement('div');
    var title = document.createElement('h3');
    var node = document.createTextNode(dados.pergunta);
	title.appendChild(node);
	
	div.className = 'enum';
	div.appendChild(title);

	quiz.appendChild(div);

	div = document.createElement('div');
	div.className = 'espaco';

	

	dados.alternativas.map((x, index) => {
		var button = document.createElement('button');

		button.type = 'button';
		button.addEventListener('click', function (){
			main('remove', index + 1);
		})
		button.className = 'alternativa btn btn-custom btn-custom-question btn-outline-secondary';
		button.id = `esp${index + 1}`;

		div.appendChild(button);
	})

	quiz.appendChild(div);

	quiz.appendChild(document.createElement('hr'));
	
	div = document.createElement('div');
	div.className = 'alternativas col-12 row';


	dados.alternativas.map((x, index) => {
		var button = document.createElement('button');
		var buttonText = document.createTextNode(x.texto);

		button.type = 'button';
		button.addEventListener('click', function (){
			main(x.texto, index + 1);
		})
		button.className = 'alternativa btn btn-outline-primary btn-custom btn-custom-question';
		button.id = `alt${index + 1}`;

		button.appendChild(buttonText);
		div.appendChild(button);
	})

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