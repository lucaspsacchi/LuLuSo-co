const dados = [{
  categoria: 'Whatsapp',
  completado: 10,
  img: 'whatsapp.png'
},
{
  categoria: 'Facebook',
  completado: 5,
  img: 'facebook.png'
}]

// Formata os dados
let categorias = []

// Espera carregar o dom
window.addEventListener('load', (event) => {
  formatCategorias()
  mountCategorias()
});

function mountCategorias() {
  var cats = document.getElementById("categoria")
  
  // Div para categoria
  var divCategorias = document.createElement('div')
  divCategorias.classList.add('col-lg-4')
  divCategorias.classList.add('col-md-6')
  divCategorias.classList.add('col-sm-12')
  divCategorias.classList.add('col-12')

  cats.appendChild(divCategorias)

  // Ancora para cada categoria
  var ancora = document.createElement('a')
  ancora.href = 'categoria.html'

  divCategorias.appendChild(ancora)

  // Card para cada categoria
  var divCard = document.createElement('div')
  divCard.classList.add('card')
  divCard.classList.add('card-custom')
  divCard.classList.add('shadow-sm')

  ancora.appendChild(divCard)

  // Div para card custom
  var divCustom = document.createElement('div')
  divCustom.classList.add('card-body')
  divCustom.classList.add('card-body-custom')

  divCard.appendChild(divCustom)

  // Div para row
  var divRow1 = document.createElement('div')
  divRow1.classList.add('row')
  divRow1.classList.add('row-custom')

  divCustom.appendChild(divRow1)

  // Div para nome e completado
  var divNome = document.createElement('div')
  divNome.classList.add('col-8')
  divNome.classList.add('col-custom')
  divNome.classList.add('d-flex')
  divNome.classList.add('align-content-between')
  divNome.classList.add('flex-wrap')
  
  divRow1.appendChild(divNome)

  // Div para row dentro da div nome
  var divRow2 = document.createElement('div')
  divRow2.classList.add('row')
  divRow2.classList.add('row-custom')

  divNome.appendChild(divRow2)

  // Div para h2
  var h2 = document.createElement('h2')

  divRow2.appendChild(h2)

  // Conteúdo do h2
  var node = document.createTextNode('Whatsapp')
  h2.appendChild(node)

  // Div para row para completado
  var divRow3 = document.createElement('div')
  divRow3.classList.add('row')
  divRow3.classList.add('row-custom')

  divNome.appendChild(divRow3)

  // Texto do completado
  var node = document.createTextNode('10 / 10 Completado') // Alterar a lógica para pegar os numeros de dados
  divRow3.appendChild(node)

  // div para imagem
  var divImg = document.createElement('div')
  divImg.classList.add('imagem')
  divImg.classList.add('col-4')
  divImg.classList.add('col-custom')
  divImg.classList.add('d-flex')
  divImg.classList.add('justify-content-end')
  divImg.classList.add('align-items-center')

  divRow1.appendChild(divImg)

  // Imagem
  var img = document.createElement('img')
  img.src = 'img/'.concat('whatsapp.png') // Imagem do dados

  divImg.appendChild(img)

  // Div para barra de progresso
  var divRow4 = document.createElement('div')
  divRow4.classList.add('col-12')
  divRow4.classList.add('barra-progressao')
  divRow4.style.width = '70%' // If 0% => cor igual do background ?
  divCard.appendChild(divRow4)

  // Texto do completado
  var node = document.createTextNode('AAA') // Alterar a lógica para pegar os numeros de dados
  divRow4.appendChild(node)

  // node = document.createTextNode('Teste')
  // divCategorias.appendChild(node)

  // categorias.map(x => {
  //   divCategorias.appendChild(x)
  // })

  // var node = document.createTextNode('Testeeeee')
  // ancora.appendChild(node)

  // divCategorias.appendChild(ancora)
}

function formatCategorias() {
  let i = 0

  dados.map(x => (
      categorias.push({
          id: i,
          categoria: x.categoria,
          completado: x.completado,
          img: 'img/'.concat(x.img)
      }),
      i++
  ))
}
  