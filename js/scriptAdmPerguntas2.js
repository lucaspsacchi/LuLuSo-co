function createAlt(e) {
  if (e == 1) { // Sequência
    for (i = 0; i < 5; i++) {
      let divGroup = document.createElement('div')
      divGroup.className = 'form-group col-12 col-md-6 col-lg-6' 
  
      let label = document.createElement('label')
      label.for = 'alternativa'.concat(i)
      let labelText = document.createTextNode('Alternativa '.concat(i+1))
      label.appendChild(labelText)
      divGroup.appendChild(label)

      let input = document.createElement('input')
      input.type = 'text'
      input.className = 'form-control'
      input.id = 'alternativa'.concat(i)
      input.name = 'alternativa'.concat(i)
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)
    }
  }
  else if (e == 0) { // Alternativa
    for (i = 0; i < 4; i++) {
      let divGroup = document.createElement('div')
      divGroup.className = 'form-group col-12 col-md-6 col-lg-6' 

      let img = document.createElement('img')
      img.id = 'photo'.concat(i)
      img.className = 'img-rounded'
      img.width = '320'
      img.height = '180'
      divGroup.appendChild(img)

      let br1 = document.createElement('br')
      divGroup.appendChild(br1)


      let label = document.createElement('label')
      label.for = 'comment'.concat(i)
      let labelText = document.createTextNode('Imagem '.concat(i+1))
      label.appendChild(labelText)
      divGroup.appendChild(label)

      let br2 = document.createElement('br')
      divGroup.appendChild(br2)

      let input = document.createElement('input')
      input.type = 'file'
      input.id = 'file'.concat(i)
      input.name = 'file'.concat(i)
      input.required = 'true'
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)
    }
  }
  else { // Toque nos Pares
    for (i = 0, aux = 0; i < 8; i++) {
      aux = (i % 2 == 0) ? (i / 2) : aux

      let divGroup = document.createElement('div')
      divGroup.className = 'form-group col-12 col-md-6 col-lg-6' 
  
      let label = document.createElement('label')
      label.for = 'par'.concat(aux)
      newText = (i % 2 == 0) ? 'Par '.concat(aux+1) : 'Resposta '.concat(aux+1)
      let labelText = document.createTextNode(newText)
      label.appendChild(labelText)
      divGroup.appendChild(label)

      let input = document.createElement('input')
      input.type = 'text'
      input.className = 'form-control'
      input.id = 'alternativa'.concat(i)
      input.name = 'alternativa'.concat(i)
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)
    }
  }
}

$('#FormMod').on('change', function() {
  // Remove todos os child
  var elemento = document.getElementById('alternativas');
  while (elemento.firstChild) {
    elemento.removeChild(elemento.firstChild);
  }
  // Cria novas alternativas de acordo com o escolhido no select
  createAlt(this.value)
});

