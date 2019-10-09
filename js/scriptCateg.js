window.addEventListener('load', (event) => {
    const videos = formatVideos()
    var dataCateg = catchCateg()
  
    var divs = videos.map(video => 
      mountVideos(video, dataCateg)
    )
})

function mountVideos (video, dataCateg) {
    if(dataCateg.cat === video.categ) {
        var divCol = document.createElement('div')
        divCol.className = 'col-lg-4 col-md-6 col-sm-12 col-12 d-flex justify-content-center div-cat'
    
        var divCard = document.createElement('div')
        divCard.className = 'card card-custom card-cat shadow-sm'
        divCol.appendChild(divCard)

        var ancora = document.createElement('a')
        var str = 'modeloPergunta.html?id='
        str = str.concat(video.id_video)
        ancora.href = str
        divCard.appendChild(ancora)

        var divImg = document.createElement('div')
        divImg.className = 'imagem-categoria d-flex align-content-end flex-wrap'
        var str = 'linear-gradient(transparent, transparent, rgb(0, 0, 0)), url('
        str = str.concat(video.img)
        str = str.concat(')')
        divImg.style.backgroundImage = str
        divImg.style.backgroundSize = 'cover'
        ancora.appendChild(divImg)

        var divTitulo = document.createElement('div')
        divTitulo.className = 'titulo'
        divImg.appendChild(divTitulo)

        var titulo = document.createTextNode(video.nome)
        divTitulo.appendChild(titulo)
    
        var videos = document.getElementById('videos')
        videos.appendChild(divCol)
    }
}

function catchCateg() {
    var query = location.search.slice(1)
    var partes = query.split('&')
    var data = {}
    partes.forEach(function (parte) {
        var chaveValor = parte.split('=')
        var chave = chaveValor[0]
        var valor = chaveValor[1]
        data[chave] = valor
    })

    return data
}

function formatVideos() {
    let i = 0

    videos = []
  
    dados.map(x => (
        videos.push({
            id: i,
            id_video: x.id_video,
            nome: x.nome, 
            img: ('http://img.youtube.com/vi/'.concat(x.id_video)).concat('/maxresdefault.jpg'),
            categ: x.categ
        }),
        i++
    ))
    return videos
  }