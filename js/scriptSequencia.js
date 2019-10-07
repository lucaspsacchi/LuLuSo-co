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

		str = 'esp'
		//Altera a cor do último botão para cinza
		if (alternativas.length != 0) {
			var div = document.getElementById(str.concat((alternativas.length))) // Seleciona a última posição do vetor
			secondaryBtn(div)
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
	primaryBtn(div) // Altera a cor do elemento criado para azul
	div.appendChild(content)
}

function remover(div) {
	str = 'esp'
	str = str.concat(div)
	var div = document.getElementById(str)
	secondaryBtn(div) // Altera o botão dos espaços para secondary
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

function secondaryBtn(div) {
	div.classList.remove('btn-outline-primary');
	div.classList.add('btn-outline-secondary');
}

function primaryBtn(div) {
	div.classList.remove('btn-outline-secondary');
	div.classList.add('btn-outline-primary');
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