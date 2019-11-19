	// Função para criar as video aulas
	function createAulas(id) {
		for (i = 0; i < dadosAulas.length; i++) {
			if (dadosAulas[i]['id_cat'] == id) {
				// Div do card
				let divCard = document.createElement('div')
				divCard.className = 'card'
				divCard.id = 'card-aulas'

				// img
				let img = document.createElement('img')
				img.className = 'card-img-top'

				// Pega a thumbnail
				let imgaux = 'http://img.youtube.com/vi/'.concat(dadosAulas[i].id_video).concat('/maxresdefault.jpg')
				img.src = imgaux
				divCard.appendChild(img)

				// Div card body
				let divBody = document.createElement('div')
				divBody.className = 'card-body'
				divCard.appendChild(divBody)

				// Center e h5
				let center = document.createElement('center')
				let h5 = document.createElement('h5')
				h5.className = "card-title"
				let h5Text = document.createTextNode(dadosAulas[i]['nome'])
				h5.appendChild(h5Text)
				center.appendChild(h5)
				divBody.appendChild(center)

				// Div card footer
				let divFooter = document.createElement('div')
				divFooter.className = 'card-footer btn-group'
				divFooter.dataToggle = 'buttons'
				divCard.appendChild(divFooter)

				// Label
				let label = document.createElement('label')
				label.id = 'labelText'
				label.className = 'btn btn-primary'
				divFooter.appendChild(label)

				// Input
				let input = document.createElement('input')
				input.type = 'radio'
				input.className = 'selectAulas'
				input.name = 'selectAulas'
				input.value = dadosAulas[i]['id_video']
				input.required = true
				label.appendChild(input)
				// divFooter.appendChild(input)

				// Div texto
				let divText = document.createElement('div')
				divText.id = 'divText'
				label.appendChild(divText)
				let inputText = document.createTextNode('Selecionar')
				divText.appendChild(inputText)

				// Div mãe
				let div = document.getElementById('aulas')
				div.appendChild(divCard)
			}
		}
	}
	
	$('#FormCat').on('change', function() {
		// Remove todos os child
		var elemento = document.getElementById('aulas');
		while (elemento.firstChild) {
			elemento.removeChild(elemento.firstChild);
		}
		// Insere novas vídeo aulas com a categoria selecionada
		createAulas(this.value)
	});


	var backup = false; // Backup do element que foi alterado
	$('.selectAulas').on('click', function(element) {
		let aux = element.target // Pega o input que foi selecionado
		let auxTexto = element.target.nextSibling // Pega o texto dentro do input que foi selecionado

		if (backup) { // Caso tiver algum input, volta os valores para o padrão
			backup.innerHTML = 'Selecionar'
			backup.parentElement.className = 'btn btn-primary'
		}
		backup = aux.nextSibling // Armazena o novo input selecionado

		// Altera os valores do inputs selecionado
		aux.nextSibling.innerHTML =  'Selecionado'
		aux.parentElement.className =  'btn btn-dark'
	})