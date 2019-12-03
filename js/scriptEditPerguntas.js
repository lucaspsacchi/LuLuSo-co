function createAlt(e, dados) {
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
      input.value = (dados['seq'.concat(i)] === undefined) ? '' : dados['seq'.concat(i)]
      input.placeholder = (i < 2) ? 'Obrigatória' : 'Opcional'
      if (i < 2) {
        input.required = 'true'
      }
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)
    }
  }
  else if (e == 0) { // Alternativa

    // Insere o label e select para a escolha da alternativa correta
    let divCorreta = document.getElementById('correta')
    divCorreta.style.marginBottom = '30px'

    let label = document.createElement('label')
    label.for = 'FormCorreto'

    let textLabel1 = document.createTextNode('Alternativa correta da pergunta')
    label.appendChild(textLabel1)

    let span = document.createElement('span')
    span.style.color = 'red'
    let textLabel2 = document.createTextNode('*')
    span.appendChild(textLabel2)
    label.appendChild(span)
    divCorreta.appendChild(label)

    let select = document.createElement('select')
    select.className = 'form-control'
    select.id = 'correta'
    select.name = 'cor'
    select.required = 'true'

    // Insere os 4 campos de input e options
    for (i = 0; i < 4; i++) {
      let divGroup = document.createElement('div')
      divGroup.className = 'form-group col-12 col-md-6 col-lg-6' 

      let label = document.createElement('label')
      label.for = 'comment'.concat(i)
      let labelText = document.createTextNode('Alternativa '.concat(i+1))
      label.appendChild(labelText)
      divGroup.appendChild(label)

      let br1 = document.createElement('br')
      divGroup.appendChild(br1)

      let img = document.createElement('img')
      img.id = 'photo'.concat(i)
      img.className = 'img-rounded'
      img.src = '../img/' + dados['img'.concat(i+1)]
      img.width = '180'
      img.height = '180'
      divGroup.appendChild(img)

      let br2 = document.createElement('br')
      divGroup.appendChild(br2)

      let input = document.createElement('input')
      input.type = 'file'
      input.id = 'file'.concat(i)
      input.name = 'file'.concat(i)
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)

      // Options da alternativa correta
      let option = document.createElement('option')
      option.value = i
      if (dados['res'.concat(i+1)] == 1) {
        option.selected = 'selected'
      }
      let textOption = document.createTextNode('Alternativa '.concat(i+1))
      option.appendChild(textOption)
      select.appendChild(option)

      divCorreta.appendChild(select)
    }
  }
  else { // Toque nos Pares
    for (i = 0, aux = 0; i < 6; i++) {
      aux = (i % 2 == 0) ? (i / 2) : aux

      let divGroup = document.createElement('div')
      divGroup.className = 'form-group col-12 col-md-6 col-lg-6' 
  
      let label = document.createElement('label')
      label.for = 'par'.concat(aux)
      newText = (i % 2 == 0) ? 'Alternativa '.concat(aux+1) : 'Par da alternativa '.concat(aux+1)
      let labelText = document.createTextNode(newText)
      label.appendChild(labelText)
      divGroup.appendChild(label)

      let input = document.createElement('input')
      input.type = 'text'
      input.className = 'form-control'
      input.id = 'alternativa'.concat(i)
      input.name = 'alternativa'.concat(i)
      input.value = (dados['seq'.concat(i)] === undefined) ? '' : dados['seq'.concat(i)]
      input.placeholder = (aux < 2) ? 'Obrigatória' : 'Opcional'
      if (aux < 2) {
        input.required = 'true'
      }
      divGroup.appendChild(input)

      let divMae = document.getElementById('alternativas')
      divMae.appendChild(divGroup)
    }
  }
}

$('#FormMod').on('change', function() {
  // Remove todos os child
  var elemento = document.getElementById('alternativas');
  var options = document.getElementById('correta');
  while (elemento.firstChild) {
    elemento.removeChild(elemento.firstChild);
  }
  while (options.firstChild) {
    options.removeChild(options.firstChild);
  }
  // Cria novas alternativas de acordo com o escolhido no select
  createAlt(this.value, dados)
});

