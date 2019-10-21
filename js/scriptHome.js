// Página categoria
const pageCat = 'categoria.php'

// Formata os dados
let categorias = []

// Espera carregar o dom
window.addEventListener('load', (event) => {
  const categorias = formatCategorias()

  var divs = categorias.map(x => 
    mountCategorias(x)
  )
})


function mountCategorias(dado) {
  // Div para categoria
  var divCategorias = document.createElement('div')
  divCategorias.classList.add('col-lg-4')
  divCategorias.classList.add('col-md-6')
  divCategorias.classList.add('col-sm-12')
  divCategorias.classList.add('col-12')
  divCategorias.id = dado.id

  // Ancora para cada categoria
  var ancora = document.createElement('a')
  aux = pageCat.concat('?cat=')
  ancora.href = aux.concat(dado.categoria)

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
  var node = document.createTextNode(dado.categoria)
  h2.appendChild(node)

  // Div para row para completado
  var divRow3 = document.createElement('div')
  divRow3.classList.add('row')
  divRow3.classList.add('row-custom')

  divNome.appendChild(divRow3)

  // Texto do completado
  str = dado.completado.toString()
  str = str.concat(' / ')
  str = str.concat(dado.total.toString())
  str = str.concat(' Completado')
  var node = document.createTextNode(str) // Alterar a lógica para pegar os numeros de dados
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
  img.src = dado.img // Imagem do dados

  divImg.appendChild(img)

  // Div para barra de progresso
  var divProg = document.createElement('div')
  divProg.classList.add('col-12')
  divProg.classList.add('barra-progressao')
  divCard.appendChild(divProg)

  divProgFeito = document.createElement('div')
  divProgFeito.classList.add('barra-progressao-feita')

  divProgFeito.style.width = porcDado(dado.total, dado.completado)
  divProg.appendChild(divProgFeito)

  // Texto do completado
  var elemP = document.createElement('p')
  divProgFeito.appendChild(elemP)
  var node = document.createTextNode('a')
  elemP.appendChild(node)

  //
  var cats = document.getElementById("categoria")
  cats.appendChild(divCategorias)
}

function formatCategorias() {
  let i = 0

  dados.map(x => (
      categorias.push({
          id: i,
          categoria: x.categoria,
          total: x.total,
          completado: x.completado,
          img: 'img/'.concat(x.img)
      }),
      i++
  ))
  return categorias
}

function porcDado(total, completado) {

  var aux = ((completado/total)*100).toString()
  return aux.concat('%')
}