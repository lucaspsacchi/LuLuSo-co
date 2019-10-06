var alternativas = []
var nAlternativas = 5;

function main(data, num) {
	if (data == 'remove') { // Já está na array
		if (num < alternativas.length) { // Nao permite remover elementos anterior do último
			console.log('Não pode!')
		} else {
			if (num <= alternativas.length) {
				remover(num)
			}
		}
	} else { // Não está
		str = 'alt'
		var div = document.getElementById(str.concat(num))
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
	div.className = "alternativa btn btn-custom btn-custom-question btn-outline-primary" // Altera a cor para azul

	alternativas.pop() // Remove o último elemento

	if (alternativas.length != 0) {
		str = 'esp'
		var div = document.getElementById(str.concat(alternativas.length)) // Seleciona a última posição do vetor
		div.className = "alternativa btn btn-custom btn-custom-question btn-outline-primary"
	}
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