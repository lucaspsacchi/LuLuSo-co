var alternativas = []
var nAlternativas

function mainSequencia(data, num) {
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

		str = 'esp'
		//Altera a cor do último botão para cinza
		if (alternativas.length != 0) {
			var div = document.getElementById(str.concat((alternativas.length))) // Seleciona a última posição do vetor
			secondaryBtn(div, 0)
		}

		//Adiciona novo botão
		var div = document.getElementById(str.concat((alternativas.length + 1))) // Seleciona a primeira posição disponível
		var content = document.createTextNode(data)
		adicionar(div, content) // Adiciona esse elemento para o espaço

		element = [data, num] //Adiciona na array
		alternativas.push(element)
	}

	activeButtonSequencia();
}

function adicionar(div, content) {
	primaryBtn(div) // Altera a cor do elemento criado para azul
	div.appendChild(content)
}

function remover(div) {
	str = 'esp'
	str = str.concat(div)
	var div = document.getElementById(str)
	secondaryBtn(div, 1) // Altera o botão dos espaços para secondary
	div.innerHTML = ""

	aux = alternativas[alternativas.length - 1] // Pega o último elemento da array
	str = 'alt'
	str = str.concat(aux[1]) // Concatena o id da posição do elemento
	var div = document.getElementById(str)
	aparecerBotao(div)

	alternativas.pop() // Remove o último elemento

	if (alternativas.length != 0) {
		str = 'esp'
		var div = document.getElementById(str.concat(alternativas.length)) // Seleciona a última posição do vetor
		primaryBtn(div)
	}

	disableButton()
}

function esconderBotao(div) {
	div.style.display = "none"
}

function aparecerBotao(div) {
	div.style.display = ""
}

function secondaryBtn(div, num) {
	if (num) {
		div.classList.remove('btn-alternativa')
	}
	div.classList.remove('btn-outline-primary');
	div.classList.add('btn-outline-secondary');
}

function primaryBtn(div) {
	div.classList.remove('btn-outline-secondary');
	div.classList.add('btn-alternativa');
	div.classList.add('btn-outline-primary');
}

// Formatar resultado
function formatar() {
	formatado = []
	for (i = 0; i < alternativas.length; i++) {
		formatado[i] = alternativas[i][0];
	}
}

activeButtonSequencia = () => {
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
		button.classList.remove('btn-alternativa');
		button.classList.add('btn-outline-secondary');
	}
}

function mountSequencia(dados, pos, total) {

	// Embaralha as alternativas
	dados.alternativas = shuffle(dados.alternativas)

	var quiz = document.getElementById('quiz');
	nAlternativas = dados.alternativas.length

	var divNum = document.createElement('div');
	var h3 = document.createElement('h3');
	let text = 'Questão ' + (pos + 1) + ' de ' + total
	var node = document.createTextNode(text);
	h3.appendChild(node);

	divNum.className = 'questoes';
	divNum.appendChild(h3);

	quiz.appendChild(divNum);

	var form = document.createElement('form')
	form.action = '#'
	form.method = 'POST'
	form.enctype = 'multipart/form-data'

	quiz.appendChild(form)

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
			mainSequencia('remove', index + 1);
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
			mainSequencia(x.texto, index + 1);
		})
		button.className = 'alternativa btn btn-outline-primary btn-custom btn-custom-question btn-alternativa';
		button.id = `alt${index + 1}`;
		button.name = 'alt'.concat(index+1)

		button.appendChild(buttonText);
		div.appendChild(button);
	})

	quiz.appendChild(div);
	var botao = document.createElement('button');
	var botaoTexto = document.createTextNode('Confirmar');

	botao.id = 'confirmar';
	// botao.type = 'submit';
	botao.className = 'confirma btn btn-custom btn-outline-secondary';
	botao.name = 'salvar_dados'
	botao.setAttribute("onclick","submitPergunta()");
	botao.disabled = true;

	botao.appendChild(botaoTexto);
	quiz.appendChild(botao);

}
